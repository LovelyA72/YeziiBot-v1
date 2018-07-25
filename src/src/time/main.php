<?php
//Message of the hour.
$message = "现在时间是".date('G')."点~\n";
$premoth = explode("\n",file_get_contents(__DIR__."\message.moth"));
$hour = 0;
foreach($premoth as $tmoth){
    $moth[$hour] = $tmoth;
    $hour++;
}
$message = $message.$moth[date("G")];
$sendBack = true;