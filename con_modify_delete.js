// JavaScript Document

//수정
function modify(idx) {
	$.ajax( {
		url: "../include/modify.php",
		data: { con_idx: idx },
		method: "post"
	})
	.done(function(result) {
		$("#modify-box").html(result);
		$("#modify-box-bg").show();
		$("#modify-box").show();
		$("#modify-cl").show();
	});
}
//수정 취소
$(document).ready(function() {
	$("#modify-cl").click(function() {
		$("#modify-box-bg").hide();
		$("#modify-box").hide();
		$("#modify-cl").hide();
	});
});

//삭제창 열기
function deleteTog(idx) {
	var delete_box = "#delete-box" + idx;
	$(delete_box).toggle();
}
//삭제 취소
function deleteCc(idx) {
	var delete_box = "#delete-box" + idx;
	$(delete_box).hide();
}
//삭제
function deleteAc(idx) {
	var delete_box = "#delete-box" + idx;
	$(delete_box).hide();
	$.ajax( {
		url: "../action/delete-ac.php",
		data: { con_idx: idx },
		method: "post"
	}).done(function(result) {
		alert("삭제 되었습니다.");
		window.location.reload();
	});
}