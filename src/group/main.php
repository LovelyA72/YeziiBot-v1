<?php
if(!$isMe)die();

if(file_exists(__DIR__."/{$argv[0]}.php"))
require_once(__DIR__."/{$argv[0]}.php");
else die();

$sendBack = true;
?>