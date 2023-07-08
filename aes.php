<?php
$plaintext = "This is a secret message."; // 明文
$key = "mysecretkey"; // 一把金鑰
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("AES-128-CBC"));

echo "iv 值: " . $iv . "<br>"; 
echo "iv 值(base64編碼): " . base64_encode($iv) . "<br>"; // . 代表 PHP 的字串相接

$ciphertext = openssl_encrypt($plaintext, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv);
$decrypted = openssl_decrypt($ciphertext, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv);

echo "密文(無進行編碼): " . $ciphertext . "<br>";
echo "密文(base64編碼): " . base64_encode($ciphertext) . "<br>";
echo "明文(解碼): " . $decrypted . "<br>";
?>
