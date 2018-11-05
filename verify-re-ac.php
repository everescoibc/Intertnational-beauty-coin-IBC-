<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";
	
	//랜덤 문자열 생성 함수
	function generateRandomString($length = 10) {
    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < $length; $i++) {
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
	}
	
	//키 생성과 키 재등록
	$keyem = generateRandomString(20);
	$sql = mq("UPDATE user SET keyem='".$keyem."' WHERE email='".$_SESSION['email']."'");
	
	//인증메일 발송
	require_once("../../library/phpmailer/class.phpmailer.php");
	$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	$mail->IsSMTP(); // telling the class to use SMTP

	try {

    	$mail->Host = "smtp-relay.gmail.com"; // email 보낼때 사용할 서버를 지정
   		$mail->SMTPAuth = true; // SMTP 인증을 사용함
    	$mail->Port = 465; // email 보낼때 사용할 포트를 지정
    	$mail->SMTPSecure = "ssl"; // SSL을 사용함
    	$mail->Username   = "contact@everesco.kr"; // Gmail 계정
    	$mail->Password   = "eaifnsuqtwntmbzg"; // 패스워드

    	$mail->CharSet = "utf-8";
		$mail->IsHTML(true);
		$mail->SetFrom('contact@everesco.kr', 'EVERESCO'); // 보내는 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    	$mail->AddAddress($_SESSION['email']); // 받을 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    	$mail->Subject = '[EVERESCO] Please verify your email address.'; // 메일 제목
    	$mail->Body = 
			'<h3 style="color: black;">Hello '.$_SESSION['username'].'. We are EVERESCO.<br>Click the link to complete your email verification.</h3>
			<a href="http://everesco.org/dashboard/action-kr/verify-key-ac.php?keyem='.$keyem.'">http://everesco.org/dashboard/action-kr/verify-key-ac.php?keyem='.$keyem.'</a>
			<br><br><h3>Thank you.</h3>'
			;
			
    	$mail->Send();

	} catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
	} catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
	}
?>
<script type="text/javascript">alert("Verification email resent. Please verify your email address."); location.href='../en/main.php';</script>
</html>