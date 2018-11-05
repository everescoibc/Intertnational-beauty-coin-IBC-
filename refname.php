<?php
	include "dbonline.php";
	$referral = $_REQUEST["q"];

	//래퍼럴 조회
	$refcheck = "SELECT * FROM user WHERE email = '{$referral}'";
	$res01 = $db->query($refcheck);
	if($res01->num_rows == 1){
		$refuser = $res01->fetch_array();
		$refusername = $refuser['username'];
		echo "<h3 class='refname'>搜索的推荐人: {$refusername}</h3>";
	}
	else{
		$refusername = '없음';
		echo "<h3 class='refnameno'>无搜索的推荐人。</h3>";
	}
	if($refusername == FALSE){
		$refusername = '없음';
		echo "<h3 class='refnameno'>无搜索的推荐人。</h3>";
	}
?>