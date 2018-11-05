<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";
	
	//변수 선언
	$datetime = date('Y-m-d H:i:sa');
	$payment = 'ETH';
	$eth = $_POST['eth'];
	$ibc = $eth * 50000;
	$process = 1;
	
	//sql 명령 실행
	$sql = mq("INSERT INTO orderibc(email,username,payment,eth,ibc,datetime,wallet,process) VALUES('".$_SESSION['email']."','".$_SESSION['username']."','".$payment."','".$eth."','".$ibc."','".$datetime."','".$_SESSION['wallet']."','".$process."')");
?>
<script type="text/javascript">alert("IBC order has been applied. Your payment address will be sent by email. Please check your dashboard for IBC order progress."); location.href='../en/main.php';</script>
</html>