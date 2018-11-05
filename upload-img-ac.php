<?php
	include "../include/dbonline.php";

	$email = $_POST['useremail'];
	$datetime = date('Y-m-d H:i:sa');
	$imgdatetime = date('YmdHisa');
	$dir = '../../uploadimg/'; //이미지 저장 경로

	//이미지 개수 계산
	$sql01 = mq("SELECT * FROM tempimg WHERE email = '$email'");
	$res01 = $sql01->num_rows; //이전 이미지 개수
	$filecount = count($_FILES['img']['name']); //전송된 이미지 개수
	$total = $filecount + $res01; //전체 이미지 개수

	//전체 이미지가 10개 이하일때
	if($total <= 10) {
		//전송된 이미지 배열만큼 반복문
		foreach ($_FILES['img']['name'] as $i => $filename){
			if($filename == TRUE) {
				$tmpfile = $_FILES['img']['tmp_name'][$i]; //임시 파일네임
				$utf8_kr_filename = iconv("EUC-KR", "UTF-8", $filename); //문자셋 UTF8로
				$fullname = $imgdatetime.'_'.$email.'_'.$utf8_kr_filename; //서버에 업로드될 파일 이름
				$folder = $dir.$fullname; //경로와 파일네임
				move_uploaded_file($tmpfile,$folder); //서버로 업로드
				//파일 인서트
				$sql03 = mq("INSERT INTO tempimg(email,file,aindex,datetime) VALUES('".$email."','".$fullname."','".$i."','".$datetime."')");
				//방금 인서트된 idx 불러오기
				$idxcheck = "SELECT MAX(idx) FROM tempimg";
				$res02 = $db->query($idxcheck);
				if($res02->num_rows == 1){
					$maxidx = $res02->fetch_array();
					$idx = $maxidx['MAX(idx)']; //마지막 idx값 대입
				}
				//임시 이미지 태그 생성
				echo "<img src='../../uploadimg/".$fullname."' id='tempimg".$idx."'><i id='imgcc".$idx."' class='material-icons img-cc' onclick='imgcc(".$idx.")'>close</i>";
			}
		}
		
	//전체 이미지가 10장 초과일때
	} else {
		echo "<script> $('#warning-text').html('사진은 10장까지 가능합니다.'); $('#warning-text').show(); setTimeout(function() { $('#warning-text').hide('fade', 500); }, 3000); </script>";
	}
?>