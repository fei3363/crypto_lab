<?php 

// 確認是否請求封包為 POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 取得輸入的字串
    $text = $_POST['text'];

    // 根據按鈕來確認是否為編碼或解碼
    if (isset($_POST['encode'])) {
        $urlEncoded = urlencode($text);
        echo "URL 編碼結果：{$urlEncoded}<br>";
    } elseif (isset($_POST['decode'])) {
        $urlDecoded = urldecode($text);
        echo "URL 解碼結果：{$urlDecoded}<br>";
    }
}

?>

<!--  表單內容可輸入內容進行編碼語解碼 -->
<form action="decode.php" method="post">
    <input type="text" name="text" id="text">
    <input type="submit" value="編碼" name="encode" id="submit">
    <input type="submit" value="解碼" name="decode" id="submit">
</form>
