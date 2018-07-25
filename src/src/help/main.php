<?PHP
if(file_exists(__DIR__."/{$argv[0]}.php")){
	require_once(__DIR__."/{$argv[0]}.php");
}
else{
	$message = "常规指令:
!roll <整数> - 掷骰子
!ticket - 留言板系统
!checkin - 每日签到
!me - 显示我的状态
!drawCard <整数> - 抽卡模拟
!calc <字符串> - 数学计算
!version - 显示当前YeziiBot的版本信息
请注意，感叹号必须为英文感叹号，命令与数值之间必须要有一个英文空格，参数不要加书名号(<>) ";
$sendBack = true;
}