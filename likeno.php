<?php

	include "../include/dbonline.php";

	$oidx = $_POST["likeno_idx"];

	$sql05 = mq("SELECT * FROM likeno WHERE oidx = '$oidx'");
	$likeno = $sql05->num_rows;
	if($likeno == FALSE) { $like = 0; }

	echo "좋아요 {$likeno}개"

?>