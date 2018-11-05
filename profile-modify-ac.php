<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";
	
	//추천인 이메일과 회원 이메일이 동일할 경우
	if($_POST['referral'] == $_SESSION['email']){
		echo "<script>alert('推荐人邮箱与本人会员邮箱不能重复。'); location.href='../cn/profile-modify.php';</script>";
	}
	//아닐 경우
	else{
		$sql = mq("UPDATE user SET username='".$_POST['username']."',referral='".$_POST['referral']."',country='".$_POST['country']."',mobile='".$_POST['mobile']."',address='".$_POST['address']."' WHERE email='".$_SESSION['email']."'");
	}
?>
<script type="text/javascript">alert("修改成功。"); location.href='../cn/profile.php';</script>
</html>