<?php
session_start();
require_once 'dbconnect.php';
$dt = new DateTime();
$mysqli2 = connect2();
$mysqli = connect();
if (isset($_GET['code']) && $_GET['code'] != "") {
    $code = $_GET['code'];
    $sql = "SELECT * FROM add_users  WHERE code = $code ORDER BY id DESC LIMIT 2";
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
            "date_time" => $dt,
        );
        insert("code_login", $data);
        $_SESSION['name'] = $rs['code'];
        echo $_SESSION['name'];
        delete2("add_users", "code=" . $code, $mysqli2);
        //header("Location:./index.php");
    } else {
        header("Location:./index.php");
    }
}

if (isset($_SESSION['name']) && $_SESSION['name'] != "") {
    $name_code = $_SESSION['name'];
    $sql = "SELECT * FROM code_login  WHERE code = $name_code ORDER BY id DESC LIMIT 2";
    $qr = select($sql);
    $total = count($qr);
    if (isset($total) && $total == 0) {
        header("Location:./error.php");
    }

} else {
    header("Location:./error.php");
}
