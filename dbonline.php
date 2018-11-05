<?php
	//세션 시작
	session_start();

	//DB 접속 설정
	$host = "localhost";
	$user = "everesco";
	$pw = "ever!23esco";
	$dbname = "everesco";
	$db = mysqli_connect($host, $user, $pw, $dbname);
	$db->set_charset("utf8");

	//전역함수
	function mq($sql){
		global $db;
		return $db->query($sql);
	}

	//DB 접속 실패 시
	if(mysqli_connect_error()){
		echo 'DB 접속 실패';
		echo mysqli_connect_error();
	}
?>