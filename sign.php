<?php

$message = "This is the original message.";

// 產生私鑰
$privateKeyFile = 'private.pem';
exec('openssl genpkey -algorithm RSA -out ' . $privateKeyFile);

// 產生公鑰
$publicKeyFile = 'public.pem';
exec('openssl rsa -pubout -in ' . $privateKeyFile . ' -out ' . $publicKeyFile);

// 進行數位簽章(使用私鑰對資料進行加密)
exec('echo "' . $message . '" | openssl dgst -sha256 -sign ' . $privateKeyFile . ' -out signature.bin');

// 驗證數位簽章(使用公鑰驗證簽章的有效性)
exec('echo "' . $message . '" | openssl dgst -sha256 -verify ' . $publicKeyFile . ' -signature signature.bin', $output, $result);

$isValid = ($result === 0);

echo "是否驗證成功: " . ($isValid ? "Yes" : "No") . "<br>";

?>
