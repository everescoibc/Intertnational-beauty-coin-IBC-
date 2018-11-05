<?php

	include "../include/dbonline.php";

	$idx = $_POST["idx"];

?>
<center>
	<div class="full-img">
		<span class="bt-arrow full-imgleft" id="full_left<?php echo $idx; ?>" onclick="full_plusSlides<?php echo $idx; ?>(-1)"><i class="material-icons">keyboard_arrow_left</i></span>
		<span class="bt-arrow full-imgright" id="full_right<?php echo $idx; ?>" onclick="full_plusSlides<?php echo $idx; ?>(1)"><i class="material-icons">keyboard_arrow_right</i></span>
		<?php
			$sql03 = mq("SELECT * FROM imgfiles WHERE oidx = '$idx' ORDER BY aindex LIMIT 10");
			$row = $sql03->num_rows;
			while($imgfiles = $sql03->fetch_array()) {
				$aidx = $imgfiles['aindex'] + 1;
				$file = $imgfiles['file'];
		?>
		<div class="fullimg<?php echo $idx; ?>">
			<img src="../../uploadimg/<?php echo $file; ?>" class="fade">
			<p id="<?php echo $idx; ?>"><?php if($row != 1){ echo $aidx.' / '.$row; }?></p>
		</div>
		<?php } ?>
	</div>
</center>
<script>
	//애로우 보이기 숨기기
	$(document).ready(function() { 
		$("#full_left<?php echo $idx; ?>").<?php if($row>1) { echo 'show()'; } else { echo 'hide()'; } ?>;
		$("#full_right<?php echo $idx; ?>").<?php if($row>1) { echo 'show()'; } else { echo 'hide()'; } ?>;
	});
	//슬라이드 인덱스
	var full_slideIndex<?php echo $idx; ?> = 1;
	full_showSlides<?php echo $idx; ?>(full_slideIndex<?php echo $idx; ?>);
	function full_plusSlides<?php echo $idx; ?>(n) { full_showSlides<?php echo $idx; ?>(full_slideIndex<?php echo $idx; ?> += n); }
	function full_currentSlide<?php echo $idx; ?>(n) { full_showSlides<?php echo $idx; ?>(full_slideIndex<?php echo $idx; ?> = n); }
	//슬라이드
	function full_showSlides<?php echo $idx; ?>(n) {
  		var i;
  		var full_slides<?php echo $idx; ?> = document.getElementsByClassName("fullimg<?php echo $idx; ?>");
  		if (n > full_slides<?php echo $idx; ?>.length) {full_slideIndex<?php echo $idx; ?> = 1}    
  		if (n < 1) {full_slideIndex<?php echo $idx; ?> = full_slides<?php echo $idx; ?>.length}
  		for (i = 0; i < full_slides<?php echo $idx; ?>.length; i++) {
      		full_slides<?php echo $idx; ?>[i].style.display = "none";  
  		}
  		full_slides<?php echo $idx; ?>[full_slideIndex<?php echo $idx; ?>-1].style.display = "block";  
	}
</script>