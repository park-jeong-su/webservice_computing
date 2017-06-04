<?php

function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}

//debug_to_console($name);
//debug_to_console($biz);
require("dbcheck.php");
echo "<script>alert(1);</script>";
// Start XML file, create parent node
$doc = domxml_new_doc("1.0");
$node = $doc->create_element("markers");
$parnode = $doc->append_child($node);
echo "<script>alert(2);</script>";
// Opens a connection to a MySQL server
$connection=mysqli_connect($DB_ADDR, $DB_USER, $DB_PW,$DB_NAME);
echo "<script>alert(3);</script>";
debug_to_console($connection);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM res";
echo "<script>alert(4);</script>";
$result = mysqli_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
echo "<script>alert(5);</script>";
header("Content-type: text/xml");


// Iterate through the rows, adding XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // Add to XML document node
  $node = $doc->create_element("marker");
  $newnode = $parnode->append_child($node);

  $newnode->set_attribute("resname", $row['resname']);
  $newnode->set_attribute("lat", $row['lat']);
  $newnode->set_attribute("long", $row['long']);
  $newnode->set_attribute("memberid", $row['memberid']);
  $newnode->set_attribute("category", $row['category']);
  $newnode->set_attribute("notice", $row['notice']);
}

echo "<script>alert(6);</script>";
$xmlfile = $doc->dump_mem();
echo $xmlfile;
echo "<script>alert(7);</script>";
?>