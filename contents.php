<i class="material-icons" id="fullscreenoff" class="close">close</i>
<div id="fullscreen" class="black-bg">
</div>
<?php
	//게시물 페이징
	$sql00 = mq("SELECT * FROM contents ORDER BY idx DESC");
	$total = $sql00->num_rows; //전체 레코드 수
	$num = 10; //한번에 불러올 레코드
	$totalpage = ceil($total/$num); //총 페이지 
	$page = 1; //현재 페이지

	//첫페이지 게시물 불러오기
	$sql01 = mq("SELECT * FROM contents ORDER BY idx DESC LIMIT $num");
    while($contents = $sql01->fetch_array()) {
		$idx = $contents['idx'];
		$email = $contents['email'];
		$content = str_replace("\r\n","<br>",$contents['content']); //줄바꿈 br태그로 대채
		//날짜출력변환
		$datetime = $contents['datetime'];
		$strdatetime = strtotime($datetime);
		$codatetime = date('Y년 m월 d일', $strdatetime);
		include "../include/timediff.php";
		//유저 정보 불러오기
		$sql02 = mq("SELECT * FROM user WHERE email = '$email'");
		$user = $sql02->fetch_array();
		$useridx = $user['idx'];
		$username = $user['username'];
		$profile = $user['profile'];
		if($profile == FALSE) { $profile = 'profile-img01.png'; }
?>
<div class="contents-box contents-margin">
	
	<!--유저 정보-->
	<span class="upload-profile">
		<a href="../page/page.php?useridx=<? echo $useridx; ?>"><img src="../../profileimg/<? echo $profile; ?>"></a>
		<a href="../page/page.php?useridx=<? echo $useridx; ?>"><h4><? echo $username; ?></h4></a>
	</span>
	<!--날짜, 수정과 삭제-->
	<span class="upload-date">	
<?php
	//본인 게시물일 경우
	if($email == $_SESSION['email']) {
		echo "<p>".$timediff."</p>";
		echo "<p class='link' onClick='deleteTog(".$idx.")'>삭제</p>";
		echo "<p class='link' onClick='modify(".$idx.")'>수정</p>";
	//아닐 경우
	} else {
		echo "<p>".$timediff."</p>";
	}
?>
		<!--삭제 선택창-->
		<div class="con-delete" id="delete-box<? echo $idx; ?>">
			<center>
			<p>해당 글을 정말 삭제 하시겠어요?</p>
			<button class="bt-del" id="delete-ac<? echo $idx; ?>" type="button" onClick="deleteAc(<? echo $idx; ?>)">삭제</button>
			<button class="bt-del" id="delete-cc<? echo $idx; ?>" type="button" onClick="deleteCc(<? echo $idx; ?>)">취소</button>
			</center>
		</div>
	</span>
	<!--컨텐츠 텍스트-->
	<div class="con-text">
		<p id="content-text<? echo $idx; ?>" class="content-p"><? echo $content; ?></p>
		<p class="link" id="more<? echo $idx; ?>" onClick="readMore(<? echo $idx; ?>)">...더 보기</p>
	</div>
	<!--컨텐츠 이미지-->
	<center>
	<div class="con-img">
		<span class="bt-arrow imgleft" id="left<? echo $idx; ?>" onclick="plusSlides<? echo $idx; ?>(-1)"><i class="material-icons">keyboard_arrow_left</i></span>
		<span class="bt-arrow imgright" id="right<? echo $idx; ?>" onclick="plusSlides<? echo $idx; ?>(1)"><i class="material-icons">keyboard_arrow_right</i></span>
<?php
	$sql03 = mq("SELECT * FROM imgfiles WHERE oidx = '$idx' ORDER BY aindex LIMIT 10");
	$row = $sql03->num_rows;
	while($imgfiles = $sql03->fetch_array()) {
		$aidx = $imgfiles['aindex'] + 1;
		$file = $imgfiles['file'];
?>
		<div class="img<? echo $idx; ?>">
			<img src="../../uploadimg/<? echo $file; ?>" class="fade">
			<p id="<? echo $idx; ?>"><? if($row != 1){ echo $aidx.' / '.$row; }?></p>
		</div>
<?	} ?>
	</div>
	</center>
<script>
	//더보기,이미지 화살표 유무
	$(document).ready(function() {
		moreShow(<? echo $idx; ?>);
		arrowShow(<? echo $idx; ?>, <? echo $row; ?>);
	});
	//슬라이드 인덱스
	var slideIndex<? echo $idx; ?> = 1;
	showSlides<? echo $idx; ?>(slideIndex<? echo $idx; ?>);
	function plusSlides<? echo $idx; ?>(n) { showSlides<? echo $idx; ?>(slideIndex<? echo $idx; ?> += n); }
	function currentSlide<? echo $idx; ?>(n) { showSlides<? echo $idx; ?>(slideIndex<? echo $idx; ?> = n); }
	//슬라이드
	function showSlides<? echo $idx; ?>(n) {
  		var i;
  		var slides<? echo $idx; ?> = document.getElementsByClassName("img<? echo $idx; ?>");
  		if (n > slides<? echo $idx; ?>.length) {slideIndex<? echo $idx; ?> = 1}    
  		if (n < 1) {slideIndex<? echo $idx; ?> = slides<? echo $idx; ?>.length}
  		for (i = 0; i < slides<? echo $idx; ?>.length; i++) {
      		slides<? echo $idx; ?>[i].style.display = "none";  
  		}
  		slides<? echo $idx; ?>[slideIndex<? echo $idx; ?>-1].style.display = "block";  
	}
</script>

	<!-- 좋아요, 업다운 -->
	<div class="con-info">
		<div class="info-bt">
<?php
	//본인의 좋아요 여부 확인
	$uidx = $_SESSION['idx'];
	$myemail = $_SESSION['email'];
	$sql06 = mq("SELECT * FROM likeno WHERE useridx = '$uidx' AND oidx = '$idx'");
	$mylikerow = $sql06->num_rows;
	//좋아요 아직 안했을 경우
	if($mylikerow == 0){ echo "<span class='likeshow' id='like{$idx}' onClick='likeUp({$idx}, {$uidx}, {$useridx})'><i class='material-icons'>favorite_border</i></span><span class='likehide' id='dislike{$idx}' class='dislike' onClick='likeDown({$idx}, {$uidx}, {$useridx})'><i class='material-icons'>favorite</i></span>";
	//좋아요 이미 했을 경우
	} else { echo "<span class='likehide' id='like{$idx}' onClick='likeUp({$idx}, {$uidx}, {$useridx})'><i class='material-icons'>favorite_border</i></span><span class='likeshow' id='dislike{$idx}' class='dislike' onClick='likeDown({$idx}, {$uidx}, {$useridx})'><i class='material-icons'>favorite</i></span>"; }
?>
			<span id="share<? echo $idx; ?>"><i class="material-icons">share</i></span>
		</div>
<?php
	//좋아요 개수 불러오기
	$sql05 = mq("SELECT * FROM likeno WHERE oidx = '$idx'");
	$like = $sql05->num_rows;
	if($like == FALSE) { $like = 0; }
?>
		<div class="info-info">
			<p id="likeno<? echo $idx; ?>">좋아요 <? echo $like; ?>개</p>
			<p>공유 0개</p>
		</div>
	</div>
	
	<!-- 댓글 -->
	<div class="con-reple" id="con-reple<? echo $idx; ?>">
		<table id="repleli<? echo $idx; ?>">
<?php
	//댓글 정보 불러오기
	$sql06 = mq("SELECT * FROM reple WHERE oidx = '$idx' AND ridx = 0 ORDER BY datetime LIMIT 5");
	while($reple = $sql06->fetch_array()) {
		$ridx = $reple['idx'];
		$email = $reple['email'];	
		//날짜출력변환
		$repledatetime = $reple['datetime'];
		$replestrdatetime = strtotime($repledatetime);
		$repledatetimenew = date('y-m-d', $replestrdatetime);
		include "../include/timediff_reple.php";

		//유저네임검색
		$sql07 = mq("SELECT * FROM user WHERE email = '$email'");
		$user = $sql07->fetch_array();	
		$profile = $user['profile'];
		$useridx = $user['idx'];
		if($profile == FALSE) { $profile = 'profile-img01.png'; }
?>
			<tr>
				<td class="reple-profile"><a href="../page/page.php?useridx=<? echo $useridx; ?>"><img src="../../profileimg/<? echo $profile; ?>"></a></td>
				<td class="reple-reple"><a href="../page/page.php?useridx=<? echo $useridx; ?>"><h5><b><? echo $user['username']; ?></b></h5></a><p><? echo $reple['reple']; ?></p><p class="reple-date"><? echo $repletimediff; ?></p>
					<span class="reple-order">
						<p class="link rerepleac none" id="rereply<? echo $ridx; ?>">답글</p>
						<? if($email == $_SESSION['email']) { echo "<p class='bar'>&#305;</p><p class='link' id='reple-del".$ridx."'>삭제</p>"; }?>
						<span class="reple-del-st" id="reple-del-box<? echo $ridx; ?>"><p style="color: #B81D93;"><b>삭제 할까요?</b></p><p class="link" id="reple-del-ac<? echo $ridx; ?>">삭제</p><p class="link" id="reple-del-cc<? echo $ridx; ?>">취소</p></span>
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
							$sql11 = mq("SELECT * FROM reple WHERE oidx = '$idx' AND ridx = '$ridx' ORDER BY datetime");
							$rereplerow = $sql11->num_rows;
							$beforerereplerow = $rereplerow - 2;
					
							if( $rereplerow > 2 )
							{ echo "<td></td><td><p class='link' id='rereplemore{$ridx}'>...이전 답글 {$beforerereplerow}개</p></td></tr>"; }
							
							if(	$rereplerow > 2 ) {
								$sql09 = mq("SELECT * FROM reple WHERE oidx = '$idx' AND ridx = '$ridx' ORDER BY datetime LIMIT $beforerereplerow, 2");
								while($rereple = $sql09->fetch_array()) {	
									//유저네임검색과 날짜변환
									$rridx = $rereple['idx'];
									$email = $rereple['email'];
									$repledatetime = $rereple['datetime'];
									$replestrdatetime = strtotime($repledatetime);
									$repledatetimenew = date('y-m-d', $replestrdatetime);
									include "../include/timediff_reple.php";
									
									$sql10 = mq("SELECT * FROM user WHERE email = '$email'");
									$user = $sql10->fetch_array();
									$useridx = $user['idx'];
						?>
						<tr>
							<td class="reple-profile"><b><p>&#8618;</p></b></td>
							<td class="reple-reple">
								<a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h5><b><?php echo $user['username']; ?></b></h5></a>
								<p><?php echo $rereple['reple']; ?></p>
								<p class="reple-date"><?php echo $repletimediff; ?></p>
								<?php if($email == $_SESSION['email']) { echo "<p class='link' id='rereple-del".$rridx."'>삭제</p>"; }?>
								<span class="reple-del-st" id="rereple-del-box<?php echo $rridx; ?>"><p style="color: #B81D93;"><b>삭제 할까요?</b></p><p class="link" id="rereple-del-ac<?php echo $rridx; ?>">삭제</p><p class="link" id="rereple-del-cc<?php echo $rridx; ?>">취소</p></span>
							</td>
						</tr>
<script>
	//댓글의 댓글 삭제
	$(document).ready(function() {
		$("#rereple-del<?php echo $rridx; ?>").click(function() {
			$("#rereple-del-box<?php echo $rridx; ?>").show();
			$("#rereple-del<?php echo $rridx; ?>").hide();
		});
		$("#rereple-del-cc<?php echo $rridx; ?>").click(function() {
			$("#rereple-del-box<?php echo $rridx; ?>").hide();
			$("#rereple-del<?php echo $rridx; ?>").show();
		});
		$("#rereple-del-ac<?php echo $rridx; ?>").click(function() {
			$.ajax( { url: "../action/rereple-del-ac.php", data: { idx: "<?php echo $rridx; ?>" }, method: "post"
			}).done(function(result) { location.reload(); });
		});
	});
</script>
						<?php } }
							else {
								$sql09 = mq("SELECT * FROM reple WHERE oidx = '$idx' AND ridx = '$ridx' ORDER BY datetime LIMIT 2");
								while($rereple = $sql09->fetch_array()) {	
									//유저네임검색과 날짜변환
									$rridx = $rereple['idx'];
									$email = $rereple['email'];
									$repledatetime = $rereple['datetime'];
									$replestrdatetime = strtotime($repledatetime);
									$repledatetimenew = date('y-m-d', $replestrdatetime);
									//시간 차이 계산
									include "../include/timediff_reple.php";
									
									$sql10 = mq("SELECT * FROM user WHERE email = '$email'");
									$user = $sql10->fetch_array();
									$useridx = $user['idx'];
						?>
						<tr>
							<td class="reple-profile"><b><p>&#8618;</p></b></td>
							<td class="reple-reple">
								<a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h5><b><?php echo $user['username']; ?></b></h5></a>
								<p><?php echo $rereple['reple']; ?></p>
								<p class="reple-date"><?php echo $repletimediff; ?></p>
								<?php if($email == $_SESSION['email']) { echo "<p class='link' id='rereple-del".$rridx."'>삭제</p>"; }?>
								<span class="reple-del-st" id="rereple-del-box<?php echo $rridx; ?>"><p style="color: #B81D93;"><b>삭제 할까요?</b></p><p class="link" id="rereple-del-ac<?php echo $rridx; ?>">삭제</p><p class="link" id="rereple-del-cc<?php echo $rridx; ?>">취소</p></span>
							</td>
						</tr>
<script>
	//댓글의 댓글 삭제
	$(document).ready(function() {
		$("#rereple-del<?php echo $rridx; ?>").click(function() {
			$("#rereple-del-box<?php echo $rridx; ?>").show();
			$("#rereple-del<?php echo $rridx; ?>").hide();
		});
		$("#rereple-del-cc<?php echo $rridx; ?>").click(function() {
			$("#rereple-del-box<?php echo $rridx; ?>").hide();
			$("#rereple-del<?php echo $rridx; ?>").show();
		});
		$("#rereple-del-ac<?php echo $rridx; ?>").click(function() {
			$.ajax( { url: "../action/rereple-del-ac.php", data: { idx: "<?php echo $rridx; ?>" }, method: "post"
			}).done(function(result) { location.reload(); });
		});
	});
</script>
						<?php } } ?>
					</table>
				</td>
			</tr>
<script>
	//댓글의 댓글 불러오기
	$(document).ready(function() {
		$("#rereplemore<?php echo $ridx; ?>").click(function() {
			$.ajax( { url: "../action/rerepleli.php", data: { oidx: "<?php echo $idx; ?>", ridx: "<?php echo $ridx; ?>" }, method: "post" })
			.done(function(result) { $("#rerepleli<?php echo $ridx; ?>").html(result); $("#rereplemore<?php echo $ridx; ?>").hide(); });
	});});
	//댓글의 댓글
	$(document).ready(function() {
		$("#rereply<?php echo $ridx; ?>").click(function() {
			$.ajax( { url: "../include/rereply.php", data: { oidx: "<?php echo $idx; ?>", ridx: "<?php echo $ridx; ?>" }, method: "post" })
			.done(function(result) { $("#rereple<?php echo $ridx; ?>").html(result); });
	});});
</script>
			<?php } ?>
		</table>
		<?php
			$sql08 = mq("SELECT * FROM reple WHERE oidx = '$idx' AND ridx = 0 ORDER BY datetime");
			$replerow = $sql08->num_rows;
		?>
		<p class="link" id="replemore<?php echo $idx; ?>"><?php if($replerow > 5) { echo "댓글 {$replerow}개 모두 보기"; } ?></p>
		<?php if($replerow != 0) { echo "<div class='repleline'></div>"; } ?>
	</div>
	<form class="reply">
		<textarea name="reple" id="reple<?php echo $idx; ?>" placeholder="댓글 달기..." maxlength="150" required></textarea><button id="reple<?php echo $idx; ?>-submit"><i class="material-icons">chat_bubble_outline</i></button>
	</form>
	<a href="../sign/sign-in.php"><p class="sign-out-reply none link">댓글을 달려면 로그인이 필요합니다.</p></a>
</div>
<script>
	//전체 댓글 불러오기
	$(document).ready(function() {
		$("#replemore<?php echo $idx; ?>").click(function() {
			$.ajax( { url: "../action/repleli.php", data: { idx: "<?php echo $idx; ?>" }, method: "post" })
			.done(function(result) { $("#repleli<?php echo $idx; ?>").html(result); $("#replemore<?php echo $idx; ?>").hide(); });
	});});
	//댓글 ajax
	$(document).ready(function() {
		$("#reple<?php echo $idx; ?>-submit").click(function(e) {
			e.preventDefault(); //새로고침 미발생
			$.ajax( {
				url: "../action/reple.php",
				data: { idx: "<?php echo $idx; ?>", email: "<?php echo $_SESSION['email']; ?>", reple: $("#reple<?php echo $idx; ?>").val() },
				method: "post"
			})
			.done(function(result) {
				$.ajax( { url: "../action/repleli.php", data: { idx: "<?php echo $idx; ?>" }, method: "post" })
				.done(function(result) { $("#repleli<?php echo $idx; ?>").html(result); $("#replemore<?php echo $idx; ?>").hide(); });
	});});});										  
</script>
<script>
	//이미지 크게보기
	$(document).ready(function() {
		$(".img<?php echo $idx; ?>").click(function() {
			$.ajax( { url: "../include/gallery.php", data: { idx: "<?php echo $idx; ?>" }, method: "post" })
			.done(function(result) {
				$("#fullscreen").html(result);
				$("#fullscreen").show();
				$("#fullscreenoff").show();
			});
	});});
</script>

<?php } ?>

