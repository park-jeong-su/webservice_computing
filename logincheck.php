<?php
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	include("dbcheck.php");

	
 	$query ="SELECT biz,name FROM member WHERE email='$email' AND pass='$password'";
	$result = mysqli_query($db,$query);
 
 	$row = mysqli_fetch_array($result);
	
	
	if($row){
			session_start();
			//$_SESSION["name"] = $eid;
			$_SESSION["name"] = $row['name'];
			$_SESSION["biz"] = $row['biz'];
			//$_SESSION["mid"] = $row['MID'];
			echo("success");
			exit();
	}else{
			echo("-1");
	}


	include("dbend.php");
?>

<?php
	/*
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
	*/

?>