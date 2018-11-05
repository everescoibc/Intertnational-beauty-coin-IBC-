<!-- 0< -->
<div id="nav-mobile">
</div>

<!-- 1024< -->
<div id="nav-1024">
	<a href="../story/index.php" id="story"><h3 class="abled">스토리</h3></a>
	<a href="../page/page.php" id="page"><h3 class="abled">페이지</h3></a>
	<a href="#" id="friends"><h3 class="disabled">친구</h3></a>
	<a href="#" id="group"><h3 class="disabled">그룹</h3></a>
	<a href="#" id="shopping"><h3 class="disabled">쇼핑</h3></a>
</div>
<script>
//브라우저 체크
var win_width = $(window).width();
var agent = navigator.userAgent.toLowerCase();
	if ((navigator.appName == 'Netscape' && agent.indexOf('trident') != -1) || (agent.indexOf("msie") != -1)) {
	} else {
		if(win_width <= 640) {
			alert("아직 모바일 화면은 정상적으로 나오지 않습니다!");
			window.history.back();
		} else if(win_width <= 768) {
			alert("아직 모바일 화면은 정상적으로 나오지 않습니다!");
			window.history.back();
		} else if(win_width <= 1024) {
			$(window).scroll(function() {
				if($(document).scrollTop() >= 50) {
					$("main").css({"margin-top": "100px"})
					$("#nav-1024").css({"position": "fixed"})
					$("#contents").css({"margin-left": "125px"})
				}
				else {
					$("main").css({"margin-top": "150px"})
					$("#nav-1024").css({"position": "static"})
					$("#contents").css({"margin-left": "0px"})
				}
			});
		} else {
			$(window).scroll(function() {
				if($(document).scrollTop() >= 50) {
					$("main").css({"margin-top": "100px"})
					$("#nav-1024").css({"position": "fixed"})
					$("#contents").css({"margin-left": "150px"})
				}
				else {
					$("main").css({"margin-top": "150px"})
					$("#nav-1024").css({"position": "static"})
					$("#contents").css({"margin-left": "0px"})
				}
			});
		}
	}
</script>