<?php
// Shared access-control library for GoldMapAtlas viewer gating.
$__gateDir = __DIR__;
define('GMA_PURCHASES_FILE', $__gateDir . '/purchases.php');
define('GMA_DIE_GUARD', "<?php exit; ?>\n");

function gma_config(): array {
    static $config = null;
    if ($config === null) {
        $config = require __DIR__ . '/config.php';
    }
    return $config;
}

function gma_normalize_email(string $email): string {
    return strtolower(trim($email));
}

function gma_strip_die_guard(string $raw): string {
    $pos = strpos($raw, "?>\n");
    return $pos === false ? $raw : substr($raw, $pos + 3);
}

function gma_load_purchases(): array {
    if (!file_exists(GMA_PURCHASES_FILE)) return [];
    $fp = fopen(GMA_PURCHASES_FILE, 'r');
    if (!$fp) return [];
    flock($fp, LOCK_SH);
    $raw = stream_get_contents($fp);
    flock($fp, LOCK_UN);
    fclose($fp);
    $data = json_decode(gma_strip_die_guard($raw), true);
    return is_array($data) ? $data : [];
}

function gma_record_purchase(string $email, string $productKod): void {
    $email = gma_normalize_email($email);
    if ($email === '' || $productKod === '') return;
    $fp = fopen(GMA_PURCHASES_FILE, 'c+');
    if (!$fp) return;
    flock($fp, LOCK_EX);
    $raw = stream_get_contents($fp);
    $data = json_decode(gma_strip_die_guard($raw), true);
    if (!is_array($data)) $data = [];
    if (!isset($data[$email]) || !is_array($data[$email])) $data[$email] = [];
    if (!in_array($productKod, $data[$email], true)) {
        $data[$email][] = $productKod;
    }
    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, GMA_DIE_GUARD . json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    fflush($fp);
    flock($fp, LOCK_UN);
    fclose($fp);
}

function gma_has_access(string $email, array $requiredAnyOf): bool {
    $email = gma_normalize_email($email);
    $data = gma_load_purchases();
    if (!isset($data[$email])) return false;
    foreach ($requiredAnyOf as $needed) {
        if (in_array($needed, $data[$email], true)) return true;
    }
    return false;
}

function gma_sign(string $value, string $secret): string {
    return hash_hmac('sha256', $value, $secret);
}

