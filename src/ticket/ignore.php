<?php
if(!$isMe)die();

$issue=file_get_contents(__DIR__."/tickets/{$argv[1]}.txt");
if(false!=$issue){
preg_match_all('/Creator: (\w*)/', $issue, $creator);

$creator=$creator[1][0];

$CoolQ->sendPrivateMsg($creator, '你创建的 Ticket #'.$argv[1].' 被忽略！');

$message=$creator.' 创建的 Ticket #'.$argv[1].' 被忽略！';

unlink(__DIR__."/tickets/{$argv[1]}.txt");
}else $message='Ticket 不存在';

?>
