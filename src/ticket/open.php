<?php
if($wgMaxTicketLength==null){
	$wgMaxTicketLength==160;
}
$ticket_ok=false;
mkdir(__DIR__.'/tickets/');
$index=file_get_contents(__DIR__.'/tickets/index');
if(!$index)$index=1;
$index=(int)$index;

$title=$recvMsgs[1];
$desc=$recvMsgs[2];

if(strlen($title)>1&&strlen($title)<35&&strlen($desc)<$wgMaxTicketLength)$ticket_ok=true;

if($ticket_ok){
file_put_contents(__DIR__."/tickets/{$index}.txt", "Ticket #{$index}\nCreator: {$sender}\n{$title}\n{$desc}");

$message=$sender.' 创建了 ticket #'.$index;
$CoolQ->sendPrivateMsg($me, $message);

$index++;
file_put_contents(__DIR__.'/tickets/index', $index);
}else{
$message='ticket 不符合要求';
}
?>