<?php
// Tiny read-only endpoint for the gallery page: tells the visitor's own browser
// which products THEY own, based on their own signed cookie. Never accepts input,
// never reveals anything about anyone else - it re-derives the email the same way
// gma_gate() does (signed cookie, not a client-supplied value).
require __DIR__ . '/lib.php';

header('Content-Type: application/json');
header('Cache-Control: no-store');

$email = gma_email_from_cookie();
if (!$email) {
    echo json_encode(['loggedIn' => false, 'owned' => []]);
    exit;
}

$purchases = gma_load_purchases();
$owned = $purchases[gma_normalize_email($email)] ?? [];
echo json_encode(['loggedIn' => true, 'owned' => array_values($owned)]);
