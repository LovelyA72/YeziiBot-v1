<?php
function belongGroup($QQ, $groupName){
if($QQ==whoisMe())return true;
$list = file_get_contents(__DIR__."/group/{$groupName}.group");
return preg_match("/{$QQ}/", $list);
}

function whoisMe(){
return file_get_contents(__DIR__.'/group/me.group');
}
function write_log($data){ 
        $years = date('Y-m');
        //设置路径目录信息
        $url = '../../logs/'.$years.'/'.date('Ymd').'_request.log';  
        $dir_name=dirname($url);
          //目录不存在就创建
          if(!file_exists($dir_name))
          {
            //iconv防止中文名乱码
           $res = mkdir(iconv("UTF-8", "GBK", $dir_name),0777,true);
          }
          $fp = fopen($url,"a");//打开文件资源通道 不存在则自动创建       
        fwrite($fp,date("m.d h:i:s")." ".var_export($data,true)."\r\n");//写入文件
        fclose($fp);//关闭资源通道
}
function write_msg($data){ 
        $years = date('Y-m');
        //设置路径目录信息
        $url = '../../logs/'.$years.'/'.date('Ymd').'_message.log';  
        $dir_name=dirname($url);
          //目录不存在就创建
          if(!file_exists($dir_name))
          {
            //iconv防止中文名乱码
           $res = mkdir(iconv("UTF-8", "GBK", $dir_name),0777,true);
          }
          $fp = fopen($url,"a");//打开文件资源通道 不存在则自动创建       
        fwrite($fp,date("m.d h:i:s")." ".var_export($data,true)."\r\n");//写入文件
        fclose($fp);//关闭资源通道
}
function randStr(){
	$str="1234567890qwertyuiopasdfghjklzxcvbnm";
str_shuffle($str);
$name=substr(str_shuffle($str),26,10);
return $name;
}
function badWords($text)
{
	//Make sure nobody say these thing. If they did... So bad!
	//审查辞汇，绝对不能出现
    $bad = array('第一个违禁词','第二个违禁词','你还可以加更多');
	$baden = array('第一个违禁词','第二个违禁词','你还可以加更多');

    for ($i=0; $i < count($bad); $i++)
    {
        $position = strpos($text, $bad[$i]);
        while($position !== false)//if text contains a bad word
        {
			return false;
			//we don't need rest of these
            for($j=$position; $j<$position+strlen($bad[$i]); $j++)
                $text[$j]='*';
            $position = strpos($text, $bad[$i]);
        }
    }
	for ($i=0; $i < count($baden); $i++)
    {
        $position = strpos($text, $baden[$i]);
        while($position !== false)//if text contains a bad word
        {
			return false;
			//we don't need rest of these
            for($j=$position; $j<$position+strlen($baden[$i]); $j++)
                $text[$j]='*';
            $position = strpos($text, $bad[$i]);
        }
    }
   return true;
}
function dec_enc($string, $secret_key, $action) {
    $output = false;
 
    $encrypt_method = "AES-256-CBC";
    $secret_iv = 'Your own IV here';
 
    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
 
    if( $action == 'encrypt' ) {
		global $isMe;
		if($isMe){
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
		}
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
 
    return $output;
}
function levelCalc($score)
{
    $levelArr = array(0, 30, 80, 150, 300, 490, 1050,
        1360, 1710, 2100, 2530, 3000, 3510, 4060,
        4650, 5280, 5950, 6660, 7410, 8200, 9030,
        9900, 10810, 11760, 12750, 13780, 14850,
        15960, 17110, 18300);
    $i = 1;
    $addedScore = 0;
    while ($addedScore + $levelArr[$i] < $score) {$addedScore += $levelArr[$i];$i++;}
    return $i;
}
?>