<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";
	
	//겟변수 대입
	$keyem = $_GET['keyem'];
		
	//키 체크
	$keycheck = "SELECT * FROM user WHERE keyem = '{$keyem}'";
	$res01 = $db->query($keycheck);

	//키 존재할 경우
	if($res01->num_rows == 1){
		$sql = mq("UPDATE user SET confirm='1' WHERE keyem='{$keyem}'");
		
		$user = $res01->fetch_array();
		$_SESSION['confirm'] = 1;
	}
	else{
		echo "<script>alert('没有认证。'); location.href='../cn/sign-in.php';</script>";
	}
?>
<script type="text/javascript">alert("您的电子邮件已经过验证。"); location.href='../cn/main.php';</script>
</html>