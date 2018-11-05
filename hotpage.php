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
	
	<div class="hotpage">
		
		<!-- 마이 페이지 -->
		<?php if(isset($_SESSION['email'])) { include 'mypage.php'; } ?>
		
		<!-- 추천 페이지 -->
		<h3>추천 페이지</h3>
		
		<!-- EVERESCO -->
		<div class="contents-box contents-margin">
			<?php
				$pageidx = 3; //페이지 유저 idx
				if($pageidx == 3) {
			?>
			<table class="profile-card">
				<?php
					//유저 정보 불러오기
					$sql01 = mq("SELECT * FROM user WHERE idx = '$pageidx'");
					$user = $sql01->fetch_array();
					$useremail = $user['email'];
					$useridx = $user['idx'];

					//게시물 정보 불러오기
					$sql02 = mq("SELECT * FROM contents WHERE email = '$useremail'");
					$contentsno = $sql02->num_rows;

					//좋아요 정보 불러오기
					$sql03 = mq("SELECT * FROM likeno WHERE foremail = '$useremail'");
					$likeno = $sql03->num_rows;
				?>
				<tr>
					<td rowspan="2" align="center" class="profile-photo"><a href="../page/page.php?useridx=<?php echo $useridx; ?>"><img class="hotpage-img" src="../../profileimg/<?php if($user['profile'] == FALSE) { echo 'profile-img01.png'; } else { echo $user['profile']; } ?>"></a>
					</td>
					<td colspan="3"class="profile-name"><a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h3><?php echo $user['username']; ?></h3></a><p><?php echo $user['email']; ?></p></td><td></td><td></td>
				</tr>
				<tr>
					<td><p class="inline">게시물</p><h4 class="inline"><?php echo $contentsno; ?></h4></td>
					<td><p class="inline">좋아요</p><h4 class="inline"><?php echo $likeno; ?></h4></td>
					<td><p class="inline">친구</p><h4 class="inline">0</h4></td>
				</tr>
			</table>
			<?php } ?>
		</div>
		
		<!-- IBIA -->
		<div class="contents-box contents-margin">
			<?php
				$pageidx = 2; //페이지 유저 idx
				if($pageidx == 2) {
			?>
			<table class="profile-card">
				<?php
					//유저 정보 불러오기
					$sql01 = mq("SELECT * FROM user WHERE idx = '$pageidx'");
					$user = $sql01->fetch_array();
					$useremail = $user['email'];
					$useridx = $user['idx'];

					//게시물 정보 불러오기
					$sql02 = mq("SELECT * FROM contents WHERE email = '$useremail'");
					$contentsno = $sql02->num_rows;

					//좋아요 정보 불러오기
					$sql03 = mq("SELECT * FROM likeno WHERE foremail = '$useremail'");
					$likeno = $sql03->num_rows;
				?>
				<tr>
					<td rowspan="2" align="center" class="profile-photo"><a href="../page/page.php?useridx=<?php echo $useridx; ?>"><img class="hotpage-img" src="../../profileimg/<?php if($user['profile'] == FALSE) { echo 'profile-img01.png'; } else { echo $user['profile']; } ?>"></a>
					</td>
					<td colspan="3" class="profile-name"><a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h3><?php echo $user['username']; ?></h3></a><p><?php echo $user['email']; ?></p></td><td></td><td></td>
				</tr>
				<tr>
					<td><p class="inline">게시물</p><h4 class="inline"><?php echo $contentsno; ?></h4></td>
					<td><p class="inline">좋아요</p><h4 class="inline"><?php echo $likeno; ?></h4></td>
					<td><p class="inline">친구</p><h4 class="inline">0</h4></td>
				</tr>
			</table>
			<?php } ?>
		</div>
		
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