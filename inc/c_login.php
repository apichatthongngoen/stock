<?php
session_start();
require_once 'dbconnect.php';
$dt = new DateTime();
$mysqli2 = connect2();
$mysqli = connect();
function c_login($at, $code)
{
    global $mysqli2;
    global $dt;
    $sql = "SELECT * FROM add_users  WHERE code = '$code' ORDER BY id DESC LIMIT 2";
    $qr = select2($sql, $mysqli2);
    $total = count($qr);
    //echo $total;
    if (isset($total) && $total != 0) {
        $rs = $qr[0];
        $dt = $dt->format('Y-m-d H:i:s');
        $data = array(
            "code" => $rs['code'],
            "name" => $rs['name'],
            "status" => $rs['tel'],
            "at" => $at,
            "date_time" => $dt,
        );
        insert("code_login", $data);
        $_SESSION['name'] = $rs['code'];
        $_SESSION['at'] = $at;
        $_SESSION['name_login'] = $rs['name'];
        //echo $_SESSION['name'];
        delete2("add_users", "code=" . $code, $mysqli2);
        //header("Location:./index.php");
    }
}

function checkpage($page)
{
    if (isset($_SESSION['name']) && $_SESSION['name'] != "") {
        $name_code = $_SESSION['name'];
        $sql = "SELECT * FROM code_login  WHERE code = '$name_code' ORDER BY id DESC LIMIT 2";
        $qr = select($sql);
        $total = count($qr);
        $rs = $qr[0];
        if (isset($total) && $total != 0) {
            $at = $rs['at'];
            if ($at != $page) {
                if ($at == 0) {
                    header("Location:./index.php");
                } else if ($at == 1) {
                    header("Location:./additem.php");
                } else if ($at == 2) {
                    header("Location:./admin2");
                }
            } 
        }
    } else {
        header("Location:./error.php");
    }
}

function name_login($name_code){ 
    $sql = "SELECT * FROM code_login  WHERE code = '$name_code' ORDER BY id DESC LIMIT 2";
    $qr = select($sql);
    $total = count($qr);
    $rs = $qr[0];   
    return $rs['name'];
}

function renamesql($uname) {
    preg_match_all('/./u',$uname,$arr_char);
    $str=strlen($uname);
    $ecc='';
    for($i=0;$i<=$str;$i++)
      {
        if(preg_match("/^[0-9a-zA-Zก-๙]{1}/",$arr_char[0][$i])){
             $ecc=$ecc.$arr_char[0][$i];
          }
      }
    if($uname!=$ecc){
      $ecc=FALSE;
    }
      return $ecc;
  }
