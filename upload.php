<div class="contents-box contents-margin" id="uploadbox">
	<form action="../action/upload-ac.php" method="post">
		<div class="upload-title">
			<span class="upload-text">
				<h3>글 올리기</h3>
				<p>사진은 10장까지 첨부 가능합니다.</p>
			</span>
			<span class="upload-profile">
				<img src="../../profileimg/<? if($_SESSION['profile'] == FALSE) { echo 'profile-img01.png'; } else { echo $_SESSION['profile']; } ?>">
				<h4><? echo $_SESSION['username']; ?></h4>
				<button class="bt-white" id="imgup" type="button" onclick="ImgSelect();"><i class="material-icons">add_photo_alternate</i><p>사진</p></button>
			</span>
		</div>
		<div class="upload-content">
			<textarea name="content" id="content" placeholder="게시물 내용 쓰기..." required></textarea>
		</div>
		<div>
			<div id="img_view">
				<?php //기존 임시 이미지 불러오기
					$sql01 = mq("SELECT * FROM tempimg WHERE email = '$email' ORDER BY datetime, aindex");
					while($tempimg = $sql01->fetch_array()) {
				?>
				<img src="../../uploadimg/<? echo $tempimg['file']; ?>" id="tempimg<? echo $tempimg['idx']; ?>"><i id="imgcc<? echo $tempimg['idx']; ?>" class="material-icons img-cc" onclick="imgcc(<? echo $tempimg['idx']; ?>)">close</i>
				<? 	} ?>
			</div>
		</div>
<!-- 임시 이미지 삭제 -->
<script>
	function imgcc(idx) {
		var forid = "#tempimg" + idx; var id = "#imgcc" + idx;
		$.ajax( {
			url: "../action/img-cc.php",
			data: { imgidx: idx }, method: "post"
		})
		.done(function() {
			$(forid).hide(); $(id).hide();
			$("#notice-text").html("삭제 되었습니다.");
			$("#notice-text").show();
			setTimeout(function() { $("#notice-text").hide("fade", 500); }, 3000);
		});
	}
</script>
		<div>
			<button class="bt bt-w" type="submit">올리기</button>
		</div>
	</form>
	<form id="imgform" action="../action/upload-img-ac.php" method="post" enctype="multipart/form-data">
		<input name="img[]" id="img" type="file" accept="image/*" multiple>
		<input name="useremail" id="useremail" type="email" value="<? echo $_SESSION['email']; ?>">
	</form>
</div>
<i class="material-icons" id="close">close</i>
<div id="upload-bg" class="black-bg"></div>
		
<!-- 글올리기 포커스 이벤트 -->
<script>
	//포커스
	$(document).ready(function() {
    	$("#content").focus(function() {
			$("#uploadbox").css({"z-index": "5", "position": "absolute"});
			$("#content").css({"height": "250px"});
			$("#con").css({"margin-top": "209px"});//마진 생성
        	$("#upload-bg").show();
			$("#close").show();
			$("html").scrollTop(0);
			$("html").css({'overflow-y': 'hidden', 'height': '100%'});
    	});
	});
	//닫기
	$(document).ready(function() {
    	$("#close").click(function() {
			$("#uploadbox").css({"z-index": "0", "position": "static"});
			$("#content").css({"height": "50px"});
			$("#con").css({"margin-top": "0px"});
			$("#upload-bg").hide();
			$("#close").hide();
			$("html").css({'overflow-y': 'scroll', 'height': 'auto'});
    	});
	});
</script>

<!-- 이미지 업로드 -->
<script>
	var n = 10; //이미지 갯수 제한
    $(document).ready(function() { $("#img").on("change", ImgHandle); }); //이미지 변경시 함수 호출
    function ImgSelect() { $("#img").trigger('click'); } //파일 첨부 액션
	//이미지 핸들러
    function ImgHandle(e) {
        var files = e.target.files;
        var filesArr = Array.prototype.slice.call(files);
		//이미지 추가될때
        filesArr.forEach(function(f) {
			//이미지파일 아닐경우
            if(!f.type.match("image.*")) {
				$("#warning-text").html("이미지 파일만 가능합니다.");
				$("#warning-text").show();
				setTimeout(function() { $("#warning-text").hide("fade", 500); }, 3000);
				return;
			}
			//10개 이상일 경우
			if(filesArr.length > n) {
				$("#warning-text").html("사진은 10장까지 가능합니다.");
				$("#warning-text").show();
				setTimeout(function() { $("#warning-text").hide("fade", 500); }, 3000);
				return;
			}
        });
		var imgform = document.getElementById("imgform"); //폼 정보 불러오기
		var images = new FormData(imgform); //폼 데이터 대입
		//에이잭스 이미지 파일 전송
		$.ajax( {
			url: "../action/upload-img-ac.php",
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			data: images,
			method: "post"
		})
		.done(function(result) {
			$("#img_view").append(result); //결과값 입력
		});
  	}
</script>