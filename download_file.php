<?php

// http://localhost/crypto_lab/download_file.php?file=
// $file = $_GET["file"]; // 直接寫入檔名/路徑
$file = base64_decode($_GET["file"]); // 透過 base64 解碼後寫入檔名/路徑

if(isset($file))
{
    header("Content-type:application");
    header("Content-Length: " .(string)(filesize($file)));
    header("Content-Disposition: attachment; filename=".$file);
    readfile($file);
}
?>
