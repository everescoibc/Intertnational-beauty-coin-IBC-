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

//포스트 변수대입
	$email = addslashes($_POST['email']);

	//이메일 체크 전송
	$idcheck = "SELECT * FROM user WHERE email = '{$email}'";
	$res01 = $db->query($idcheck);

	//이메일 일치
	if($res01->num_rows == 1){
		
		//랜덤 문자열 생성후 등록
		$resetpw = generateRandomString(20);
		$sql = mq("UPDATE user SET keypw='".$resetpw."' WHERE email='{$email}'");

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
    		$mail->AddAddress($email); // 받을 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    		$mail->Subject = '[EVERESCO] 密码更改指南。'; // 메일 제목
    		$mail->Body = 
				'<h3 style="color: black;">点击下面的链接进行密码重置。</h3>
				<a href="http://everesco.org/dashboard/action-kr/resetpw-key-ac.php?keypw='.$resetpw.'">
				http://everesco.org/dashboard/action-kr/resetpw-key-ac.php?keypw='
				.$resetpw.'</a>
				<br><br><h3>谢谢。</h3>'
				;
			
    		$mail->Send();
			
			echo "<script>alert('请检查您的电子邮件并更改密码。'); location.href='../cn/sign-in.php';</script>";

		} catch (phpmailerException $e) {
    		echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
    		echo $e->getMessage(); //Boring error messages from anything else!
		}
	}
	//일치하지 않을 경우
	else {
		echo "<script>alert('此邮箱未注册。'); location.href='../cn/resetpw.php';</script>";
	}
?>
</html>