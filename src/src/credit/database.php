<?php
/**
 * Created by PhpStorm.
 * User: think
 * Date: 2018/4/1
 * Time: 8:53
 */
class LingDB extends SQLite3
{
    function __construct()
    {
        $this->open(__DIR__.'/data/users.sqlite3');
    }

}

function getDBInt($table,$rrow,$tid){
    $db = new LingDB();
    if(!$db){
        echo $db->lastErrorMsg();
    }
    $sql =<<<EOF
      SELECT * from $table where id=$tid;
EOF;

    $ret = $db->query($sql);
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        $rtv = $row[$rrow];
    }
    //echo "Operation done successfully\n";

    return $rtv;
}


function searchDB($table,$srow,$value){//will return int indicate which row that ID on.
    $db = new LingDB();
    if(!$db){
        echo $db->lastErrorMsg();
    }
    $sql =<<<EOF
      SELECT * from $table;
EOF;

    $ret = $db->query($sql);
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        if($row[$srow]==$value){
            $result = $row["ID"];

            echo("yeah~");
            return($result);
        }
    }
    return -1;
}

function directCredit($gqid){//will return int indicate which row that ID on.
    $db = new LingDB();
    if(!$db){
        echo $db->lastErrorMsg();
    }

    $sql =<<<EOF
      SELECT * from users;
EOF;
    $ret = $db->query($sql);
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        if($row["qid"]==$gqid){
            $result = $row["credit"];
            return(array($row["credit"],$row["lastCheck"],$row["c1"],$row["c2"],$row["c3"],$row["c4"],$row["c5"],$row["c6"],$row["exp"]));
        }
    }
    return -1;
}

function addExp($qid,$exp){
	$nexp = $exp + directCredit($qid)[8];
	$db = new LingDB();
	$sql =<<<EOF
	  UPDATE users set exp = $nexp where qid=$qid;
EOF;
        $ret = $db->exec($sql);
}

function updateCredit($qid){
	global $lang;
    $credit = rand(10,25);
	$exp = rand(150,450);
	generalCheck($qid);
    if(directCredit($qid)[1]==date("ymd")){
        return "你今天已经签过到了！";
    }else{
        $date = date("ymd");
        $ncredit = $credit+directCredit($qid)[0];
		$nexp = $exp +directCredit($qid)[8];
        $db = new LingDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $sql =<<<EOF
      UPDATE users set credit = $ncredit where qid=$qid;
      UPDATE users set lastCheck = $date where qid=$qid;
	  UPDATE users set exp = $nexp where qid=$qid;
EOF;
        $ret = $db->exec($sql);
        return "签到成功! ".$credit.$lang['money']."入账
获得{$exp}{$lang['exp']}";
    }
}
function haveUser($qid){
    if (directCredit($qid) == "-1") {
        return false;
    }
    return true;
}

function generalCheck($qid){
	if(!haveUser($qid)){
		createUser($qid);
	}
}

function transferCredit($fid,$tid,$credit){
	global $lang;
    if(directCredit($tid)=="-1"){
        return "用户不存在";
    }else{
        if($credit<=0){
            return "无效数值！";
        }
        $tcredit = directCredit($tid)[0]+$credit;
        $fcredit = directCredit($fid)[0]-$credit;
        if($fcredit<0){
            return "{$lang['money']}不足，无法转帐";
        }
        $db = new LingDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $sql =<<<EOF
      UPDATE users set credit = $fcredit where qid=$fid;
	  UPDATE users set credit = $tcredit where qid=$tid;
EOF;
        $ret = $db->exec($sql);
        return "转帐成功! 你还有".$fcredit."{$lang['money']}。";
    }
}
function takeCredit($qid,$credit){
	global $lang;
    if(directCredit($qid)==-1){
        return "用户不存在";
    }else{
        if($credit<=0){
            return "无效数值！";
        }
        $pcredit = directCredit($qid)[0]-$credit;
        if($pcredit<0){
            return false;
        }
        $db = new LingDB();
        if(!$db){
            echo $db->lastErrorMsg();
        }
        $sql =<<<EOF
      UPDATE users set credit = $pcredit where qid=$qid;
EOF;
        $ret = $db->exec($sql);
        return "你还有".$pcredit."{$lang['money']}。";
    }
}

function addCredit($qid,$credit){
	generalCheck($qid);
	global $lang;
    $ncredit = $credit+directCredit($qid)[0];
    $db = new LingDB();
    if(!$db){
        echo $db->lastErrorMsg();
    }
    $sql =<<<EOF
      UPDATE users set credit = $ncredit where qid=$qid;
EOF;
    $ret = $db->exec($sql);
    return "{$qid}被给予{$credit}{$lang['money']}，现在共有{$ncredit}{$lang['money']}";
}
function createUser($qid){
    $db = new LingDB();
    if(!$db){
        echo $db->lastErrorMsg();
    }
    if(haveUser($qid)){
        die();
    }


    $sql =<<<EOF
      INSERT INTO users (qid,credit,lastCheck,c1,c2,c3,c4,c5,c6,exp)
      VALUES ($qid,0,0,0,0,0,0,0,0,0);
EOF;
    $ret = $db->exec($sql);
    return true;
}