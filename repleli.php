<?php
	
	//로그인 여부 확인
	if(isset($_SESSION['email'])) {
		$sign = 1;
	} else { $sign = 0; }

	include "../include/dbonline.php";
	$oidx = $_POST['idx'];
	$sql01 = mq("SELECT * FROM reple WHERE oidx = '$oidx' AND ridx = 0 ORDER BY datetime");

	//출력열 계산
	$row = $sql01->num_rows;
	
	while($reple = $sql01->fetch_array()) {
		
		$ridx = $reple['idx'];
		$email = $reple['email'];
		
		//날짜출력변환
		$repledatetime = $reple['datetime'];
		$replestrdatetime = strtotime($repledatetime);
		$repledatetimenew = date('y-m-d', $replestrdatetime);
		
		include "../include/timediff_reple.php";
		
		//유저네임검색
		$sql02 = mq("SELECT * FROM user WHERE email = '$email'");
		$user = $sql02->fetch_array();
		
		$profile = $user['profile'];
		$useridx = $user['idx'];
		if($profile == FALSE) { $profile = 'profile-img01.png'; }
?>
	<tr>
		<td class="reple-profile"><a href="../page/page.php?useridx=<?php echo $useridx; ?>"><img src="../../profileimg/<?php echo $profile; ?>"></a></td>
		<td class="reple-reple"><a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h5><b><?php echo $user['username']; ?></b></h5></a><p><?php echo $reple['reple']; ?></p><p class="reple-date"><?php echo $repletimediff; ?></p>
			<span class="reple-order">
				<p class="link rerepleac none" id="rereply<?php echo $ridx; ?>">답글</p>
				<?php if($email == $_SESSION['email']) { echo "<p class='bar'>&#305;</p><p class='link' id='reple-del".$ridx."'>삭제</p>"; }?>
				<span class="reple-del-st" id="reple-del-box<?php echo $ridx; ?>"><p style="color: #B81D93;"><b>삭제 할까요?</b></p><p class="link" id="reple-del-ac<?php echo $ridx; ?>">삭제</p><p class="link" id="reple-del-cc<?php echo $ridx; ?>">취소</p></span>
			</span>
		</td>
	</tr>
<script>
	//댓글 삭제
	$(document).ready(function() {
		$("#reple-del<?php echo $ridx; ?>").click(function() {
			$("#reple-del-box<?php echo $ridx; ?>").show();
			$("#reple-del<?php echo $ridx; ?>").hide();
		});
		$("#reple-del-cc<?php echo $ridx; ?>").click(function() {
			$("#reple-del-box<?php echo $ridx; ?>").hide();
			$("#reple-del<?php echo $ridx; ?>").show();
		});
		$("#reple-del-ac<?php echo $ridx; ?>").click(function() {
			$.ajax( { url: "../action/reple-del-ac.php", data: { idx: "<?php echo $ridx; ?>" }, method: "post"
			}).done(function(result) { location.reload(); });
		});
	});
</script>
	<tr>
		<td class="reply" id="rereple<?php echo $ridx; ?>" colspan="2">
		</td>
	</tr>
	<!-- 댓글의 댓글 -->
			<tr><td></td>
				<td>
					<table id="rerepleli<?php echo $ridx; ?>" class="rere">
						<?php
							//댓글의 답글 갯수
							$sql11 = mq("SELECT * FROM reple WHERE oidx = '$oidx' AND ridx = '$ridx' ORDER BY datetime");
							$rereplerow = $sql11->num_rows;
							$beforerereplerow = $rereplerow - 2;
					
							if( $rereplerow > 2 )
							{ echo "<td></td><td><p class='link' id='rereplemore{$ridx}'>...이전 답글 {$beforerereplerow}개</p></td></tr>"; }
							
							if(	$rereplerow > 2 ) {
								$sql09 = mq("SELECT * FROM reple WHERE oidx = '$oidx' AND ridx = '$ridx' ORDER BY datetime LIMIT $beforerereplerow, 2");
								while($rereple = $sql09->fetch_array()) {	
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
									$sql10 = mq("SELECT * FROM user WHERE email = '$email'");
									$user = $sql10->fetch_array();
									$useridx = $user['idx'];
						?>
						<tr>
							<td class="reple-profile"><b><p>&#8618;</p></b></td>
							<td class="reple-reple"><a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h5><b><?php echo $user['username']; ?></b></h5></a><p><?php echo $rereple['reple']; ?></p><p class="reple-date"><?php echo $repletimediff; ?></p></td>
						</tr>
						<?php } }
							else {
								$sql09 = mq("SELECT * FROM reple WHERE oidx = '$oidx' AND ridx = '$ridx' ORDER BY datetime LIMIT 2");
								while($rereple = $sql09->fetch_array()) {	
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
									$sql10 = mq("SELECT * FROM user WHERE email = '$email'");
									$user = $sql10->fetch_array();
									$useridx = $user['idx'];
						?>
						<tr>
							<td class="reple-profile"><b><p>&#8618;</p></b></td>
							<td class="reple-reple"><a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h5><b><?php echo $user['username']; ?></b></h5></a><p><?php echo $rereple['reple']; ?></p><p class="reple-date"><?php echo $repletimediff; ?></p></td>
						</tr>
						<?php } } ?>
					</table>
				</td>
			</tr>
<script>
	//댓글의 댓글 불러오기
	$(document).ready(function() {
		$("#rereplemore<?php echo $ridx; ?>").click(function() {
			$.ajax( {
				url: "../action/rerepleli.php",
				data: { oidx: "<?php echo $oidx; ?>", ridx: "<?php echo $ridx; ?>" },
				method: "post"
			})
			.done(function(result) { $("#rerepleli<?php echo $ridx; ?>").html(result); $("#rereplemore<?php echo $ridx; ?>").hide();
			});
		});
	});
	//댓글의 댓글
	$(document).ready(function() {
		$("#rereply<?php echo $ridx; ?>").click(function() {
			$.ajax( {
				url: "../include/rereply.php",
				data: { oidx: "<?php echo $oidx; ?>", ridx: "<?php echo $ridx; ?>" },
				method: "post"
			})
			.done(function(result) { $("#rereple<?php echo $ridx; ?>").html(result); $("#rereply<?php echo $ridx; ?>").hide();
			});
		});
	});
</script>
<?php } echo "<script> $(document).ready(function() { $('.rerepleac').hide(); }); </script>"; ?>
<?php
//로그인 여부
	if(isset($_SESSION['email'])) { 
		echo "<script> $(document).ready(function() { $('.rerepleac').show(); }); </script>";
	} else {
		echo "<script> $(document).ready(function() { $('.rerepleac').hide(); }); </script>";
	}
?>