<?php
require_once('credit/database.php');
switch($recvMsgs[0]){
	case "签到":
		if($group==462311191){
			//有果南的话就不要回应了
			//return;
			//以下的不会被执行
			$message="[CQ:at,qq={$sender}] ".updateCredit($sender)." 另外,这是给你的绿帽子";
			$sendBack=true;
		}else{
			$message = "The 签到 command is deprecated due to the useability. Please use \"!checkin\" instead.
因为可用性顾虑，签到指令并不被推荐。请使用\"!checkin\"来代替它.
".updateCredit($sender)."";
			$sendBack=true;
		}
		break;
	case "{$lang['cname']}":
		$message="啾~我在哦";
		$sendBack=true;
		break;
	default:
		break;
}

if($sendBack){
  if(null !== $group){
    $CoolQ->sendGroupMsg($group, $message);
  }else{
    $CoolQ->sendPrivateMsg($sender, $message);
  }
}else if($sendPM){
  $CoolQ->sendPrivateMsg($sender, $message);
}
die();