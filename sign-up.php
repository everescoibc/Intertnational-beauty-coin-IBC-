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
		<!-- 회원가입 -->
		<div id="sign-up">
			<div class="register-container">
				<form action="sign-ac/sign-up-ac.php" method="post">
					<div>
						<h1>회원가입</h1>
					</div>
					<div>
						<p><b>이메일 *</b></p>
						<input name="email" id="email" type="email" placeholder="이메일 주소를 입력하세요." maxlength="30" required>
					</div>
					<div>
						<p><b>이름 *</b></p>
						<input name="username" id="username" type="text" placeholder="이름을 입력하세요." maxlength="20" required>
					</div>
					<div>
						<p><b>비밀번호 *</b></p>
						<input name="password" id="password" type="password" placeholder="비밀번호를 입력하세요." minlength="8" maxlength="15" required>
					</div>
					<div>
						<p><b>비밀번호 확인 *</b></p>
						<input name="repassword" id="repassword" type="password" placeholder="비밀번호를 다시 입력하세요." minlength="8" maxlength="15" required>
					</div>
					<div>
						<input class="checkbox" name="terms" id="terms" type="checkbox" value="accept" required>이용약관에 동의합니다. <a href="#termscon" id="termson">이용약관 보기</a>
					</div>
					<div>
						<button class="bt-sign" type="submit">회원가입</button>
					</div>
				</form>
			</div>
		</div>
		<?php include './terms.php';?>
		<!-- 로그인 -->
		<div class="sign">
			이미 계정이 있으신가요? <a href="sign-in.php">로그인</a>
		</div>
	</div>
	
</body>
	
</html>