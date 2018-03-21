<?php
file_put_contents(__DIR__."/{$argv[1]}.group", $argv[2]."\n", FILE_APPEND);
$message='Success!';
?>