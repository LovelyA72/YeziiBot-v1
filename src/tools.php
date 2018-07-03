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
    $url = '../../logs/'.$years.'/'.date('Ymd').'_request.log';  
    $dir_name=dirname($url);
      if(!file_exists($dir_name))
      {
       $res = mkdir(iconv("UTF-8", "GBK", $dir_name),0777,true);
      }
      $fp = fopen($url,"a");     
    fwrite($fp,date("m.d h:i:s")." ".var_export($data,true)."\r\n");
    fclose($fp);
}
function write_msg($data){ 
    $years = date('Y-m');
    $url = '../../logs/'.$years.'/'.date('Ymd').'_message.log';  
    $dir_name=dirname($url);
      if(!file_exists($dir_name))
      {
       $res = mkdir(iconv("UTF-8", "GBK", $dir_name),0777,true);
      }
      $fp = fopen($url,"a");     
    fwrite($fp,date("m.d h:i:s")." ".var_export($data,true)."\r\n");
    fclose($fp)
}
function dec_enc($string, $secret_key, $action) {
    $output = false;
 
    $encrypt_method = "AES-256-CBC";
    $secret_iv = '<YOUR IV GOES HERE>';
 
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
?>