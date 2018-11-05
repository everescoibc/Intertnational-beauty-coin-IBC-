<?php
	
	$useremail = $user['email'];
	$email = $_SESSION['email'];

	//유저 정보 불러오기
	$sql01 = mq("SELECT * FROM user WHERE email = '$useremail'");
	$user = $sql01->fetch_array();

	//게시물 정보 불러오기
	$sql02 = mq("SELECT * FROM contents WHERE email = '$useremail'");
	$contentsno = $sql02->num_rows;

	//좋아요 정보 불러오기
	$sql03 = mq("SELECT * FROM likeno WHERE foremail = '$useremail'");
	$likeno = $sql03->num_rows;

?>
<i class="material-icons" id="profile-close">close</i>
<div id="profile-bg" class="black-bg"></div>

<div class="contents-box contents-margin">
	<table class="profile-card">
		<tr>
			<td rowspan="3" align="center" class="profile-photo"><img src="../../profileimg/<?php if($user['profile'] == FALSE) { echo 'profile-img01.png'; } else { echo $user['profile']; } ?>">
			<td colspan="3"class="profile-name"><h3><?php echo $user['username']; ?></h3><p><?php echo $user['email']; ?></p></td><td></td><td></td>
		</tr>
		<tr>
			<td><p class="inline">게시물</p><h4 class="inline"><?php echo $contentsno; ?></h4></td>
			<td><p class="inline">좋아요</p><h4 class="inline"><?php echo $likeno; ?></h4></td>
			<td><p class="inline">공유</p><h4 class="inline">0</h4></td>
		</tr>
		<tr>
			<td><p class="inline">친구</p><h4 class="inline">0</h4></td>
			<td><p class="inline">그룹</p><h4 class="inline">0</h4></td>
			<td></td>
		</tr>
	</table>
	<?php if($useremail == $email) {
				echo "<button class='bt-white' id='pimgch' type='button'><i class='material-icons'>add_a_photo</i><p>프로필 사진</p></button></td>";
	} ?>
</div>
<form id="p_img_change" class="none" action="../action/profile-img-ac.php" enctype="multipart/form-data" method="post">
	<div class="contents-box contents-margin">
		<!-- 미리보기 -->
		<span id="p_img_view"><img src="../../profileimg/<?php if($_SESSION['profile'] == FALSE) { echo 'profile-img01.png'; } else { echo $_SESSION['profile']; } ?>" id="pre_img" class="ridx"></span>
		<!-- 프로필사진 리스트 -->
		<span id="p_img_list"><h4>프로필 사진 보관함</h4><p>최근 사진을 4개까지 보관합니다.</p>
			<?php
				$email = $_SESSION['email'];
				$sql01 = mq("SELECT * FROM profile WHERE email = '$email' ORDER BY idx DESC LIMIT 4");
				while($profile = $sql01->fetch_array()) {
					$file = $profile['file'];
					$pidx = $profile['idx'];
			?>
			<span class="pokwan_img-box" id="pokwan_img_id<?php echo $pidx; ?>"><img src="../../profileimg/<?php if($file == FALSE) { echo 'profile-img01.png'; } else { echo $file; } ?>" id="pokwan_img"></span>
<script>
	//보관이미지 클릭
	$(document).ready(function() {
		$("#pokwan_img_id<?php echo $pidx; ?>").click(function() {
			var dir = '../../profileimg/<?php echo $file; ?>';
			var cla = '<?php echo $pidx; ?>'
			$("#p_img_ch_sb").hide();
			$("#p_img_ch_bt").show();
			$('#pre_img').attr('src', dir);
			$('#pre_img').attr('class', cla);
		});
	});
</script>
			<?php } ?>
<script>
	//보관이미지로 변경
	$(document).ready(function() {
		$("#p_img_ch_bt").click(function() {
			$.ajax( {
				url: "../action/profile-img-ch-ac.php",
				data: { ridx: $("#pre_img").attr("class") },
				method: "post"
			})
			.done(function(result) { alert("변경 되었습니다."); location.href='../page/page.php?useridx=<?php echo $user['idx']; ?>';
			});
		});
	});
</script>	
		</span>
		<!-- 사진 업로드 -->
		<label for="p_img" class="bt-white" id="p_img_up"><i class="material-icons">add_a_photo</i><p>사진 첨부</p></label>
		<input name="p_img" id="p_img" class="none" type="file" accept="image/*" required>
		<!-- 사진 변경 -->
		<button id="p_img_ch_sb" class="bt bt-w none" type="submit">사진 변경</button>
		<button id="p_img_ch_bt" class="bt bt-w" type="button">사진 변경</button>
	</div>
</form>
<script>
	//초기 이미지
	var origin_img = "../../profileimg/<?php if($_SESSION['profile'] == FALSE) { echo 'profile-img01.png'; } else { echo $_SESSION['profile']; } ?>";
	//이미지 변경 창 띄우기
	$(document).ready(function() {
		$("#pimgch").click(function() {
			$("#p_img_change").show();
			$("#profile-bg").show();
			$("#profile-close").show();
			$('#pre_img').attr('src', origin_img);
			$("#p_img_ch_sb").hide();
			$("#p_img_ch_bt").show();
		});
	});
	//닫기
	$(document).ready(function() {
		$("#profile-close").click(function() {
			$("#p_img_change").hide();
			$("#profile-bg").hide();
			$("#profile-close").hide();
		});
	});
</script>
<script>
	//이미지 파일 미리보기
	function preview(input) {
    	if (input.files && input.files[0]) {
        	var prereader = new FileReader();
        	prereader.onload = function (e) {
            	$('#pre_img').attr('src', e.target.result);
        	}
        	prereader.readAsDataURL(input.files[0]);
    	}
	}
	$("#p_img").change(function(){
    	preview(this);
		$("#p_img_ch_sb").show();
		$("#p_img_ch_bt").hide();
	});
</script>