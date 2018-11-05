<?php
	include "../include/dbonline.php";
	$idx = $_POST['con_idx'];
	
	//서버 이미지파일 삭제
	$sql01 = mq("SELECT * FROM imgfiles WHERE oidx = '$idx'");
	while($imgfiles = $sql01->fetch_array()) {
		$file = $imgfiles['file'];
		unlink("../../uploadimg/".$file);
	}

	//게시물 삭제
	$sql02 = mq("DELETE FROM contents WHERE idx = '$idx'");
	$sql03 = mq("DELETE FROM imgfiles WHERE oidx = '$idx'");
?>