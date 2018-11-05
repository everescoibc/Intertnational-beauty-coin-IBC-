<?php 
	include "../include/dbonline.php";
	include "../include/sessionref.php";
?>
<!doctype html>
<html>
<? include "../include/head.php"; ?>
<body>
	
<header>
	<!--최상단메뉴-->
	<? include "../include/header.php"; ?>
</header>
	
	
<main>
<div class="container">
	<!--좌측 메뉴-->
	<section id="nav">
		<? include "../include/nav.php"; ?>
	</section>
	
	<!--메인 컨텐츠-->
	<p id="notice-text"></p>
	<p id="warning-text"></p>
	<section id="contents">
		<div id="upload">
			<? if(isset($_SESSION['email'])){ include "../include/upload.php"; } ?>
		</div>
		<div id="con">
			<p class="content-ex"></p> <!--높이 비교용 앨리먼트-->
			<? include "contents.php"; ?>
		</div>
	</section>
	<script src="../script/con_modify_delete.js"></script>
	<script src="../script/con_more_img.js"></script>
	<script src="../script/con_like.js"></script>
	
	<!-- 우측 메뉴 -->
	<section id="side">
		<? include "../include/side.php"; ?>
	</section>
</div>
</main>
	
	
</body>
<script>
	//네비게이션 액티브, 스크롤 탑
	$(document).ready(function() {
		$("#story").addClass("active");
		$("html").scrollTop(0);
	});
</script>
<script>
	//브라우저 ie 여부
	var agent = navigator.userAgent.toLowerCase();
	if ((navigator.appName == 'Netscape' && agent.indexOf('trident') != -1) || (agent.indexOf("msie") != -1)) {
		$("#nav").css({"margin-top": "175px"});
		$("#contents").css({"margin-top": "175px"});
		$("#side").css({"margin-top": "175px"});
		alert("인터넷 익스플로러에서는 웹사이트가 정상적으로 보이지 않습니다. 크롬이나 엣지 브라우저로 방문해 주세요.");
	}
</script>
</html>