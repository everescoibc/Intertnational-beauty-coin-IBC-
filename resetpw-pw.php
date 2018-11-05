<?php
	include "../include/dbonline.php";
	if(isset($_SESSION['keypw'])){
	}
	else{
		echo "<script>location.href='sign-in.php';</script>";
	}
?>
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--타이틀-->
<link rel="icon" href="../../img/everesco-com-tlogo04.png">
<title>EVERESCO Community</title>
<!--CSS&font&icon-->
<link rel="stylesheet" href="../../styles/sign-st-def.css">
<link rel="stylesheet" href="../../styles/sign-st-mo.css">
<link rel="stylesheet" href="../../styles/sign-st-ta.css">
<link rel="stylesheet" href="../../styles/sign-st-pc.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--Jquery&script-->
<script src="../../script/jquery-3.3.1.min.js"></script>
<script src="../../script/jquery-ui.js"></script>
</head>

<body>
	
	<div class="container">
		<!-- 로그인 이미지 -->
		<center><div class="sign-logo"><a href="../story/index.php"><img src="../../img/everesco-logo01.png"></a></div></center>
		<!-- 비밀번호 재설정 -->
		<div id="sign-in">
			<div class="sign-container">
				<form action="sign-ac/resetpw-pw-ac.php" method="post">
					<div>
						<h1>비밀번호 재설정</h1>
					</div>
					<div><?php echo $_SESSION['email'];?></div>
					<div>
						<p><b>새 비밀번호</b></p>
						<input name="password" id="password" type="password" placeholder="새로운 비밀번호를 입력하세요." minlength="8" maxlength="15" required>
					</div>
					<div>
						<p><b>새 비밀번호 확인</b></p>
						<input name="repassword" id="repassword" type="password" placeholder="비밀번호를 다시 입력하세요." minlength="8" maxlength="15" required>
					</div>
					<div>
						<button class="bt-sign" type="submit">비밀번호 재설정</button>
					</div>
				</form>
			</div>
		</div>
		<!-- 로그인 -->
		<div class="sign">
			이미 비밀번호를 재설정 하셨나요? <a href="sign-in.php">로그인</a>
		</div>
	</div>
	
</body>
	
</html>