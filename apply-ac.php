<?php

include "../dbonline.php";

$pw = $_POST['password'];
$pwcf = $_POST['passwordcf'];

if($pw = $pwcf){
	
	//날짜 선언
	$date = date('Y-m-d');
	$payment = 'ETH';
	$process = '접수';
	
	$amount = $_POST['amount'];
	$receive = $amount * 50000;
	
	//sql 명령 실행
	$sql = mq("insert into apply(name,email,password,branch,payment,amount,receive,date,referral,process) values('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."','".$_POST['branch']."','".$payment."','".$amount."','".$receive."','".$date."','".$_POST['recommender']."','".$process."')");

	//신청 완료
	echo '<script type="text/javascript">alert("구매 신청이 접수되었습니다."); location.href="apply-w.php";</script>';
	
}
else{
	echo '<script type="text/javascript">alert("비밀번호가 일치하지 않습니다."); location.href="apply-w.php";</script>';
}

?>