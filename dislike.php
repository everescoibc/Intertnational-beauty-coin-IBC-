<?php

	include "../include/dbonline.php";

	$oidx = $_POST["like_idx"];
	$uidx = $_POST["like_uidx"];

	$sql01 = mq("DELETE FROM likeno WHERE useridx = '$uidx' AND oidx = '$oidx'");

?>