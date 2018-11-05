<?php
	include "../include/dbonline.php";
	$oidx = $_POST['oidx'];
	$ridx = $_POST['ridx'];

?>
<form class="rereply" id="rereplyform<?php echo $ridx; ?>">
	<textarea name="rereple" id="rerepletext<?php echo $ridx; ?>" placeholder="&#8618;&nbsp;답글 달기..." maxlength="150" required></textarea><button id="rereple<?php echo $ridx; ?>-submit"><i class="material-icons">chat_bubble_outline</i></button>
</form>
<script>
	//댓글의 댓글 ajax
	$(document).ready(function() {
		$("#rereple<?php echo $ridx; ?>-submit").click(function(e) {
			e.preventDefault(); //새로고침 미발생
			$.ajax( {
				url: "../action/rereple.php",
				data: { oidx: "<?php echo $oidx; ?>", ridx: "<?php echo $ridx; ?>", email: "<?php echo $_SESSION['email']; ?>", rereple: $("#rerepletext<?php echo $ridx; ?>").val() },
				method: "post"
			})
			.done(function(result) {
				$.ajax( {
					url: "../action/repleli.php",
					data: { idx: "<?php echo $oidx; ?>" },
					method: "post"
				})
				.done(function(result) { $("#repleli<?php echo $oidx; ?>").html(result);
				});
			});
		});
	});
</script>