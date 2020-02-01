<?php

$dbc='mysql:host=46.101.33.73;dbname=stock2';
$username='stock_01';
$pass="0Qqnh3qHCbWwgofN";

try {
    $conexion=new PDO($dbc,$username,$pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    $conexion->exec('SET NAMES utf8');
} catch (PDOException $e) {
    echo $e->getMessage();
}

//$sql= "SELECT products.name,products.sku,products.qty,products.date_time FROM products LEFT JOIN code_login ON products.name_change = code_login.code";
$query= "SELECT
        ad.name,
        ad.sku,
        ad.qty,
        ad.date_time,
        ad.name_change,
        ba.code
        FROM products ad
        LEFT JOIN code_login ba ON ad.name_change = ba.code ";

$qut1="SELECT  o.*,p.name as pname ,c.name as cname
FROM orders_item o 
LEFT JOIN products2 p  ON o.product_id=p.id 
LEFT JOIN code_login c  ON o.amount=c.code
WHERE  o.rate = 'del'
ORDER BY o.date DESC";

//$consulta = $objcon->query($query);
//$consulta=$conexion->query($query);
    $consulta=$conexion->prepare($qut1);
    $consulta->execute();
try {
    while ($fila=$consulta->fetchAll())
{   echo'<pre>';
    print_r($fila);
    foreach ($fila as $row) {
        //echo $row['id'];

    }
    echo'</pre>';
    //echo $fila['name'];
}
} catch (PDOException $e) {
    echo $e->getMessage();
}



 