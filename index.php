<?php
require_once 'GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();

$sqlSecret = ['totpSecret'];
$decodedData = base64_decode($sqlSecret);

$key = $result['key'];
$cypherMethod = 'AES-256-GCM';
$iv = substr($decodedData, 0, 12);
$tag = substr($decodedData, 12, 16);
$ciphertext = substr($decodedData, 28);

$options = 0;
$decryptedString = openssl_decrypt($ciphertext, $cypherMethod, $key, $options, $iv, $tag);
$secret = $decryptedString;

// $oneCodeInput = trim($_POST['code']);
// $checkResult = $ga->verifyCode($secret, $oneCodeInput, 2);
// if ($checkResult) {
//     echo 'OK';
// } else {
//     echo 'FAILED';
// }