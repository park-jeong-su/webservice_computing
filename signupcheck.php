<?php
	
	/*
		우선 디비 체크
	*/
	$DB_ADDR ="localhost";
	$DB_USER = "root";
	$DB_PW = "1234";
	$DB_NAME = "webser";

	header("charset=UTF-8");

	$db=mysqli_connect($DB_ADDR,$DB_USER,$DB_PW,$DB_NAME);

	if($db){
		echo "DB Connection OK";
	}
	else{
		echo "DB Connection failed";
	}

	mysqli_close($db);


/*
$eid = $_POST["eid"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$add = $_POST["add"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$con = oci_connect("db133","db133","203.229.204.89/orcl","AL32UTF8");
 	$query ="INSERT INTO MEMBER VALUES (SEQ_MEM.NEXTVAL,0,0,"."'".$eid."','".$password."','".$name."','".$add."','".$address."','".$phone."','".$email."')";
	$result = oci_parse($con, $query);
 
	oci_execute($result);
	
	echo("signUpSuccess");
	exit();*/


?>