<?PHP
if(file_exists(__DIR__."/{$argv[0]}.php")){
	require_once(__DIR__."/{$argv[0]}.php");
}
else{
	$message = "常规指令:
!roll <数值> - 掷骰子
!ticket - 留言板系统
!version - 显示当前YeziiBot的版本信息
请注意，感叹号必须为英文感叹号，命令与数值之间必须要有一个英文空格 ";
$sendBack = true;
}