<?php
require_once('credit/database.php');
/*
$last=fileatime('credit/user/'.$sender);
if($last || 0==(int)date('d')-(int)date('d', $last)){
$message='你今天签到过了';
}else{
$addition=rand(10, 25);
creditAdd($sender, $addition);
$message='签到成功，'.$addition.'金币已经入账';
}*/
$message = updateCredit($sender);
if(time("h")<=9){
	$xcredit = rand(5,15);
	addCredit($sender,$xcredit);
	$message = $message."由于你是今天较早签到，获得额外".$xcredit."金币";
}
$sendBack=true;
?>