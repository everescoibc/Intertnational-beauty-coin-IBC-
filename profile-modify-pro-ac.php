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
			$_SESSION['confirm'] = $user['confirm'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['referral'] = $user['referral'];
			$_SESSION['datetime'] = $user['datetime'];
			$_SESSION['profile'] = $user['profile'];
			$_SESSION['wallet'] = $user['wallet'];
			$_SESSION['ibc'] = $user['ibc'];
			$_SESSION['ibcw'] = $user['ibcw'];
			$_SESSION['eth'] = $user['eth'];
			$_SESSION['rmb'] = $user['rmb'];
			$_SESSION['country'] = $user['country'];
			$_SESSION['mobile'] = $user['mobile'];
			$_SESSION['address'] = $user['address'];
			$_SESSION['authority'] = $user['authority'];
			//수정 세션 생성
			$_SESSION['modify'] = 1;
			if(isset($_SESSION['email'])){
				header("Location: ../cn/profile-modify.php");
			}
			else{
				echo "<script>alert('세션 생성 실패'); location.href='../cn/profile.php';</script>";
			}
		}
		//아닐 경우
		else{
			echo "<script>alert('邮箱与密码不一致。'); location.href='../cn/profile.php';</script>";
		}
	}
	//아닐 경우
	else{
		echo "<script>alert('没有登录的邮箱。'); location.href='../cn/sign-in.php';</script>";
	}
?>
</html>