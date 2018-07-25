<?php
$min=1;
$max=100;
if($argv[0]=="text"){
	$rTextArr = explode(",",$argv[1]);
	//for($i = 0;$i<10;$i++){
	$randArr = rand(0,count($rTextArr)-1);
	$message = $message . $rTextArr[$randArr];//}
	$sendBack = true;
	return;
}
if($wgMaxRoll==null){
	$wgMaxRoll=5000;
}
if(2==$argc){
$min=$argv[0];
$max=$argv[1];
}
if($argv[0] >=$wgMaxRoll){
	
	$message = "我一下子投不了那么多骰子哦QwQ";
}else{
	if(1==$argc)$max=$argv[0];

    $message=rand((int)$min, (int)$max);
}

$sendBack = true;
?>