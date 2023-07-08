<?php
$message = "This is the original message.";

// 產生私鑰
$privateKeyFile = 'private.pem';
exec('openssl genpkey -algorithm RSA -out ' . $privateKeyFile);

// 產生公鑰
$publicKeyFile = 'public.pem';
exec('openssl rsa -pubout -in ' . $privateKeyFile . ' -out ' . $publicKeyFile);

// 數位簽章
// Linux 使用 echo 
exec('openssl dgst -sha256 -sign ' . $privateKeyFile . ' -out signature.bin <(echo -n "' . $message . '")');

// 驗證數位簽章
exec('openssl dgst -sha256 -verify ' . $publicKeyFile . ' -signature signature.bin <(echo -n "' . $message . '")', $output, $result);

$isValid = ($result === 0);

echo "Is Valid: " . ($isValid ? "Yes" : "No") . "<br>";



?>
