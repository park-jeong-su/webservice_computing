<?php

include("dbcheck.php");


$query = "select * from res where id='$id'";

$result = mysqli_query($db,$query);

$row = mysqli_fetch_assoc($result);


?>