<?php
//시간 차이 계산
$res_diff_reple = (strtotime(date('Y-m-d H:i:s')) - strtotime($repledatetime)) / 3600; //시간차 결과값

if($res_diff_reple <= 0.5) { $repletimediff = '지금'; }
elseif($res_diff_reple <= 1) { $repletimediff = '30분 전'; }
elseif($res_diff_reple <= 2) { $repletimediff = '1시간 전'; }
elseif($res_diff_reple <= 3) { $repletimediff = '2시간 전'; }
elseif($res_diff_reple <= 4) { $repletimediff = '3시간 전'; }
elseif($res_diff_reple <= 5) { $repletimediff = '4시간 전'; }
elseif($res_diff_reple <= 6) { $repletimediff = '5시간 전'; }
elseif($res_diff_reple <= 7) { $repletimediff = '6시간 전'; }
elseif($res_diff_reple <= 8) { $repletimediff = '7시간 전'; }
elseif($res_diff_reple <= 9) { $repletimediff = '8시간 전'; }
elseif($res_diff_reple <= 10) { $repletimediff = '9시간 전'; }
elseif($res_diff_reple <= 11) { $repletimediff = '10시간 전'; }
elseif($res_diff_reple <= 12) { $repletimediff = '11시간 전'; }
elseif($res_diff_reple <= 13) { $repletimediff = '12시간 전'; }
elseif($res_diff_reple <= 24) { $repletimediff = '오늘'; }
elseif($res_diff_reple <= 48) { $repletimediff = '어제'; }
elseif($res_diff_reple <= 72) { $repletimediff = '2일 전'; }
elseif($res_diff_reple <= 96) { $repletimediff = '3일 전'; }
elseif($res_diff_reple <= 120) { $repletimediff = '4일 전'; }
elseif($res_diff_reple <= 144) { $repletimediff = '5일 전'; }
elseif($res_diff_reple <= 168) { $repletimediff = '6일 전'; }
elseif($res_diff_reple <= 192) { $repletimediff = '일주일 전'; }
elseif($res_diff_reple > 192) { $repletimediff = $repledatetimenew; }
?>