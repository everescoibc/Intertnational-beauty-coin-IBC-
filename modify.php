<?php
	include "../include/dbonline.php";
	$idx = $_POST['con_idx'];
	//게시물 정보 불러오기
	$sql01 = mq("SELECT * FROM contents WHERE idx = '$idx'");
	$contents = $sql01->fetch_array();
	$content = $contents['content'];
	$email = $contents['email'];
	//유저 정보 불러오기
	$sql02 = mq("SELECT * FROM user WHERE email = '$email'");
	$user = $sql02->fetch_array();
	$username = $user['username'];
	$profile = $user['profile'];
?>
<form action="../action/modify-ac.php" method="post" enctype="multipart/form-data">
	<div class="upload-title">
		<span class="upload-text">
			<h3>글 수정하기</h3>
			<p>현재 사진은 변경할 수 없습니다.</p>
		</span>
		<span class="upload-profile">
			<img src="../../profileimg/<? if($profile == FALSE) { echo 'profile-img01.png'; } else { echo $profile; } ?>">
			<h4><? echo $username; ?></h4>
		</span>
	</div>
	<div class="upload-content">
		<textarea name="mo_content" id="mo_content" required><? echo $content; ?></textarea>
	</div>
	<div>
		<textarea name="mo_idx" id="mo_idx" required><? echo $idx; ?></textarea>
		<input name="mo_img[]" id="mo_img" type="file" accept="image/*" onchange="loadFile(event)" multiple>
		<div id="mo_img_view">
<?php
	$sql03 = mq("SELECT * FROM imgfiles WHERE oidx = '$idx' ORDER BY aindex LIMIT 10");
	$row = $sql03->num_rows;
	while($imgfiles = $sql03->fetch_array()) {
	$file = $imgfiles['file'];
?>
			<img src='../../uploadimg/<? echo $file; ?>'>
<?	} ?>
		</div>
	</div>
	<div>
		<button class="bt bt-w" type="submit">수정완료</button>
	</div>
</form>