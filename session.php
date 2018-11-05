<?php
	if(isset($_SESSION['email'])){
	}
	else{
		echo "<script>location.href='../en/sign-in.php';</script>";
	}
?>