<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="inc/autocomplete.js"></script>
    <link rel="stylesheet" href="inc/autocomplete.css"  type="text/css"/>
    <title>STOCK OFFICE เบิกพัสดุ </title>
  </head>
  <body>
    <div class="container">

<br>
    <?php
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
    $code=renamesql($_GET['code']);

    echo"
    <a href=\"index.php?code=$code\" class=\"btn btn-primary btn-lg\">เบิกอะไหล่</a>
    <br><br>
    <a href=\"additem.php?code=$code\" class=\"btn btn-warning btn-lg\">ซื้ออะไหล่เข้า</a>
    <br><br>
    <a href=\"admin/index.php?code=$code\" class=\"btn btn-info btn-lg\">ADMIN</a>
    
    ";
    echo'

    </div>
    
    
    
    ';