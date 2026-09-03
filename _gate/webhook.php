<?php
require __DIR__ . '/lib.php';
$config = gma_config();

if (($_GET['key'] ?? '') !== $config['webhook_secret']) {
    http_response_code(403);
    exit('forbidden');
}

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
if (!is_array($data)) $data = $_POST;

$logFile = __DIR__ . '/webhook-log.php';
if (!file_exists($logFile)) file_put_contents($logFile, "<?php exit; ?>\n");
$fp = fopen($logFile, 'a');
if ($fp) {
    flock($fp, LOCK_EX);
    fwrite($fp, json_encode(['time' => date('c'), 'raw' => $raw]) . "\n");
    flock($fp, LOCK_UN);
    fclose($fp);
}

function gma_pick($data, array $keys) {
    foreach ($keys as $k) {
        if (isset($data[$k]) && $data[$k] !== '') return $data[$k];
    }
    return null;
}

$email  = gma_pick($data, ['email', 'buyer_email', 'customer_email', 'pelanggan_emel', 'emel_pelanggan', 'emel']);
$status = gma_pick($data, ['status', 'payment_status', 'order_status']);
$kod    = gma_pick($data, ['product_code', 'produk_kod', 'kod_produk', 'sku', 'kod', 'product_kod']);

$paidStatuses = ['paid', 'success', 'completed', 'confirmed', 'disahkan'];
$isPaid = $status !== null && in_array(strtolower((string)$status), $paidStatuses, true);

if ($email && $kod && $isPaid) {
    gma_record_purchase((string)$email, (string)$kod);
}

http_response_code(200);
echo 'ok';
