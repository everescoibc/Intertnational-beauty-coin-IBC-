<?php

	include "../include/dbonline.php";

	$oidx = $_POST['oidx'];
	$ridx = $_POST['ridx'];
	$sql01 = mq("SELECT * FROM reple WHERE oidx = '$oidx' AND ridx = '$ridx' ORDER BY datetime");
					
	while($rereple = $sql01->fetch_array()) {	
		//유저네임검색과 날짜변환
		$email = $rereple['email'];
		$repledatetime = $rereple['datetime'];
		$replestrdatetime = strtotime($repledatetime);
		$repledatetimenew = date('y-m-d', $replestrdatetime);
		//시간 차이 계산
		$res06 = (strtotime(date('Y-m-d H:i:s')) - strtotime($repledatetime)) / 3600; //시간차 결과값
		if($res06 <= 0.5) { $repletimediff = '지금'; }
		elseif($res06 <= 1) { $repletimediff = '30분 전'; }
		elseif($res06 <= 2) { $repletimediff = '1시간 전'; }
		elseif($res06 <= 3) { $repletimediff = '2시간 전'; }
		elseif($res06 <= 4) { $repletimediff = '3시간 전'; }
		elseif($res06 <= 5) { $repletimediff = '4시간 전'; }
		elseif($res06 <= 6) { $repletimediff = '5시간 전'; }
		elseif($res06 <= 7) { $repletimediff = '6시간 전'; }
		elseif($res06 <= 8) { $repletimediff = '7시간 전'; }
		elseif($res06 <= 9) { $repletimediff = '8시간 전'; }
		elseif($res06 <= 10) { $repletimediff = '9시간 전'; }
		elseif($res06 <= 11) { $repletimediff = '10시간 전'; }
		elseif($res06 <= 12) { $repletimediff = '11시간 전'; }
		elseif($res06 <= 13) { $repletimediff = '12시간 전'; }
		elseif($res06 <= 24) { $repletimediff = '오늘'; }
		elseif($res06 <= 48) { $repletimediff = '어제'; }
		elseif($res06 > 48) { $repletimediff = $repledatetimenew; }
		$sql02 = mq("SELECT * FROM user WHERE email = '$email'");
		$user = $sql02->fetch_array();
		$useridx = $user['idx'];
?>
<tr>
	<td class="reple-profile"><b><p>&#8618;</p></b></td>
	<td class="reple-reple"><a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h5><b><?php echo $user['username']; ?></b></h5></a><p><?php echo $rereple['reple']; ?></p><p class="reple-date"><?php echo $repletimediff; ?></p></td>
</tr>
<?php } ?>