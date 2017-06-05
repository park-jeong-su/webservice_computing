<?php
function xmp_print_r($arr) { echo '<xmp>'; print_r($arr); echo '</xmp>'; }
function xml2arr($xml) {
    $arr = array();
    if (!preg_match_all('|\<\s*?(\w+).*?\>(.*)\<\/\s*\\1.*?\>|s', $xml, $m)) return $xml;
    if (is_array($m[1])) for ($i = 0;$i < sizeof($m[1]); $i++) $arr[$m[1][$i]] = xml2arr($m[2][$i]);
    else $arr[$m[1]] = xml2arr($m[2]);
    return $arr;
}
$xml = file_get_contents("http://52.78.245.194/web/quiz.xml");
$arr = xml2arr($xml);
xmp_print_r($arr);
?>