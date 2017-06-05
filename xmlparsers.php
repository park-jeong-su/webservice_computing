<?php
/*파싱까지 성공 */

$xml=simplexml_load_file("get_res.xml") or die("Error: Cannot create object");

//$res=$xml->res;
echo "<script>alert($xml->long);</script>";
echo $xml->long;

?>