<script>
	//크게보기 닫기
	$(document).ready(function() {
		$("#fullscreenoff").click(function() {
			$("#fullscreen").hide();
			$("#fullscreenoff").hide();
		});
	});
</script>

<div id="more">
</div>

<!-- 로딩 바 -->
<div class="loader-box">
	<div class="loader" id="more-contents"></div>
</div>

<!-- 페이지 하단 도달시에 게시물 더 불러오기 -->
<script>
	var page = 1;
	
	$(window).on('scroll', function() {
		
		var height = $(document).height(); //웹문서 총 높이
		var mvalue = $(window).height(); //윈도우창 높이
		var readmore = height - mvalue; //이벤트 조건값

		if($(window).scrollTop() == readmore) {
			$.ajax( {
				url: "../story/morecontents.php",
				data: { pageno: page },
				method: "post"
			})
			.done(function(result) {
				$("#more").append(result);
				console.log(++page);
			});
		};
	});
</script>

<!-- 컨텐츠 수정 -->
<div class="contents-box contents-margin" id="modify-box"></div>
<i class="material-icons" id="modify-cl">close</i>
<div id="modify-box-bg" class="black-bg"></div>

<?php
	if($total == FALSE) { echo "<script> $(document).ready(function() { $('#more-contents').hide(); }); </script>"; }
	if($page == $totalpage) { echo "<script> $(document).ready(function() { $('#more-contents').hide(); }); </script>"; }
?>
<?php
	//로그인 여부
	if(isset($_SESSION['email'])) { 
		echo "<script> $(document).ready(function() { $('.reply').show(); }); </script>";
		echo "<script> $(document).ready(function() { $('.sign-out-reply').hide(); }); </script>";
		echo "<script> $(document).ready(function() { $('.info-bt').show(); }); </script>";
		echo "<script> $(document).ready(function() { $('.rerepleac').show(); }); </script>";
	} else {
		echo "<script> $(document).ready(function() { $('.reply').hide(); }); </script>";
		echo "<script> $(document).ready(function() { $('.sign-out-reply').show(); }); </script>";
		echo "<script> $(document).ready(function() { $('.info-bt').hide(); }); </script>";
		echo "<script> $(document).ready(function() { $('.rerepleac').hide(); }); </script>";
	}
?>