<!-- 0< -->
<div id="header-mobile">
</div>

<!-- 1024< -->
<div id="header-1024">
	<div class="container">
		<!--로고 이미지-->
		<span class="logo-img">
			<center><a href="../story/index.php"><img src="../../img/everesco-com-tlogo01.png" id="mountin"><img src="../../img/everesco01.png" id="logo"></a></center>
		</span>
		<!--검색 창-->
		<span class="search-box">
			<form action="" method="get">
				<input id="search" name="search" type="text" placeholder="검색" autocomplete="off">
				<button class="bt-search" type="submit"><i class="material-icons">search</i></button>
			</form>
		</span>
		<div id="search-res"></div>
		<!--프로필-->
		<span class="profile">
			<span class="profile-bt">
				<button class="bt-header" id="notice">
					<i class="material-icons">notifications</i>
				</button>
				<button class="bt-header" id="menu">
					<i class="material-icons">keyboard_arrow_down</i>
				</button>
			</span>
			<span class="profile-img-name">
				<span class="profile-img">
					<a href="../page/page.php?useridx=<?php echo $_SESSION['idx']; ?>"><img src="../../profileimg/<?php if($_SESSION['profile'] == FALSE) { echo 'profile-img01.png'; } else { echo $_SESSION['profile']; } ?>"></a>
				</span>
				<span class="profile-name">
					<a href="../page/page.php?useridx=<?php echo $_SESSION['idx']; ?>"><h3><?php echo $_SESSION['username']; ?></h3></a>
				</span>
			</span>
		</span>
		<!-- 프로필 로그인 여부 -->
		<?php
			if(isset($_SESSION['email'])) {  }
			else {
				echo "<script> $(document).ready(function() { $('.profile').hide(); }); </script>";
				echo "<span class='sign-out-header'><a href='../sign/sign-in.php'><p class='link'>EVERESCO 로그인을<br>해주세요.</p></a></span>";
			}
		?>
		<!--패널-->
		<div id="panel-menu">
			<div>
				<a href="../page/page.php?useridx=<?php echo $_SESSION['idx']; ?>"><h5>프로필사진 변경</h5></a>
				<a href="../../../dashboard/kr/profile.php" target="_blank"><h5>회원정보 변경</h5></a>
				<a href="../../../dashboard/kr/profile.php" target="_blank"><h5>비밀번호 변경</h5></a>
			</div>
			<div>
				<a href="../sign/sign-ac/sign-out.php"><h5>로그아웃</h5></a>
			</div>
		</div>
		<div id="panel-notice">
			알림 기능 공사 중
		</div>
	</div>
</div>

<script>
	//아이콘 토글
	$(document).ready(function() {
    	$("#notice").click(function() {
        	$("#panel-notice").toggle();
			$("#panel-menu").hide();
    	});
	});
	$(document).ready(function() {
    	$("#menu").click(function() {
        	$("#panel-menu").toggle();
			$("#panel-notice").hide();
    	});
	});
	//검색창
	$(document).ready(function() {
		$("#search").keyup(function() {
			$.ajax( {
				url: "../include/search.php",
				data: { q : $(this).val() },
				method: "GET"
			})
			.done(function(result) {
				$("#search-res").html(result);
			});
		});
	});
	//메뉴 스크롤 css
	$(window).scroll(function() {
    	if($(document).scrollTop() >= 100) {
        	$("#header-1024").css({"height": "60px"});
			$(".logo-img").css({"top": "10px"});
			$(".search-box").css({"top": "15px"});
			$("#search-res").css({"margin-top": "2px"});
			$(".profile").css({"top": "10px"});
			$("#panel-menu").css({"margin-top": "2px"});
			$("#panel-notice").css({"margin-top": "2px"});
			$(".sign-out-header").css({"top": "10px"});
			$("#logo").hide();
    	}
		else {
			$("#header-1024").css({"height": "100px"});
			$(".logo-img").css({"top": "20px"});
			$(".search-box").css({"top": "35px"});
			$("#search-res").css({"margin-top": "0px"});
			$(".profile").css({"top": "30px"});
			$("#panel-menu").css({"margin-top": "0px"});
			$("#panel-notice").css({"margin-top": "0px"});
			$(".sign-out-header").css({"top": "30px"});
			$("#logo").show();
		}
	});
</script>