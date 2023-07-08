<?php
// 宣傳一個網址相關的參數 $url
$url = 'https://username:password@feifei.tw:8787/path?arg=value&name-feifei&pass=feifei#anchor';

// 使用 highlight_string 高量程式碼
// 使用 var_export 參數輸出 
// 使用 parse_url 分析 url 
highlight_string("<?php\n\$url = '".$url."';\n" . var_export(parse_url($url), true) . ";\n?>");

?>
