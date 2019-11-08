<?php
require_once 'dbconnect.php';

if (isset($_POST['btn_submit_index']) && $_POST['btn_submit_index'] != "") {
    $dt = new DateTime();
    $product_id=$_POST['h_province_id'];
    $number = $_POST['number'];
    $dt = $dt->format('Y-m-d H:i:s');
    $data = array(
        "product_id" => "$product_id",
        "sku" => "$number",
        "date" => "$dt",
    );
    insert("orders_item",$data);

}
