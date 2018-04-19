<?php
if(!$isMe){
    die();
}
if($argv[2]>10){
	$message = "主人不要刷屏哦QwQ...

ERR_TOO_MANY_MESSAGES";
    $sendBack = true;
	return;
}
$t1 = microtime(true);
for($i=0;$i<$argv[2];$i++){
	$CoolQ->sendGroupMsg($argv[0], $argv[1]);
}
$t2 = microtime(true);
$message = "执行时间:".round($t2-$t1,4)."秒";
$sendBack = true;