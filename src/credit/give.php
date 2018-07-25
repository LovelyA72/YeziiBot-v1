<?php
if(!$isMe){
    die();
}
$message = addCredit($argv[1],$argv[2]);
$sendBack = true;