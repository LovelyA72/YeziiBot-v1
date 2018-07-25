<?php
if(!$isMe){
    die();
}
$message = directCredit($argv[1])[0];
$sendBack = true;