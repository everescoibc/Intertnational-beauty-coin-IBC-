// JavaScript Document

//더 보기 유무
function moreShow(idx) {
	var content_text = "#content-text" + idx;
	var more = "#more" + idx;
	if($(content_text).height() >= $(".content-ex").height()) {
    	$(more).show();
	}
}

//더 보기
function readMore(idx) {
	var content_text = "#content-text" + idx;
	var more = "#more" + idx;
	$(content_text).css({"max-height": "200em"});
	$(more).hide();
}

//이미지 화살표 유무
function arrowShow(idx, row) {
	var left = "#left" + idx;
	var right = "#right" + idx;
	var imgno = row;
	if(imgno > 1) {
    	$(left).show();
		$(right).show();
	} else {
		$(left).hide();
		$(right).hide();
	}
}
