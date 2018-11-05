<?php
	include "../include/dbonline.php";
	$idx = $_POST['imgidx'];
	
	//서버 이미지파일 삭제
	$sql01 = mq("SELECT * FROM tempimg WHERE idx = '$idx'");
	$tempimg = $sql01->fetch_array();
	$file = $tempimg['file'];
	unlink("../../uploadimg/".$file);
	
	//DB 레코드 삭제
	$sql02 = mq("DELETE FROM tempimg WHERE idx = '$idx'");
?>