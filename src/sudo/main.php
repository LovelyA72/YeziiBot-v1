<?php
if(!$isMe)die();
if(file_exists(__DIR__."/{$argv[1]}.php")){
require_once __DIR__."/{$argv[1]}.php";
}
else die();
?>