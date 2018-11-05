		<h3>마이 페이지</h3>
		<div class="contents-box contents-margin">
			<table class="profile-card">
				<?php
					$myidx = $_SESSION['idx'];
					//유저 정보 불러오기
					$sql01 = mq("SELECT * FROM user WHERE idx = '$myidx'");
					$myinfo = $sql01->fetch_array();
					$myemail = $myinfo['email'];

					//게시물 정보 불러오기
					$sql02 = mq("SELECT * FROM contents WHERE email = '$myemail'");
					$contentsno = $sql02->num_rows;

					//좋아요 정보 불러오기
					$sql03 = mq("SELECT * FROM likeno WHERE foremail = '$myemail'");
					$likeno = $sql03->num_rows;
				?>
				<tr>
					<td rowspan="2" align="center" class="profile-photo"><a href="../page/page.php?useridx=<?php echo $myidx; ?>"><img class="hotpage-img" src="../../profileimg/<?php if($myinfo['profile'] == FALSE) { echo 'profile-img01.png'; } else { echo $myinfo['profile']; } ?>"></a>
					</td>
					<td colspan="3"class="profile-name"><a href="../page/page.php?useridx=<?php echo $myidx; ?>"><h3><?php echo $myinfo['username']; ?></h3></a><p><?php echo $myemail; ?></p></td><td></td><td></td>
				</tr>
				<tr>
					<td><p class="inline">게시물</p><h4 class="inline"><?php echo $contentsno; ?></h4></td>
					<td><p class="inline">좋아요</p><h4 class="inline"><?php echo $likeno; ?></h4></td>
					<td><p class="inline">친구</p><h4 class="inline">0</h4></td>
				</tr>
			</table>
		</div>