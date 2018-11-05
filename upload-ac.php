<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "../include/dbonline.php";
	$datetime = date('Y-m-d H:i:sa');
	$content = addslashes($_POST['content']); //따옴표 앞에 역슬래시 함수
	$email = $_SESSION['email'];
	
	//게시물 인서트
	$sql01 = mq("INSERT INTO contents(email,content,datetime) VALUES('".$email."','".$content."','".$datetime."')");
	
	//방금 인서트된 idx 구하기
	$idxcheck = "SELECT MAX(idx) FROM contents";
	$res01 = $db->query($idxcheck);
	if($res01->num_rows == 1){
		$maxidx = $res01->fetch_array();
		$idx = $maxidx['MAX(idx)']; //마지막 idx값 대입
		
		//임시 이미지 정보 불러오기
		$sql02 = mq("SELECT * FROM tempimg WHERE email = '$email' ORDER BY datetime, aindex");
		//불러온 정보 인서트
		$i = 0;
		while($tempimg = $sql02->fetch_array()) {
			$file = $tempimg['file'];
			$datetime = $tempimg['datetime'];
			$sql03 = mq("INSERT INTO imgfiles(oidx,aindex,file,datetime) VALUES('".$idx."','".$i."','".$file."','".$datetime."')");
			$i++;
		}
		//임시 이미지 정보 삭제
		$sql03 = mq("DELETE FROM tempimg WHERE email = '$email'");
	}
?>
<script type="text/javascript">alert("작성 되었습니다."); location.href='../story/index.php';</script>
</html>