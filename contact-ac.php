<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";
	$datetime = date('Y-m-d H:i:sa');
	$reply = 0;

	//sql
	$sql = mq("INSERT INTO contact(email,username,subject,content,datetime,reply) 	VALUES('".$_SESSION['email']."','".$_SESSION['username']."','".$_POST['subject']."','".$_POST['content']."','".$datetime."','".$reply."')");
	
	
?>
<script type="text/javascript">alert("你的问题已经写好了。"); location.href='../cn/contact.php';</script>
</html>