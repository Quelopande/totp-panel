<?php
require_once 'GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();

$cypherMethod = 'AES-256-GCM';
$key = random_bytes(32);
$iv = random_bytes(openssl_cipher_iv_length($cypherMethod));

$encryptedString = openssl_encrypt($secret, $cypherMethod, $key, $options=0, $iv, $tag);
$finalEncryptedString = base64_encode($iv . $tag . $encryptedString);

// Almacenar

$userEmail = $result['email'];

$qrCodeUrl = $ga->getQRCodeGoogleUrl("Hexamarket.store: $userEmail", $secret);
echo "<img src='$qrCodeUrl' alt='totp qr image'>";