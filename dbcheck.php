	<?php
	/*
		우선 디비 체크
	*/
	$DB_ADDR ="localhost";
	$DB_USER = "root";
	$DB_PW = "1234";
	$DB_NAME = "web";

	header("charset=UTF-8");

	$db=mysqli_connect($DB_ADDR,$DB_USER,$DB_PW,$DB_NAME);

	if($db){
		
	}
	else{
		echo "DB Connection failed";
	}

	?>