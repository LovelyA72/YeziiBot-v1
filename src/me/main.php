<?php
require_once('credit/database.php');
generalCheck($sender);
$playerLv = levelCalc(directCredit($sender)[8]);
$message.="玩家ID:{$sender}
{$lang['money']}: ".directCredit($sender)[0]."G
{$lang['exp']}：".directCredit($sender)[8]."EXP
等级: Lv. ".$playerLv."
等级头衔:";
if($isMe){
	$message.="Bot OP";
}else{
	if($config["enableLvTag"]){
		$level = $lang["lv0"];
		if($playerLv>2){
			$level = $lang["lv1"];
		}
		if($playerLv>6){
			$level = $lang["lv2"];
		}
		if($playerLv>10){
			$level=$lang["lv3"];
		}
		if($playerLv>16){
			$level = $lang["lv4"];
		}
		if($playerLv>20){
			$level = $lang["lv5"];
		}
		$message.=$level;
	}else{
	$message.="普通玩家";
	}
}
$message.="";
$sendBack=true;
?>