function gma_issue_cookie(string $email): void {
    $config = gma_config();
    $email = gma_normalize_email($email);
    $expires = time() + ($config['cookie_days'] * 86400);
    $payload = $email . '|' . $expires;
    $sig = gma_sign($payload, $config['cookie_secret']);
    $value = base64_encode($payload) . '.' . $sig;
    setcookie($config['cookie_name'], $value, [
        'expires' => $expires,
        'path' => '/',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
}

function gma_email_from_cookie(): ?string {
    $config = gma_config();
    $raw = $_COOKIE[$config['cookie_name']] ?? '';
    if (!$raw || strpos($raw, '.') === false) return null;
    [$b64, $sig] = explode('.', $raw, 2);
    $payload = base64_decode($b64);
    if ($payload === false) return null;
    $expected = gma_sign($payload, $config['cookie_secret']);
    if (!hash_equals($expected, $sig)) return null;
    $parts = explode('|', $payload, 2);
    if (count($parts) !== 2) return null;
    [$email, $expires] = $parts;
    if (!$email || (int)$expires < time()) return null;
    return $email;
}

function gma_render_gate(string $title, string $description, ?string $error = null): void {
    ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title) ?> — GoldMapAtlas</title>
<style>
  body{font-family:Georgia,'Times New Roman',serif;background:#1b1712;color:#eee6d6;display:flex;min-height:100vh;align-items:center;justify-content:center;margin:0;padding:24px;}
  .card{max-width:420px;width:100%;background:#26201a;border:1px solid #4a3d2c;border-radius:10px;padding:32px;}
  h1{font-size:1.3rem;margin:0 0 8px;color:#e8d9b5;}
  p{color:#c9bda3;line-height:1.5;font-size:0.95rem;}
  input[type=email]{width:100%;box-sizing:border-box;padding:10px 12px;border-radius:6px;border:1px solid #5a4c37;background:#1b1712;color:#eee6d6;font-size:1rem;margin:14px 0;}
  button{width:100%;padding:11px;border-radius:6px;border:none;background:#c9a44c;color:#1b1712;font-weight:bold;font-size:1rem;cursor:pointer;}
  button:hover{background:#dab65e;}
  .err{background:#3a1f1f;border:1px solid #7a3b3b;color:#f2c6c6;padding:10px 12px;border-radius:6px;font-size:0.9rem;margin-bottom:10px;}
</style>
</head>
<body>
  <div class="card">
    <h1><?= htmlspecialchars($title) ?></h1>
    <p><?= htmlspecialchars($description) ?></p>
    <?php if ($error): ?><div class="err"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <form method="post">
      <input type="email" name="email" placeholder="Email used at checkout" required autofocus>
      <button type="submit">Access My Map</button>
    </form>
    <p style="font-size:0.8rem;opacity:0.7;margin-top:16px;">Just purchased? It can take a minute for your access to activate. Try again shortly, or check the confirmation email we sent.</p>
  </div>
</body>
</html>
<?php
}

// Shown when the visitor already has a valid login cookie, but the email on that
// cookie does not own THIS particular product. Distinct from gma_render_gate()
// (which is for "never logged in" / "wrong email typed") so the buyer isn't
// confused into thinking their login failed when really they just haven't bought
// this map yet.
function gma_render_wrong_product(string $title, string $email): void {
    ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title) ?> — GoldMapAtlas</title>
<style>
  body{font-family:Georgia,'Times New Roman',serif;background:#1b1712;color:#eee6d6;display:flex;min-height:100vh;align-items:center;justify-content:center;margin:0;padding:24px;}
  .card{max-width:440px;width:100%;background:#26201a;border:1px solid #4a3d2c;border-radius:10px;padding:32px;text-align:center;}
  h1{font-size:1.3rem;margin:0 0 10px;color:#e8d9b5;}
  p{color:#c9bda3;line-height:1.55;font-size:0.95rem;margin:0 0 8px;}
  .email{color:#e0a86d;font-weight:600;}
  .btn{display:inline-block;width:100%;box-sizing:border-box;padding:11px;border-radius:6px;border:none;background:#c9a44c;color:#1b1712;font-weight:bold;font-size:1rem;text-decoration:none;margin-top:16px;}
  .btn:hover{background:#dab65e;}
  .switch{display:block;margin-top:14px;color:#a29684;font-size:0.85rem;text-decoration:none;}
  .switch:hover{color:#eee6d6;text-decoration:underline;}
</style>
</head>
<body>
  <div class="card">
    <h1><?= htmlspecialchars($title) ?></h1>
    <p>You're logged in as <span class="email"><?= htmlspecialchars($email) ?></span>, but this map isn't part of your purchase.</p>
    <p>Grab it (or upgrade to All-Access) from the shop to unlock it.</p>
    <a class="btn" href="https://goldmapatlas.com/viewer/index.html">Visit the Shop</a>
    <a class="switch" href="?switch=1">Not you? Use a different email</a>
  </div>
</body>
</html>
<?php
}

function gma_gate(array $requiredAnyOf, string $title): void {
    $existingEmail = gma_email_from_cookie();
    if ($existingEmail && gma_has_access($existingEmail, $requiredAnyOf)) {
        return;
    }

    $switchEmail = isset($_GET['switch']);
    $error = null;

    if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
        $email = trim($_POST['email'] ?? '');
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Please enter a valid email address.';
        } elseif (gma_has_access($email, $requiredAnyOf)) {
            gma_issue_cookie($email);
            header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
            exit;
        } else {
            $error = "We couldn't find a purchase under that email. Please use the email you paid with.";
        }
    } elseif ($existingEmail && !$switchEmail) {
        // Already logged in as someone, just not someone who bought THIS product.
        // Show a clear "not included in your purchase" screen instead of a blank
        // re-login form, so it doesn't read like their login failed.
        gma_render_wrong_product($title, $existingEmail);
        exit;
    }

    gma_render_gate($title, 'Enter the email you used to purchase to unlock this map.', $error);
    exit;
}
