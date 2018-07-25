<?php
$command=$_GET["func"];
if(file_exists(__DIR__."/script/{$command}.php")){
require_once(__DIR__."/script/{$command}.php");
}else {
	die();
}