<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "dbonline.php";

	$email = addslashes($_POST['email']);
	$idcheck = "SELECT * FROM user WHERE email = '{$email}'";
	$res01 = $db->query($idcheck);
	
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
	
	//이메일주소와 추천인이메일이 동일할 경우
	if($_POST['email'] == $_POST['referral']){
		echo "<script>alert('User E-mail and Referral E-mail should not be the same.'); location.href='../en/sign-up.php';</script>";
	}
	//아닐 경우
	else{
		
		//이메일 중복될 경우
		if($res01->num_rows == 1){
			echo "<script>alert('Already registered email.'); location.href='../en/sign-up.php';</script>";
		}
	
		//이메일 중복되지 않을경우
		else{
		
			//비번 일치여부 확인
			$pw = $_POST['password'];
			$repw = $_POST['repassword'];
		
			//일치할 경우
			if($pw == $repw){
				
				//함수 선언
				$datetime = date('Y-m-d H:i:sa');
				$authority = 1;
				$keyem = generateRandomString(20);

				//비밀번호 함수화
				//$userpw = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
				//sql 회원정보 전송
				$sql = mq("INSERT INTO user(email,username,password,referral,datetime,authority,keyem) VALUES('".$_POST['email']."','".$_POST['username']."','".$_POST['password']."','".$_POST['referral']."','".$datetime."','".$authority."','".$keyem."')");
			
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
    				$mail->AddAddress($_POST['email']); // 받을 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    				$mail->Subject = '[EVERESCO] Please verify your email address.'; // 메일 제목
    				$mail->Body = 
						'<h3 style="color: black;">Hello '.$_POST['username'].'. Welcome to EVERESCO.<br>Click the link to complete your email verification.</h3>
						<a href="http://everesco.org/dashboard/action-kr/verify-key-ac.php?keyem='.$keyem.'">http://everesco.org/dashboard/action-kr/verify-key-ac.php?keyem='.$keyem.'</a>
						<br><br><h3>Thank you.</h3>'
						;
			
    				$mail->Send();

				} catch (phpmailerException $e) {
    			echo $e->errorMessage(); //Pretty error messages from PHPMailer
				} catch (Exception $e) {
    			echo $e->getMessage(); //Boring error messages from anything else!
				}
			
			}
		
			//일치하지 않을 경우
			else{
				echo "<script>alert('Passwords do not match.'); location.href='../en/sign-up.php';</script>";
			}
		}
	}	
?>
<script type="text/javascript">alert("Welcome to EVERESCO. Please verify your email address."); location.href='../en/sign-in.php';</script>
</html>