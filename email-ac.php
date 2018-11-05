<?php
require_once("../../library/phpmailer/class.phpmailer.php");

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {

    $mail->Host = "smtp.gmail.com"; // email 보낼때 사용할 서버를 지정
    $mail->SMTPAuth = true; // SMTP 인증을 사용함
    $mail->Port = 465; // email 보낼때 사용할 포트를 지정
    $mail->SMTPSecure = "ssl"; // SSL을 사용함
    $mail->Username   = "jingooya001@gmail.com"; // Gmail 계정
    $mail->Password   = "xxfsmzujqcqqjrdd"; // 패스워드

    $mail->SetFrom('jingooya001@gmail.com'); // 보내는 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    $mail->AddAddress('jingooya001@gmail.com'); // 받을 사람 email 주소와 표시될 이름 (표시될 이름은 생략가능)
    $mail->Subject = 'Email Subject'; // 메일 제목
    $mail->MsgHTML(file_get_contents('contents.html')); // 메일 내용 (HTML 형식도 되고 그냥 일반 텍스트도 사용 가능함)

    $mail->Send();

    echo "Message Sent OK";

}catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
}
?>