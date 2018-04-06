<?php
if(!$isMe){
	die();
}
if($fromGroup){
$CoolQ->sendGroupMsg($group, $argv[0]);
}
?>
