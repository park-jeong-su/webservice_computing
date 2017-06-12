<?php
// session_start();
$dom = new DOMDocument("1.0","UTF-8");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

    $DB_ADDR ="localhost";
    $DB_USER = "root";
    $DB_PW = "1234";
    $DB_NAME = "web";
    header('Content-type: text/xml');
   // header("charset=UTF-8");

    $db=mysqli_connect($DB_ADDR,$DB_USER,$DB_PW,$DB_NAME);

    if($db){
        
    }
    else{
        echo "DB Connection failed";
    }

//$conn = mysqli_connect($DB_ADDR, $DB_USER, $DB_PW, $DB_NAME);
// Check connection
//if ($conn->connect_error) {
 //   die("Connection failed: " . $conn->connect_error);

$sql = "SELECT id , resname, lat, lon, memberid, category, notice FROM res where category='res'";
$result = mysqli_query($db,$sql);
$nums = mysqli_num_rows($result);

if ($nums > 0) {
    header("Content-type: text/xml");
    while($row = mysqli_fetch_array($result)) {
        $node = $dom->createElement("marker");
        $newnode = $parnode->appendChild($node);
        $newnode->setAttribute("id", $row['id']);
        $newnode->setAttribute("resname",$row['resname']);
        $newnode->setAttribute("lat",$row['lat']);
        $newnode->setAttribute("lon",$row['lon']);
        $newnode->setAttribute("memberid",$row['memberid']);
        $newnode->setAttribute("category",$row['category']);
        $newnode->setAttribute("notice",$row['notice']);
    }
} else {
    echo "0 results";
}
echo $dom->saveXML();
require("dbend.php");
?>