<?php
	$email = $_SESSION['email'];

	//프로필 최신화
	$idcheck = "SELECT * FROM user WHERE email = '{$email}'";
	$res01 = $db->query($idcheck);
	if($res01->num_rows == 1){
		$user = $res01->fetch_array();
		$_SESSION['idx'] = $user['idx'];
		$_SESSION['confirm'] = $user['confirm'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['username'] = $user['username'];
		$_SESSION['referral'] = $user['referral'];
		$_SESSION['datetime'] = $user['datetime'];
		$_SESSION['profile'] = $user['profile'];
		$_SESSION['wallet'] = $user['wallet'];
		$_SESSION['ibc'] = $user['ibc'];
		$_SESSION['ibcw'] = $user['ibcw'];
		$_SESSION['eth'] = $user['eth'];
		$_SESSION['rmb'] = $user['rmb'];
		$_SESSION['country'] = $user['country'];
		$_SESSION['mobile'] = $user['mobile'];
		$_SESSION['address'] = $user['address'];
		$_SESSION['authority'] = $user['authority'];
	}
?>