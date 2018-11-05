<?php
	if(isset($_SESSION['email'])){
	}
	else{
		echo "<script>location.href='../cn/sign-in.php';</script>";
	}
?>