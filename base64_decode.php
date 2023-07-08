<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];

    if (isset($_POST['encode'])) {
        $base64Encoded = base64_encode($text);
        echo "base64 編碼結果：{$base64Encoded}<br>";
    } elseif (isset($_POST['decode'])) {
        $base64Decoded = base64_decode($text);
        echo "base64 解碼結果：{$base64Decoded}<br>";
    }
}

?>

<form action="base64_decode.php" method="post">
    <input type="text" name="text" id="text">
    <input type="submit" value="編碼" name="encode" id="submit">
    <input type="submit" value="解碼" name="decode" id="submit">
</form>
