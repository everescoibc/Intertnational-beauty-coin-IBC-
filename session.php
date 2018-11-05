<?php
	if(isset($_SESSION['email'])){
	}
	else{
		echo "<script>location.href='../sign/sign-in.php';</script>";
	}
?>