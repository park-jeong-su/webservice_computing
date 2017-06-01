<?php
	
	$phone = $_POST["phone"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$biz=$_POST["biz"];

	include("dbcheck.php");


	$query = "insert into member(phone,name,email,pass,biz)
	values('".$phone."','".$name."','".$email."','".$password."','".$biz."')";

	$result = mysqli_query($db,$query);

	include("dbend.php");

?>