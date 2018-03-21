<?PHP
if(file_exists(__DIR__."/{$argv[0]}.php"))
require_once(__DIR__."/{$argv[0]}.php");
else{
$message = "常规指令:
!roll <数值> - 掷骰子
!ticket - 留言板系统
!stat - 系统信息
!version - 显示当前YeziiBot的版本信息
";}
$sendBack = true;
?>