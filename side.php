<!-- 0< -->
<div id="side-mobile">
</div>

<!-- 1024< -->
<div id="side-1024">
	<div id="company-info">
		<a href="https://everesco.org" target="_blank"><p>회사소개</p></a><a href="#"><p>이용약관</p></a><a href="../../../dashboard/kr/contact.php" target="_blank"><p>고객센터</p></a>
		<p>© 2018 EVERESCO</p>
	</div>
</div>
<script>
//브라우저 체크
var agent = navigator.userAgent.toLowerCase();
	if ( (navigator.appName == 'Netscape' && agent.indexOf('trident') != -1) || (agent.indexOf("msie") != -1)) {
	} else {
		$(window).scroll(function() {
    		if($(document).scrollTop() >= 50) {
        		$("#side-1024").css({"position": "fixed"})
    		}
			else {
				$("#side-1024").css({"position": "static"})
			}
		});
	}
</script>