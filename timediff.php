<?php
//시간 차이 계산
$res_diff = (strtotime(date('Y-m-d H:i:s')) - strtotime($datetime)) / 3600; //시간차 결과값
		
if($res_diff <= 0.5) { $timediff = '방금'; }
elseif($res_diff <= 1) { $timediff = '30분 전'; }
elseif($res_diff <= 2) { $timediff = '1시간 전'; }
elseif($res_diff <= 3) { $timediff = '2시간 전'; }
elseif($res_diff <= 4) { $timediff = '3시간 전'; }
elseif($res_diff <= 5) { $timediff = '4시간 전'; }
elseif($res_diff <= 6) { $timediff = '5시간 전'; }
elseif($res_diff <= 7) { $timediff = '6시간 전'; }
elseif($res_diff <= 8) { $timediff = '7시간 전'; }
elseif($res_diff <= 9) { $timediff = '8시간 전'; }
elseif($res_diff <= 10) { $timediff = '9시간 전'; }
elseif($res_diff <= 11) { $timediff = '10시간 전'; }
elseif($res_diff <= 12) { $timediff = '11시간 전'; }
elseif($res_diff <= 13) { $timediff = '12시간 전'; }
elseif($res_diff <= 24) { $timediff = '오늘'; }
elseif($res_diff <= 48) { $timediff = '어제'; }
elseif($res_diff <= 72) { $timediff = '2일 전'; }
elseif($res_diff <= 96) { $timediff = '3일 전'; }
elseif($res_diff <= 120) { $timediff = '4일 전'; }
elseif($res_diff <= 144) { $timediff = '5일 전'; }
elseif($res_diff <= 168) { $timediff = '6일 전'; }
elseif($res_diff <= 192) { $timediff = '일주일 전'; }
elseif($res_diff > 192) { $timediff = $codatetime; }
?>