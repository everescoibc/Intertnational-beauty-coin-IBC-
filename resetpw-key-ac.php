<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";
	
	//겟변수 대입
	$keypw = $_GET['keypw'];
		
	//키 체크
	$keycheck = "SELECT * FROM user WHERE keypw = '{$keypw}'";
	$res01 = $db->query($keycheck);

	//키 존재할 경우 세션 생성
	if($res01->num_rows == 1){
		$user = $res01->fetch_array();
		$_SESSION['keypw'] = $user['keypw'];
		$_SESSION['email'] = $user['email'];
		if(isset($_SESSION['keypw'])){
				header("Location: ../en/resetpw-pw.php");
			}
			else{
				echo "<script>alert('세션 생성 실패'); location.href='../en/sign-in.php';</script>";
			}
	}
	else{
		echo "<script>alert('허용되지 않은 키 값입니다.'); location.href='../en/sign-in.php';</script>";
	}
?>
</html>