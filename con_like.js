// JavaScript Document

//좋아요
function likeUp(idx, uidx, useridx) {
	var like = "#like" + idx;
	var dislike = "#dislike" + idx;
	var likeno = "#likeno" + idx;
	$(like).addClass("likehide").removeClass("likeshow");
	$(dislike).addClass("likeshow").removeClass("likehide");
	$.ajax( {
		url: "../action/like.php",
		data: { like_idx: idx, like_uidx: uidx, like_useridx: useridx },
		method: "post"
	})
	.done(function() {
		$.ajax( {
			url: "../action/likeno.php",
			data: { likeno_idx: idx },
			method: "post"
		})
		.done(function(result) {
			$(likeno).html(result);
			$("#notice-text").html("좋아요가 적용 되었습니다.");
			$("#notice-text").show();
			setTimeout(function() { $("#notice-text").hide("fade", 500); }, 3000);
			console.log('idx: ' + idx + ' 게시물 좋아요');
		});
	});
}

//좋아요 취소
function likeDown(idx, uidx, useridx) {
	var like = "#like" + idx;
	var dislike = "#dislike" + idx;
	var likeno = "#likeno" + idx;
	$.ajax( {
		url: "../action/dislike.php",
		data: { like_idx: idx, like_uidx: uidx },
		method: "post"
	})
	.done(function() {
		$.ajax( {
			url: "../action/likeno.php",
			data: { likeno_idx: idx },
			method: "post"
		})
		.done(function(result) {
			$(likeno).html(result);
			$(like).addClass("likeshow").removeClass("likehide");
			$(dislike).addClass("likehide").removeClass("likeshow");
			$("#notice-text").html("좋아요가 취소 되었습니다.");
			$("#notice-text").show();
			setTimeout(function() { $("#notice-text").hide("fade", 500); }, 3000);
			console.log('idx: ' + idx + ' 게시물 좋아요 취소');
		});
	});
}