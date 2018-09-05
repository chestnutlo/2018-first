<?php
session_start();
require_once('../connection/connection.php');
$created_at= date('Y-m-d H:i:s');
if($_SESSION['Receiver']['payment'] == 0){ 
    $status = 0;
    $payment = "信用卡";
}else{
    $status = 1;
    $payment = "ATM付款";
}
switch($_SESSION['Receiver']['delivery']){
    case 100:
      $delivery = '宅配';
      break;
    case 150:
      $delivery = '超商取貨';
      break; 
    case 200:
      $delivery = '貨到付款';
      break;     
}

//產生新訂單
$sql= "INSERT INTO customer_orders (
    status, 
    order_no, 
    order_date, 
    members_id, 
    total_price, 
    shipping, 
    name, 
    phone, 
    mobile, 
    zipcode, 
    county, 
    district, 
    address, 
    memo, 
    payment, 
    delivery, 
    created_at) VALUES ( 
        :status, 
        :order_no, 
        :order_date, 
        :members_id, 
        :total_price, 
        :shipping, 
        :name, 
        :phone, 
        :mobile, 
        :zipcode, 
        :county, 
        :district, 
        :address, 
        :memo, 
        :payment, 
        :delivery, 
        :created_at)";
$sth = $db ->prepare($sql);
$sth ->bindParam(":status", $status, PDO::PARAM_INT);
$sth ->bindParam(":order_no", $_POST['order_no'], PDO::PARAM_STR);
$sth ->bindParam(":order_date", $_POST['order_date'], PDO::PARAM_STR);
$sth ->bindParam(":members_id", $_SESSION['member']['members_id'], PDO::PARAM_INT);
$sth ->bindParam(":total_price", $_POST['total_price'], PDO::PARAM_INT);
$sth ->bindParam(":shipping", $_POST['shipping'], PDO::PARAM_INT);
$sth ->bindParam(":name", $_SESSION['Receiver']['name'], PDO::PARAM_STR);
$sth ->bindParam(":phone", $_SESSION['Receiver']['phone'], PDO::PARAM_STR);
$sth ->bindParam(":mobile", $_SESSION['Receiver']['mobile'], PDO::PARAM_STR);
$sth ->bindParam(":zipcode", $_SESSION['Receiver']['zipcode'], PDO::PARAM_STR);
$sth ->bindParam(":county", $_SESSION['Receiver']['county'], PDO::PARAM_STR);
$sth ->bindParam(":district", $_SESSION['Receiver']['district'], PDO::PARAM_STR);
$sth ->bindParam(":address", $_SESSION['Receiver']['address'], PDO::PARAM_STR);
$sth ->bindParam(":memo", $_POST['memo'], PDO::PARAM_STR);
$sth ->bindParam(":payment", $payment, PDO::PARAM_STR);
$sth ->bindParam(":delivery", $delivery, PDO::PARAM_STR);
$sth ->bindParam(":created_at", $created_at, PDO::PARAM_STR);
$result = $sth ->execute();

if($result){
    // 清空session receiver
    unset($_SESSION['Receiver']);
    $query = $db->query("SELECT * FROM customer_orders WHERE order_no='".$_POST['order_no']."'");
    $last_customer_order = $query->fetch(PDO::FETCH_ASSOC);

    //寫入訂單明細
    for ($i = 0; $i< count($_SESSION['List']); $i++){ 
        $created_at= date('Y-m-d H:i:s');
        $sql= "INSERT INTO order_details (customer_orders_id, product_id, picture, name, price, quantity, created_at) VALUES (:customer_orders_id, :product_id, :picture, :name, :price, :quantity, :created_at)";
        $sth = $db ->prepare($sql);
        $sth ->bindParam(":customer_orders_id", $last_customer_order['customer_orders_id'], PDO::PARAM_INT);
        $sth ->bindParam(":product_id", $_SESSION['List'][$i]['product_id'], PDO::PARAM_INT);
        $sth ->bindParam(":name", $_SESSION['List'][$i]['name'], PDO::PARAM_STR);
        $sth ->bindParam(":picture", $_SESSION['List'][$i]['picture'], PDO::PARAM_STR);
        $sth ->bindParam(":price", $_SESSION['List'][$i]['price'], PDO::PARAM_INT);
        $sth ->bindParam(":quantity", $_SESSION['List'][$i]['quantity'], PDO::PARAM_INT);
        $sth ->bindParam(":created_at", $created_at, PDO::PARAM_STR);
        $result = $sth ->execute();
    }
    //清空session cart
    unset($_SESSION['List']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cake House 帶給你最天然健康的幸福滋味">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Cake House : 帶給你最天然健康的幸福滋味
    </title>

    <meta name="keywords" content="">

    <?php require_once('template/head_files.php'); ?>



</head>

<body>
<?php require_once('template/navbar.php'); ?>
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.php">首頁</a></li>                        
                        <li>訂購完成</li>
                    </ul>


                    <div class="row" id="error-page">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="box">

                                <p class="text-center">
                                    <img src="../images/a-6.png" alt="Cake House template">
                                </p>
                                <h3>訂單成立</h3>
                                <h4 class="text-muted"></h4>
                                <p class="buttons"><a href="index.php" class="btn btn-primary"><i class="fa fa-home"></i> 回首頁</a>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>



</body>

</html>