<?php
require_once(__DIR__.'/database.php');
generalCheck($sender);

if(file_exists(__DIR__."/{$argv[0]}.php"))
require_once(__DIR__."/{$argv[0]}.php");
else{

	$gold = directCredit($sender)[0];
	$message = "你当前的金币数量是{$gold}";
    $sendBack = true;
};