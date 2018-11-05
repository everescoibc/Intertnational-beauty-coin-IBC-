<?php
	include "dbonline.php";

	//세션 제거
	session_unset();
	//로그인 페이지 이동
	header("Location: ../cn/sign-in.php");

?>