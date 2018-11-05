<html>
<head>
<meta charset="utf-8">
</head>
<?php
	include "../include/dbonline.php";
	$idx = $_POST['mo_idx'];
	$content = $_POST['mo_content'];
	
	//게시물 수정
	$sql01 = mq("UPDATE contents SET content='".$content."' WHERE idx='".$idx."'");
?>
<script type="text/javascript">alert("수정 되었습니다."); location.href='../page/page.php?useridx=<?php echo $_SESSION['idx']; ?>';</script>
</html>