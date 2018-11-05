<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";
	
	//비번 일치여부 확인
		$pw = $_POST['password'];
		$repw = $_POST['repassword'];
		
		//일치할 경우
		if($pw == $repw){

			//비밀번호 함수화
			//$userpw = password_hash($_POST['password'], PASSWORD_DEFAULT);
	
			//sql 회원정보 전송
			$sql = mq("UPDATE user SET password='".$pw."' WHERE email='".$_SESSION['email']."'");
			
		}
		
		//일치하지 않을 경우
		else{
			echo "<script>alert('Passwords do not match.'); location.href='../en/profile.php';</script>";
		}
?>
<script type="text/javascript">alert("Complete."); location.href='../en/profile.php';</script>
</html>