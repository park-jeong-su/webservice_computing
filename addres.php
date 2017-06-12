<?php


	$email = $_POST["email"];
	$resname = $_POST["resname"];
	$category = $_POST["category"];
	$notice = $_POST["notice"];
	$lat = $_POST["lat"];
	$lng = $_POST["lng"];
	




	
	include("dbcheck.php");	

 	$query ="SELECT id FROM member WHERE email='$email'";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_assoc($result);
	$id=$row['id'];
	

	$query = "INSERT INTO `res` (`id`, `resname`, `lat`, `lon`, `memberid`, `category`, `notice`) VALUES (NULL, '".$resname."', '".$lat."', '".$lng."', '".$id."', '".$category."', '".$notice."')";
	//$query = "insert into res(resname,lat,long,memberid,category,notice) values('".$resname."',".$lat.",".$lng.",".$id.",'".$category."','".$notice."')";

	$result = mysqli_query($db,$query);

	/*
	
	if($row){
			session_start();
			$_SESSION["email"] = $email;
			$_SESSION["name"] = $row['name'];
			$_SESSION["biz"] = $row['biz'];
			//$_SESSION["mid"] = $row['MID'];
			echo("success");
			exit();
	}else{
			echo("-1");
	}*/

	
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