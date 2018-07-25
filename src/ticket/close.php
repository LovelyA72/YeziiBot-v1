<?php
if(!$isMe)die();

$issue=file_get_contents(__DIR__."/tickets/{$argv[1]}.txt");
if(false!=$issue){
preg_match_all('/Creator: (\w*)/', $issue, $creator);

$creator=$creator[1][0];

$CoolQ->sendPrivateMsg($creator, '您创建的 Ticket #'.$argv[1].' 已经关闭！'."\n".'如果问题仍然存在，请重新创建。附：Ticket文件');
$CoolQ->sendPrivateMsg($creator, $issue, true);

$message=$creator.' 创建的 Ticket #'.$argv[1].' 已经关闭！';

//unlink(__DIR__."/tickets/{$argv[1]}.txt");
}else $message='Ticket 不存在';

?>