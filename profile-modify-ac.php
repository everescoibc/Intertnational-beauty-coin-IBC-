<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";
	
	//추천인 이메일과 회원 이메일이 동일할 경우
	if($_POST['referral'] == $_SESSION['email']){
		echo "<script>alert('User E-mail and Referral E-mail should not be the same.'); location.href='../en/profile-modify.php';</script>";
	}
	//아닐 경우
	else{
		$sql = mq("UPDATE user SET username='".$_POST['username']."',referral='".$_POST['referral']."',country='".$_POST['country']."',mobile='".$_POST['mobile']."',address='".$_POST['address']."' WHERE email='".$_SESSION['email']."'");
	}
?>
<script type="text/javascript">alert("Complete."); location.href='../en/profile.php';</script>
</html>