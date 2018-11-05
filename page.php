<?php include "../include/dbonline.php"; ?>
<?php include "../include/sessionref.php"; ?>
<!doctype html>
<html>

<?php include "../include/head.php"; ?>

<body>
	
	
<header>
	<!--최상단메뉴-->
	<?php include "../include/header.php"; ?>
</header>
	
	
<main>
<div class="container">
	
<!--좌측 메뉴-->
<section id="nav">
	<?php include "../include/nav.php"; ?>
</section>

<!--메인 컨텐츠-->
<section id="contents">
	<?php
		//userid 검색
		$useridx = $_GET['useridx'];
		$sql01 = mq("SELECT * FROM user WHERE idx = '$useridx'");
		if($sql01->num_rows == 1) {
			$user = $sql01->fetch_array();
		} else {
			echo "<script type='text/javascript'>location.href='../page/hotpage.php';</script>";
		}
	
		//로그인 여부 확인
		if(isset($_SESSION['email'])) {
			$sign = 1;
		} else { $sign = 0; }
	?>
	<div id="profile">
		<?php include "userprofile.php"; ?>
	</div>
	<div id="con">
		<?php include "usercontents.php"; ?>
	</div>
</section>

<!--우측 메뉴-->
<section id="side">
	<?php include "../include/side.php"; ?>
</section>

</div>
</main>
	
	
</body>

<script>
	$(document).ready(function() {
		$("#page").addClass("active");
		$("html").scrollTop(0);
	});
</script>
<script>
	//브라우저 ie 여부
	var agent = navigator.userAgent.toLowerCase();
	if ( (navigator.appName == 'Netscape' && agent.indexOf('trident') != -1) || (agent.indexOf("msie") != -1)) {
		$("#nav").css({"margin-top": "175px"});
		$("#contents").css({"margin-top": "175px"});
		$("#side").css({"margin-top": "175px"});
		alert("인터넷 익스플로러에서는 웹사이트가 정상적으로 보이지 않습니다. 크롬이나 엣지 브라우저로 방문해 주세요.");
	}
</script>
</html>