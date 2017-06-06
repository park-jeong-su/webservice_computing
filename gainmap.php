<?php
/*파싱까지 성공 */
$q=$_GET["q"];


$xml=simplexml_load_file("get_res.xml") or die("Error: Cannot create object");

//$res=$xml->res;
echo "<script>alert($xml->long);</script>";
echo $xml->long;

?>


<?php
$q=$_GET["q"];

$xmlDoc = new DOMDocument();
$xmlDoc->load("get_res.xml");

$x=$xmlDoc->getElementsByTagName('ARTIST');

for ($i=0; $i<=$x->length-1; $i++) {
  //Process only element nodes
  if ($x->item($i)->nodeType==1) {
    if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
      $y=($x->item($i)->parentNode);
    }
  }
}

$cd=($y->childNodes);

for ($i=0;$i<$cd->length;$i++) {
  //Process only element nodes
  if ($cd->item($i)->nodeType==1) {
    echo("<b>" . $cd->item($i)->nodeName . ":</b> ");
    echo($cd->item($i)->childNodes->item(0)->nodeValue);
    echo("<br>");
  }
}
?> 