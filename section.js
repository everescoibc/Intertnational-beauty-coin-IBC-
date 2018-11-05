// JavaScript Document


//스크롤 텔링
$(document).ready(function(){
	
	var win_height = $(window).height();
	
	if(win_height <= 640) {
		min = 450;
		min13 = 400;
	} else if(win_height <= 768) {
		min = 550;
		min13 = 500;
	} else {
		min = 750;
		min13 = 500;
	}
	
	//객체 좌표 값
	var show01 = $("#show01").offset();
	var show02 = $("#show02").offset();
	var show03 = $("#show03").offset();
	var show05 = $("#show05").offset();
	var show06 = $("#show06").offset();
	var show07 = $("#show07").offset();
	var show08 = $("#show08").offset();
	var show09 = $("#show09").offset();
	var show10 = $("#show10").offset();
	var show11 = $("#show11").offset();
	var show12 = $("#show12").offset();
	var show13 = $("#show13").offset();
	var show14 = $("#show14").offset();
	var show15 = $("#show15").offset();
	var show16 = $("#show16").offset();
	var show17 = $("#show17").offset();
	
	//객체 좌표값 높이에서 min값 빼기
	var show01on = show01.top - min;
	var show02on = show02.top - min;
	var show03on = show03.top - min;
	var show05on = show05.top - min;
	var show06on = show06.top - min;
	var show07on = show07.top - min;
	var show08on = show08.top - min;
	var show09on = show09.top - min;
	var show10on = show10.top - min;
	var show11on = show11.top - min;
	var show12on = show12.top - min;
	var show13on = show13.top - min13;
	var show14on = show14.top - min;
	var show15on = show15.top - min;
	var show16on = show16.top - min;
	var show17on = show17.top - min;
	
	//보여줄 객체 숢기기
	$("#show01").hide();
	$("#show02").hide();
	$("#show03").hide();
	$("#show05").hide();
	$("#show06").hide();
	$("#show07").hide();
	$("#show08").hide();
	$("#show09").hide();
	$("#show10").hide();
	$("#show11").hide();
	$("#show12").hide();
	$("#show13").hide();
	$("#show14").hide();
	$("#show15").hide();
	$("#show16").hide();
	$("#show17").hide();
			
	
	//숢긴 객체 보이기
	$(window).scroll(function(){
		if($(document).scrollTop() >= show01on){
        		$("#show01").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show02on){
				$("#show02").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show03on){
				$("#show03").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show05on){
				$("#show05").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show06on){
				$("#show06").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show07on){
				$("#show07").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show08on){
				$("#show08").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show09on){
				$("#show09").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show10on){
				$("#show10").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show11on){
				$("#show11").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show12on){
				$("#show12").show("fade", 1500);
    	}
	});

	$(window).scroll(function(){
		if($(document).scrollTop() >= show13on){
				$("#show13").show("fade", 1500);
    	}
	});

	$(window).scroll(function(){
		if($(document).scrollTop() >= show14on){
				$("#show14").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show15on){
				$("#show15").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show16on){
				$("#show16").show("fade", 1500);
    	}
	});
	
	$(window).scroll(function(){
		if($(document).scrollTop() >= show17on){
				$("#show17").show("fade", 1500);
    	}
	});
	

});