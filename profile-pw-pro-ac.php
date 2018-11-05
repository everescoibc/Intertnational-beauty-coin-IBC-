<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";
	
	//포스트 변수대입
	$email = addslashes($_SESSION['email']);
	$password = addslashes($_POST['password']);
	
	//이메일 체크 전송
	$idcheck = "SELECT * FROM user WHERE email = '{$email}'";
	$res01 = $db->query($idcheck);
	
	//이메일 일치
	if($res01->num_rows == 1){
		
		//이메일,pw 체크 전송
		$pwcheck = "SELECT * FROM user WHERE email = '{$email}' AND password = '{$password}'";
		$res02 = $db->query($pwcheck);

		//이메일,pw 모두 일치하면 세션 생성
		if($res02->num_rows == 1){
			$user = $res02->fetch_array();
			//수정 세션 생성
			$_SESSION['pw'] = 1;
			if(isset($_SESSION['pw'])){
				header("Location: ../en/profile-pw.php");
			}
			else{
				echo "<script>alert('세션 생성 실패'); location.href='../en/profile.php';</script>";
			}
		}
		//아닐 경우
		else{
			echo "<script>alert('Email and password do not match.'); location.href='../en/profile.php';</script>";
		}
	}
	//아닐 경우
	else{
		echo "<script>alert('Unregistered email.'); location.href='../en/sign-in.php';</script>";
	}
?>
</html>