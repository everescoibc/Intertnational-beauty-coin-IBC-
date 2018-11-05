<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "../include/dbonline.php";
	$datetime = date('Y-m-d H:i:sa');
	$imgdatetime = date('-YmdHisa-');
	
	//파일 업로드
	$dir = '../../profileimg/';//경로
	
	$filename = $_FILES['p_img']['name'];
	$tmpfile = $_FILES['p_img']['tmp_name'];
	$utf8_kr_filename = iconv("EUC-KR", "UTF-8", $filename);
	$fullname = $_SESSION['email'].$imgdatetime.$utf8_kr_filename;
	$folder = $dir.$fullname;
	move_uploaded_file($tmpfile,$folder);
		
	//프로필 인서트
	$sql01 = mq("INSERT INTO profile(email,file,datetime) VALUES('".$_SESSION['email']."','".$fullname."','".$datetime."')");
	
	//유저 업데이트
	$sql02 = mq("UPDATE user SET profile='".$fullname."' WHERE email='".$_SESSION['email']."'");
?>
<script type="text/javascript">alert("변경 되었습니다."); location.href='../mypage/mypage.php';</script>
</html>