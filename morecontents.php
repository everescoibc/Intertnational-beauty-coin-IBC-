<?php
	
	include "../include/dbonline.php";
	
	$sql00 = mq("SELECT * FROM contents ORDER BY idx DESC"); //전체 게시물 숫자 불러오기
	$total = $sql00->num_rows; //전체 레코드
	$num = 5; //한번에 불러올 레코드
	$totalpage = ceil($total/$num); //총 페이지 
	$prepage = $_POST['pageno']; //이전 페이지
	$except = $prepage * $num; //제외시킬 레코드
	$page = $prepage + 1; //현재 페이지

	$sql01 = mq("SELECT * FROM contents ORDER BY idx DESC LIMIT $except, $num");  
    while($contents = $sql01->fetch_array()) {
		
		$content = str_replace("\r\n","<br>",$contents['content']);
		$email = $contents['email'];
		$idx = $contents['idx'];
		
		//날짜출력변환
		$datetime = $contents['datetime'];
		$strdatetime = strtotime($datetime);
		$codatetime = date('Y년 m월 d일', $strdatetime); 
		
		include "../include/timediff.php";
			
		$sql02 = mq("SELECT * FROM user WHERE email = '$email'");
		$user = $sql02->fetch_array();
		
		$username = $user['username'];
		$profile = $user['profile'];
		$useridx = $user['idx'];
		if($profile == FALSE) { $profile = 'profile-img01.png'; }
?>
<div class="contents-box contents-margin">
	<!-- 내용 -->
	<span class="upload-profile">
		<a href="../page/page.php?useridx=<?php echo $useridx; ?>"><img src="../../profileimg/<?php echo $profile; ?>"></a>
		<a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h4><?php echo $username; ?></h4></a>
	</span>
	<span class="upload-date">
		<!-- 수정과 삭제 -->
		<?php if($email == $_SESSION['email']) {
			echo "<p>".$timediff."</p>";
			echo "<p class='link' id='delete".$idx."'>삭제</p>";
			echo "<p class='link' id='modify".$idx."'>수정</p>";
		} else {
			echo "<p>".$timediff."</p>";
		} ?>
		<div class="con-delete" id="delete-box<?php echo $idx; ?>">
			<center>
			<p>해당 글을 정말 삭제 하시겠어요?</p>
			<button class="bt-del" id="delete-ac<?php echo $idx; ?>" type="button">삭제</button>
			<button class="bt-del" id="delete-cc<?php echo $idx; ?>" type="button">취소</button>
			</center>
		</div>
	</span>
	<div class="con-text">
		<p id="content-text<?php echo $idx; ?>" class="content-p"><?php echo $content; ?></p>
		<p class="content-ex"></p>
		<p class="link" id="more<?php echo $idx; ?>">...더 보기</p>
	</div>
	<center>
	<div class="con-img">
		<span class="bt-arrow imgleft" id="left<?php echo $idx; ?>" onclick="plusSlides<?php echo $idx; ?>(-1)"><i class="material-icons">keyboard_arrow_left</i></span>
		<span class="bt-arrow imgright" id="right<?php echo $idx; ?>" onclick="plusSlides<?php echo $idx; ?>(1)"><i class="material-icons">keyboard_arrow_right</i></span>
		<?php
			$sql03 = mq("SELECT * FROM imgfiles WHERE oidx = '$idx' ORDER BY aindex LIMIT 10");
			$row = $sql03->num_rows;
			while($imgfiles = $sql03->fetch_array()) {
				$aidx = $imgfiles['aindex'] + 1;
				$file = $imgfiles['file'];
		?>
		<div class="img<?php echo $idx; ?>">
			<img src="../../uploadimg/<?php echo $file; ?>" class="fade">
			<p id="<?php echo $idx; ?>"><?php if($row != 1){ echo $aidx.' / '.$row; }?></p>
		</div>
		<?php } ?>
	</div>
	</center>
<script>
	//수정과 삭제
	$(document).ready(function() {
		$("#modify<?php echo $idx; ?>").click(function() {
			$.ajax( { url: "../include/modify.php", data: { idx: "<?php echo $idx; ?>" }, method: "post" })
			.done(function(result) {
				$("#modify-box").html(result);
				$("#modify-box-bg").show();
				$("#modify-box").show();
				$("#modify-cl").show();
			});
		});
		$("#modify-cl").click(function() {
			$("#modify-box-bg").hide();
			$("#modify-box").hide();
			$("#modify-cl").hide();
		});
		$("#delete<?php echo $idx; ?>").click(function() {
			$("#delete-box<?php echo $idx; ?>").toggle();
		});
		$("#delete-ac<?php echo $idx; ?>").click(function() {
			$("#delete-box<?php echo $idx; ?>").hide();
			$.ajax( { url: "../action/delete-ac.php", data: { idx: "<?php echo $idx; ?>" }, method: "post"
			}).done(function(result) { alert("삭제 되었습니다."); location.href='../story/index.php'; });
		});
		$("#delete-cc<?php echo $idx; ?>").click(function() {
			$("#delete-box<?php echo $idx; ?>").hide();
		});
	});
	//더보기
	$(document).ready(function() {
		if($("#content-text<?php echo $idx; ?>").height() >= $(".content-ex").height()) {
    		$("#more<?php echo $idx; ?>").show();
		}
    	$("#more<?php echo $idx; ?>").click(function() {
			$("#content-text<?php echo $idx; ?>").css({"max-height": "200em"});
			$("#more<?php echo $idx; ?>").hide();
		});
	});
	//애로우 보이기 숨기기
	$(document).ready(function() { 
		$("#left<?php echo $idx; ?>").<?php if($row>1) { echo 'show()'; } else { echo 'hide()'; } ?>;
		$("#right<?php echo $idx; ?>").<?php if($row>1) { echo 'show()'; } else { echo 'hide()'; } ?>;
	});
	//슬라이드 인덱스
	var slideIndex<?php echo $idx; ?> = 1;
	showSlides<?php echo $idx; ?>(slideIndex<?php echo $idx; ?>);
	function plusSlides<?php echo $idx; ?>(n) { showSlides<?php echo $idx; ?>(slideIndex<?php echo $idx; ?> += n); }
	function currentSlide<?php echo $idx; ?>(n) { showSlides<?php echo $idx; ?>(slideIndex<?php echo $idx; ?> = n); }
	//슬라이드
	function showSlides<?php echo $idx; ?>(n) {
  		var i;
  		var slides<?php echo $idx; ?> = document.getElementsByClassName("img<?php echo $idx; ?>");
  		if (n > slides<?php echo $idx; ?>.length) {slideIndex<?php echo $idx; ?> = 1}    
  		if (n < 1) {slideIndex<?php echo $idx; ?> = slides<?php echo $idx; ?>.length}
  		for (i = 0; i < slides<?php echo $idx; ?>.length; i++) {
      		slides<?php echo $idx; ?>[i].style.display = "none";  
  		}
  		slides<?php echo $idx; ?>[slideIndex<?php echo $idx; ?>-1].style.display = "block";  
	}
</script>
	<!-- 좋아요, 업다운 -->
	<div class="con-info">
		<div class="info-bt">
			<?php
				$myemail = $_SESSION['email'];
				$sql06 = mq("SELECT * FROM likeno WHERE email = '$myemail' AND oidx = '$idx'");
				$mylikerow = $sql06->num_rows;
				if($mylikerow == 0){ echo "<span class='likeshow' id='like{$idx}'><i class='material-icons'>favorite_border</i></span><span class='likehide' id='dislike{$idx}' class='dislike'><i class='material-icons'>favorite</i></span>";
				} else { echo "<span class='likehide' id='like{$idx}'><i class='material-icons'>favorite_border</i></span><span class='likeshow' id='dislike{$idx}' class='dislike'><i class='material-icons'>favorite</i></span>"; }
			?>
			<span id="share<?php echo $idx; ?>"><i class="material-icons">share</i></span>
		</div>
		<?php
			$sql05 = mq("SELECT * FROM likeno WHERE oidx = '$idx'");
			$like = $sql05->num_rows;
			if($like == FALSE) { $like = 0; }
		?>
		<div class="info-info">
			<p id="likeno<?php echo $idx; ?>"></p>
			<p>공유 0개</p>
		</div>
<script>
	//좋아요 갯수 불러오기
	$(document).ready(function() {
		$.ajax( { url: "../action/likeno.php", data: { idx: "<?php echo $idx; ?>" }, method: "post" })
		.done(function(result) { $("#likeno<?php echo $idx; ?>").html(result); });
	});
	//좋아요
	$(document).ready(function() {
		$("#like<?php echo $idx; ?>").click(function(e) {
			$("#like<?php echo $idx; ?>").addClass("likehide").removeClass("likeshow");
			$("#dislike<?php echo $idx; ?>").addClass("likeshow").removeClass("likehide");
			$.ajax( {
				url: "../action/like.php",
				data: { idx: "<?php echo $idx; ?>", email: "<?php echo $_SESSION['email']; ?>", foremail: "<?php echo $email; ?>" },
				method: "post"
			})
			.done(function(result) {
				$.ajax( { url: "../action/likeno.php", data: { idx: "<?php echo $idx; ?>" }, method: "post" })
				.done(function(result) { $("#likeno<?php echo $idx; ?>").html(result); });
			});
	});});
	//좋아요 취소
	$(document).ready(function() {
		$("#dislike<?php echo $idx; ?>").click(function(e) {
			$.ajax( {
				url: "../action/dislike.php",
				data: { idx: "<?php echo $idx; ?>", email: "<?php echo $_SESSION['email']; ?>" },
				method: "post"
			})
			.done(function(result) {
				$.ajax( { url: "../action/likeno.php", data: { idx: "<?php echo $idx; ?>" }, method: "post" })
				.done(function(result) {
					$("#likeno<?php echo $idx; ?>").html(result);
					$("#like<?php echo $idx; ?>").addClass("likeshow").removeClass("likehide");
					$("#dislike<?php echo $idx; ?>").addClass("likehide").removeClass("likeshow");
				});
	});});});
</script>
	</div>
	<!-- 댓글 -->
	<div class="con-reple" id="con-reple<?php echo $idx; ?>">
		<table id="repleli<?php echo $idx; ?>">
			<?php
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

<?php if($page == $totalpage) { echo "<script> $(document).ready(function() { $('#more-contents').hide(); }); </script>"; } ?>
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