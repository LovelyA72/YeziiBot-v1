<?php

require_once '../Autoloader.php';
require_once 'LocalSettings.php';
require_once 'tools.php';

use CoolQSDK\CoolQSDK;

if($wgBotName==NULL){
  $wgBotName="YeziiBot";
}

$message = null;

$CoolQ = new CoolQSDK('127.0.0.1',5700,'yourtokenhere');

$recv = json_decode(file_get_contents('php://input'), true);


//将消息解码成原始字符串
$recvMsg = html_entity_decode($recv['message']);

//存储消息的按行分割版本
$recvMsgs = explode("\r\n", $recvMsg);

//取出首行，并验证是否是命令
$commands = $recvMsgs[0];
if('!' != $commands[0])die();

if(isset($recvMsgs[1]))
$content = substr($recvMsg, strlen($commands)+2);

//取出命令实体
sscanf($commands, '!%s', $command);
$argvs=substr($commands, strlen($command)+2);

//消息环境变量
$sender = $recv['user_id'];
$group = isset($recv['group_id'])?$recv['group_id']:null;
$me = whoisMe();
$isMe = belongGroup($sender, 'me');
$sendBack = false;
$sendPM = false;
$argvs = str_replace('--DEBUG', '', $argvs, $count); //去除调试标记以免影响后续处理
$debug = $count;
$argv = explode(' ', $argvs); //$argv是参数表
$argc = count($argv);
if($debug)$argc--;
if('' == $argv[0])$argc=0;

//发送调试信息
if($debug && $isMe)
$CoolQ->sendPrivateMsg($me, var_export($recv, true)."\n!{$command} ".var_export($argv, true));

//弱智反射
if(file_exists(__DIR__."/{$command}/main.php"))
require_once(__DIR__."/{$command}/main.php");
else die();

if($sendBack){
  if(null !== $group){
    $CoolQ->sendGroupMsg($group, $message);
  }else{
    $CoolQ->sendPrivateMsg($sender, $message);
  }
}else if($sendPM){
  $CoolQ->sendPrivateMsg($sender, $message);
}

//$CoolQ->sendPrivateMsg($sender, $message);
?>
