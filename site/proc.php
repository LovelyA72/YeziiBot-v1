<?php
$proc=$_GET['proc'];
/*if(($proc!="ngx")&&($proc!="core")){
	die();
}*/
if($proc=="ngx"){
	exec(__DIR__."../../../getProc.exe nginx",$out);
    echo($out[0]);
}
if($proc=="core"){
	exec(__DIR__."../../../getProc.exe CQA",$out);
    echo($out[0]);
}