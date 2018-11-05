<?php
	include "../include/dbonline.php";
	$ridx = $_POST['ridx'];
	
	//검색
	$sql01 = mq("SELECT * FROM profile WHERE idx = '$ridx'");
	$profile = $sql01->fetch_array();
	$file = $profile['file'];
	$email = $profile['email'];

	//유저 업데이트
	$sql02 = mq("UPDATE user SET profile='".$file."' WHERE email='".$email."'");
?>