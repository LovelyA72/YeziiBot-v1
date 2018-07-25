<?php

$years = date('Y-m');

$item=$_GET["item"];

if($item=="command"){
	$fp=fopen(__DIR__'../../logs/'.$years.'/'.date('Ymd').'_request.log','a');
	fclose($fp);
	$count=explode("\n",file_get_contents(__DIR__'../../logs/'.$years.'/'.date('Ymd').'_request.log'));
	echo(sizeof($count)-1);
}else if($item=="message"){
	$fp=fopen(__DIR__'../../logs/'.$years.'/'.date('Ymd').'_message.log','a');
	fclose($fp);
	$count=explode("\n",file_get_contents(__DIR__'../../logs/'.$years.'/'.date('Ymd').'_message.log'));
	echo(sizeof($count)-1);
}