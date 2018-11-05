<?php

	include "../include/dbonline.php";

	$oidx = $_POST["like_idx"];
	$uidx = $_POST["like_uidx"];
	$fidx = $_POST["like_useridx"];
	$datetime = date('Y-m-d H:i:sa');

	$sql01 = mq("INSERT INTO likeno(oidx,useridx,foridx,datetime) VALUES('".$oidx."','".$uidx."','".$fidx."','".$datetime."')");

?>