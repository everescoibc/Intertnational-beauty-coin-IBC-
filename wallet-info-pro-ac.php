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
			$_SESSION['wa'] = 1;
			if(isset($_SESSION['wa'])){
				header("Location: ../cn/wallet-info.php");
			}
			else{
				echo "<script>alert('세션 생성 실패'); location.href='../cn/wallet.php';</script>";
			}
		}
		//아닐 경우
		else{
			echo "<script>alert('邮箱与密码不一致。'); location.href='../cn/wallet.php';</script>";
		}
	}
	//아닐 경우
	else{
		echo "<script>alert('没有登录的邮箱。'); location.href='../cn/sign-in.php';</script>";
	}
?>
</html>