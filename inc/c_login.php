<?php
require_once 'dbconnect.php';
$mysqli2 = connect2();
if (isset($_GET['code']) && $_GET['code'] != "") {

echo $_GET['code'] ;

}
