<?php
$list = file_get_contents(__DIR__."/{$argv[1]}.group");
$list = preg_replace("/{$argv[2]}\n/", '', $list);
file_put_contents(__DIR__."/{$argv[1]}.group", $list);

$message='Success!';
?>