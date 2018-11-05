<?php

	include "../include/dbonline.php";

	$oidx = $_POST["idx"];
	$email = $_POST["email"];
	$reple = $_POST["reple"];
	$datetime = date('Y-m-d H:i:sa');

	$sql01 = mq("INSERT INTO reple(oidx,email,reple,datetime) VALUES('".$oidx."','".$email."','".$reple."','".$datetime."')");

?>