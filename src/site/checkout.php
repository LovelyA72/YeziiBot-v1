<?php
$years = date('Y-m');
$base=__DIR__."/site/static/".$years."/";
$fpass=$_GET['fpass'];
$type=$_GET['type'];
if($type=="jpg"){
		file_exists($base.$fpass.".jpg");
		$res=imagecreatefromjpeg ($base.$fpass.".jpg");
		header("content-type:image/jpeg");
		imagejpeg($res);
}