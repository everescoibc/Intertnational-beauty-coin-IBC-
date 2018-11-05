<?php
	include "../include/dbonline.php";
	$idx = $_POST['idx'];
	
	//댓글 삭제
	$sql01 = mq("DELETE FROM reple WHERE idx = '$idx'");
	$sql02 = mq("DELETE FROM reple WHERE ridx = '$idx'");
?>