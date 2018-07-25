<?php
$pline=explode(",",file_get_contents(__DIR__."/pools/{$argv[0]}.lst"));
if($argv[1]>40){
	$message = "一次性最多连抽40张哦";
	$sendBack = true;
	return;
}
//奖品
$prize_arr = array(
    0=>array( 'id'=>1,'prize'=>$pline[0],'v'=>1 ),
    1=>array( 'id'=>2,'prize'=>$pline[1],'v'=>5 ),  
    2=>array( 'id'=>3,'prize'=>$pline[2],'v'=>10 ),
    3=>array( 'id'=>4,'prize'=>$pline[3],'v'=>24 ),
    4=>array( 'id'=>5,'prize'=>$pline[4],'v'=>60 ),
    5=>array( 'id'=>6,'prize'=>$pline[5],'v'=>100 )
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
$message="从{$argv[0]}卡池模拟{$argv[1]}连抽！
";
for($i=0;$i<$argv[1];$i++){
$res = get_rand($item);
$prize = $prize_arr[$res-1]['prize'];
$message = $message .' '.$prize;
//$message=$message.$pline[$i];
}
$sendBack = true;