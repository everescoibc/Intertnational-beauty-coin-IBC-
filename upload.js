// JavaScript Document


//글올리기 포커스 이벤트
//포커스
$(document).ready(function() {
    $("#content").focus(function() {
		$("#uploadbox").css({"z-index": "3", "position": "absolute"});
		$("#content").css({"height": "250px"});
		$("#con").css({"margin-top": "209px"});//마진 생성
        $("#grey-bg").show();
		$("#close").show();
		$("html").scrollTop(0);
    });
});
	
//스크롤
$(window).scroll(function() {
    if($(document).scrollTop() >= 200) {
		$("#uploadbox").css({"z-index": "0", "position": "static"});
		$("#content").css({"height": "75px"});
		$("#con").css({"margin-top": "0px"});
		$("#grey-bg").hide();
		$("#close").hide();
    }
});

//닫기
$(document).ready(function() {
    $("#close").click(function() {
		$("#uploadbox").css({"z-index": "0", "position": "static"});
		$("#content").css({"height": "75px"});
		$("#con").css({"margin-top": "0px"});
		$("#grey-bg").hide();
		$("#close").hide();
    });
});

//이미지 업로드
//버튼 클릭할때 이미지 첨부
$(document).ready(function() {
    $("#imgup").click(function(e) {
		$("#img").click();
    });
});
	
//이미지 파일 체크와 미리보기
var sel_files = [];
$(document).ready(function() {
	$("#img").on("change", handleimgfileselect);
});
function handleimgfileselect(e) {
	var files = e.target.files;
	var filesArr = Array.prototype.slice.call(files);
		
	filesArr.forEach(function(f) {
		if(!f.type.match("image.*")) {
			alert("이미지 파일만 업로드 해주세요.");
			return;
		}
			
		sel_files.push(f);
			
		//미리보기
		var reader = new FileReader();
		reader.onload = function(e) {
			var img_html = "<img src=\"" + e.target.result + "\" />";
			$("#img_view").append(img_html);
			index++;
		}
		reader.readAsDataURL(f);
	});
}

//파일 사이즈 체크
$("#img").on('change', function() {
	var limit = 1048576 * 10; //제한 사이즈(mb)
	var filesize = this.files[0].size;
	if(filesize > limit) {
		alert("이미지 크기는" + limit/1048576 + "MB까지만 등록할 수 있습니다.");
		$(this).val();
	}
})
	
//첨부 이미지 미리보기
//var loadFile = function(event) {
//var output = document.getElementById('img-view');
//output.src = URL.createObjectURL(event.target.files[0]);
//};
function deleteimg(index) {
	console.log("index : "+index);
	sel_files.splice(index, 1);
		
	val img_id = "#img_id_"+index;
	$(img_id).remove();
		
	console.log(sel_files);
}