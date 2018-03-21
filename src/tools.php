<?php
function belongGroup($QQ, $groupName){
if($QQ==whoisMe())return true;
$list = file_get_contents(__DIR__."/group/{$groupName}.group");
return preg_match("/{$QQ}/", $list);
}

function whoisMe(){
return file_get_contents(__DIR__.'/group/me.group');
}
?>