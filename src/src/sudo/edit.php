<?php
$code=strstr($recv['message'], explode("\n", $recv['message'])[1]);
mkdir(__DIR__."/../{$argv[2]}");
$filename=explode(' ', strstr($recv['message'], $code, true))[3];
$filename=preg_replace("/\s/","",$filename);
$code=html_entity_decode($code);
file_put_contents(__DIR__."/../{$argv[2]}/{$filename}.php", $code);
$message="Success in editing {$argv[2]}/{$filename}.php"
?>
