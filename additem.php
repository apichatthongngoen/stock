<?php
require_once 'inc/dbconnect.php';
require_once 'inc/c_login.php';
if (isset($_GET['code']) && $_GET['code'] != "") {
    $code=renamesql($_GET['code']);
    c_login("1",$code);
}
checkpage(1);
?>
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
    <title>STOCK OFFICE ระบบซื้อพัสดุเข้า </title>
  </head>
  <body style="background-color: yellow">
    <div class="container">
        <div class="row justify-content-md-center">
            <h3>ยินดีต้อนรับ <?php echo $_SESSION['name_login']; ?> เข้าสู่ระบบซื้อพัสดุเข้า</h3>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-auto center">
                <form id="form1" name="form1" method="post" action="inc/fn.php">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">พิมพ์ชื่อพัสดุ</span>
                        </div>
                    <input type="text" size="50" class="form-control" name="show_province" id="show_province" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    <input class="form-control" name="h_province_id" type="hidden" id="h_province_id" value="" />
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">จำนวน</span>
                        </div>
                        <input class="form-control" type="number" id="number" name="number" placeholder="0-99" value="" />
                    </div>

                    <div class="form-group">
                        <button type="submit" name="btn_submit_add" id="btn_submit_add" value="1" class="btn btn-warning">ซื้อพัสดุเข้า</button>
                    </div>

                </form>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <h3> <?php 
                if (isset($_GET['product']) && $_GET['product'] != "") {
                    $product = renamesql($_GET['product']);
                    $sql = "SELECT * FROM products2 WHERE id = $product ORDER BY id DESC LIMIT 2";
                    $qr = select($sql);
                    $rs = $qr[0]; 
                    echo "".$rs['name']."/ คงเหลือ : ".$rs['sku']." ชิ้น";
                }
                if (isset($_GET['error']) && $_GET['error'] != "") {
                    if ($_GET['error']==1) {
                        echo "เบิกเกินจำนวนที่เหลืออยู่ ";
                        # code...
                    }
                }
                ?>
            </h3>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript">
        function make_autocom(autoObj,showObj){
            var mkAutoObj=autoObj;
            var mkSerValObj=showObj;
            new Autocomplete(mkAutoObj, function() {
                this.setValue = function(id) {
                    document.getElementById(mkSerValObj).value = id;
                }
                if ( this.isModified )
                    this.setValue("");
                if ( this.value.length < 1 && this.isNotClick )
                    return ;
                return "inc/gdata.php?q="+encodeURIComponent(this.value);
            });
        }
        // การใช้งาน
        // make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
        make_autocom("show_province","h_province_id");
    </script>
    </body>
</html>
