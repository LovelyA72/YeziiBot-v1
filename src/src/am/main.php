<?php
if(!$isMe){
	die();
}
$glist = $CoolQ->getGroupList();
$gdata=json_decode($glist,true);
$t1 = microtime(true);
for($x=0;$x<sizeof($gdata["data"]);$x++){
$target=$gdata["data"][$x]["group_id"];
if($target!=312532914){
	$CoolQ->sendGroupMsg($target,$argvs);
}
}
$t2 = microtime(true);
$message = "执行时间:".round($t2-$t1,4)."秒";
$sendBack = true;