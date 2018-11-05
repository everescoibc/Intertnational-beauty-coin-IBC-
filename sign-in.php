<?php include "../include/dbonline.php";?>
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
		<!-- 로그인 창 -->
		<div id="sign-in">
			<div class="sign-container">
				<form action="sign-ac/sign-in-ac.php" method="post">
					<div>
						<h1>로그인</h1>
					</div>
					<div>
						<p><b>이메일</b></p>
						<input name="email" id="email" type="email" placeholder="이메일 주소를 입력하세요." maxlength="30" required>
					</div>
					<div>
						<p><b>비밀번호</b></p>
						<input name="password" id="password" type="password" placeholder="비밀번호를 입력하세요." maxlength="15" required>
					</div>
					<div>
						<button class="bt-sign" type="submit">로그인</button>
					</div>
					<div class="forgotpw">
						<a href="resetpw.php">비밀번호가 생각나지 않으세요?</a>
					</div>
				</form>
			</div>
		</div>
		<!-- 회원가입 -->
		<div class="sign">
			아직 EVERESCO 계정이 없으세요? <a href="sign-up.php">회원가입</a>
		</div>
	</div>
	
</body>
	
</html>