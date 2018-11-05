<?php
	include "dbonline.php";
	$search = $_REQUEST["q"];
	$where = "WHERE email LIKE '%$search%' OR username LIKE '%$search%'";

	if($search == TRUE) {
		echo '<div class="search-res-box">';
		
		//이메일이나 유저네임 조회
		$sql = mq("SELECT * FROM user $where ORDER BY username LIMIT 20");
		while($user = $sql->fetch_array()) {
		
			$useridx = $user['idx'];
			$username = $user['username'];
			$email = $user['email'];
		
	?>
	<div class="search-userinfo">
		<a href="../page/page.php?useridx=<?php echo $useridx; ?>"><h4><?php echo $username; ?></h4></a>
		<p><?php echo $email; ?></p>
	</div>
<?php } echo '</div>'; } ?>