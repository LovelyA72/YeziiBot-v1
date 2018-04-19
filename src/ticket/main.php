<?php
if(file_exists(__DIR__."/{$argv[0]}.php")){
require_once(__DIR__."/{$argv[0]}.php");}
else {
$message="!ticket open
标题
内容

向YeziiBot打开一个 ticket ，你会在 ticket 解决时收到来自我的通知

!ticket see 编号
查看指定的 ticket 的信息";
	//die()
};

$sendBack = true;
?>