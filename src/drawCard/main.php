<?php
$argv[0]=(int)$argv[0];
if($argv[0]<=0){
	$message = "瞎即拔抽";
	$sendBack = true;
	return;
}
if($argv[0]>100){
	$message = "一次性最多连抽100张哦..."; 
	$sendBack = true;
	return;
}
//奖品
$prize_arr = array(
    0=>array( 'id'=>1,'prize'=>'UR','v'=>50 ),
    1=>array( 'id'=>2,'prize'=>'SSR','v'=>250 ),  
    2=>array( 'id'=>3,'prize'=>'SSR','v'=>300 ),
    3=>array( 'id'=>4,'prize'=>'SR','v'=>1400 ),
    4=>array( 'id'=>5,'prize'=>'N','v'=>1000 ),
    5=>array( 'id'=>6,'prize'=>'R','v'=>2000 )
);


/*
 * 对数组进行处理
 */

foreach( $prize_arr as $k => $v ){
    //使用新数组item
    $item[$v['id']] = $v['v']; 
}

/*
 array(
        1 => 1,
        2 => 5,
        3 => 10,
        4 => 24,
        5 => 60,
        6 => 100
     );    
 */

function get_rand($item){

    $num = array_sum($item);//计算出分母200

    foreach( $item as $k => $v ){
     
      $rand = mt_rand(1, $num);//概率区间(整数) 包括1和200
      /*
       *这个算法很666 
       */
      if( $rand <= $v ){
          //循环遍历,当下标$k = 1的时候，只有$rand = 1 才能中奖 
          $result = $k;
          echo $rand.'--'.$v;
          break;
      }else{
          //当下标$k=6的时候，如果$rand>100 必须$rand < = 100 才能中奖 ，那么前面5次循环之后$rand的概率区间= 200-1-5-10-24-60 （1,100） 必中1块钱
          $num-=$v;
          echo '*'.$rand.'*'."&ensp;"."&ensp;"."&ensp;";
      }
    }

    return $result;
}
$countSSR = 0;
$countUR = 0;
$message="模拟{$argv[0]}连抽！
";
for($i=0;$i<$argv[0];$i++){
$res = get_rand($item);
$prize = $prize_arr[$res-1]['prize'];
if($prize=="SSR"){
	$countSSR++;
}
if($prize=="UR"){
	$countUR++;
}
$message = $message .' '.$prize;
}
if(/*$argv[0]==100*/1==1){
	include("credit/database.php");
	generalCheck($sender);
	$casher = takeCredit($sender,5);
	$expadded = ($countSSR*20)+($countUR*200)+5;
	if($casher!=false){
		$counter="一共".$countSSR."张SSR，".$countUR."张UR";
		$message = $message."
".$counter."
".$casher."
获得{$expadded}点经验值奖励！
";
addExp($sender,$expadded);
	}else{
		$message = "{$lang['money']}不足（需5{$lang['money']}），无法抽卡！
你可以通过签到(指令：!checkin) 来获得{$lang['money']}。";
	}
}
$sendBack = true;