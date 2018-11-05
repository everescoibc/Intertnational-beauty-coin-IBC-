<?php

	include "../include/dbonline.php";

	$oidx = $_POST["oidx"];
	$ridx = $_POST["ridx"];
	$email = $_POST["email"];
	$reple = $_POST["rereple"];
	$datetime = date('Y-m-d H:i:sa');

	$sql01 = mq("INSERT INTO reple(oidx,ridx,email,reple,datetime) VALUES('".$oidx."','".$ridx."','".$email."','".$reple."','".$datetime."')");

?>