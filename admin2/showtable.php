<?php
require_once '../inc/dbconnect.php';
$mysqli = connect();

function TB_s()
{
    $sql = "SELECT * FROM products ";
    $qr = select($sql);
    $total = count($qr);
    $i = 0;
    while ($i < count($qr)) {
        $rs = $qr[$i];
        $i++;
        echo '<tr>';
        echo '<td class="center">' . $i . '</td>';
        echo '<td >' . $rs['name'] . '</td>';
        echo '<td class="center">' . $rs['sku'] . '</td>';
        echo '<td class="center">' . $rs['qty'] . '</td>';
        echo '<td class="center">' . $rs['date_time'] . '/' . '</td>';
        echo '<td class="center">' . $i . '</td>';
        echo '<td> <div class="hidden-sm hidden-xs action-buttons">
        <a class="blue" href="#">
            <i class="ace-icon fa fa-search-plus bigger-130"></i>
        </a>

        <a class="green" href="#">
            <i class="ace-icon fa fa-pencil bigger-130"></i>
        </a>

        <a class="red" href="#">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
        </a>
    </div>

    <div class="hidden-md hidden-lg">
        <div class="inline pos-rel">
            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
            </button>

            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                <li>
                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                        <span class="blue">
                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="green">
                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                        <span class="red">
                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
        </td>';
        echo '</tr>';

    }

}

function TB_s2()
{
    global $objcon;
    $qut1 = "SELECT  p.*,c.name as Cname FROM products2 p LEFT JOIN code_login c ON p.code=c.code  ORDER BY p.id ASC";
    $consulta = $objcon->prepare($qut1);
    $consulta->execute();
    while ($fila = $consulta->fetchAll()) {echo '<pre>';


        $i = 0;
        
        foreach ($fila as $row) {
        $i++;
        echo '<tr>';
        echo '<td class="center">' . $i . '</td>';
        echo '<td >' . $row["name"] . '</td>';
        echo '<td class="center">' . $row["sku"] . '</td>';
        echo '<td class="center">' . $row["qty"] . '</td>';
        echo '<td class="center">' . $row["date_time"] . '</td>';
        echo '<td class="center">' . $row["Cname"] . '</td>';
        echo '<td> 
    <div class="hidden-sm hidden-xs action-buttons">
        <a class="blue" href="#">
            <i class="ace-icon fa fa-search-plus bigger-130"></i>
        </a>

        <a class="green" href="#">
            <i class="ace-icon fa fa-pencil bigger-130"></i>
        </a>

        <a class="red" href="#">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
        </a>
    </div>

    <div class="hidden-md hidden-lg">
        <div class="inline pos-rel">
            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
            </button>

            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                <li>
                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                        <span class="blue">
                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                        <span class="green">
                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                        <span class="red">
                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
        </td>';
        echo '</tr>';
        }
         











    }
   
}


function TB_del()
{ 
    global $objcon;
    $qut1="SELECT  o.*,p.name as pname ,c.name as cname
    FROM orders_item o 
    LEFT JOIN products2 p  ON o.product_id=p.id 
    LEFT JOIN code_login c  ON o.amount=c.code
    WHERE  o.rate = 'del'
    ORDER BY o.date DESC";
    $consulta = $objcon->prepare($qut1);
    $consulta->execute();
    while ($fila = $consulta->fetchAll()) {echo '<pre>';
        $i = 0;
        foreach ($fila as $row) {
        $i++;
        echo '<tr>';
        echo '<td class="center">' . $i . '</td>';
        echo '<td >' . $row["pname"] . '</td>';
        echo '<td class="center">' . $row["sku"] . '</td>';
        echo '<td class="center">' . $row["cname"] . '</td>';
        echo '<td class="center">' . $row["date"] . '</td>';
        echo '<td class="center">' . '</td>';
        echo '<td class="center">' . '</td>';
        echo '</tr>';
        }
    }
   
}

function TB_add()
{
    global $objcon;
    $qut1="SELECT  o.*,p.name as pname ,c.name as cname
    FROM orders_item o 
    LEFT JOIN products2 p  ON o.product_id=p.id 
    LEFT JOIN code_login c  ON o.amount=c.code
    WHERE  o.rate = 'add'
    ORDER BY o.date DESC";
    $consulta = $objcon->prepare($qut1);
    $consulta->execute();
    while ($fila = $consulta->fetchAll()) {echo '<pre>';
        $i = 0;
        foreach ($fila as $row) {
        $i++;
        echo '<tr>';
        echo '<td class="center">' . $i . '</td>';
        echo '<td >' . $row["pname"] . '</td>';
        echo '<td class="center">' . $row["sku"] . '</td>';
        echo '<td class="center">' . $row["cname"] . '</td>';
        echo '<td class="center">' . $row["date"] . '</td>';
        echo '<td class="center">' . '</td>';
        echo '<td class="center">' . '</td>';
        echo '</tr>';
        }
    }
   
}

function TB_month()
{ 
    global $objcon;
    $qut1=" SELECT  o.*,p.name as pname ,c.name as cname
    FROM orders_item o 
    LEFT JOIN products2 p  ON o.product_id=p.id 
    LEFT JOIN code_login c  ON o.amount=c.code
    WHERE  o.rate = 'del' AND MONTH(o.date) = 12
    ORDER BY o.date DESC
    ";
    $consulta = $objcon->prepare($qut1);
    $consulta->execute();
    while ($fila = $consulta->fetchAll()) {echo '<pre>';
        $i = 0;
        foreach ($fila as $row) {
        $i++;
        echo '<tr>';
        echo '<td class="center">' . $i . '</td>';
        echo '<td >' . $row["pname"] . '</td>';
        echo '<td class="center">' . $row["sku"] . '</td>';
        echo '<td class="center">' . $row["cname"] . '</td>';
        echo '<td class="center">' . $row["date"] . '</td>';
        echo '<td class="center">' . '</td>';
        echo '<td class="center">' . '</td>';
        echo '</tr>';
        }
    }
   
}
