<?php
require_once 'dbconnect.php';

if (isset($_POST['btn_submit_index']) && $_POST['btn_submit_index'] != "") {
    $dt = new DateTime();
    $product_id = $_POST['h_province_id'];
    $number = $_POST['number'];
    $dt = $dt->format('Y-m-d H:i:s');
    $data = array(
        "product_id" => "$product_id",
        "sku" => "$number",
        "date" => "$dt",
    );
    //insert("orders_item", $data);
    $sql = "SELECT * FROM products WHERE id = $product_id ORDER BY id DESC LIMIT 2";
    $qr = select($sql);
    $rs = $qr[0];
    $number_produuct = $rs['sku'];

    $number_produuct_sum = $number_produuct - $number;
    echo $number_produuct_sum;
    $data=array(
        "sku"=>"$number_produuct_sum",
        "date_time"=>"$dt",
        );

    //update("products", $data, "id=$product_id");

    header( "location: ../index.php?product=$product_id" );

}
