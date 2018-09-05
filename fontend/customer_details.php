<?php
session_start();
require_once('../connection/connection.php');

$query = $db->query("SELECT * FROM order_details WHERE customer_orders_id=".$_GET['你買了啥']);
$data = $query->fetchAll(PDO::FETCH_ASSOC);


$query2 = $db->query("SELECT * FROM customer_orders WHERE customer_orders_id=".$_GET['你買了啥']);
$order = $query2->fetch(PDO::FETCH_ASSOC);

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
                        <li><a href="../index.php">首頁</a></li>
                        <li>訂單編號<?php echo $order['order_no'] ?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">會員專區</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="customer_order.php"><i class="fa fa-list"></i> 我的訂單</a>
                                </li>
                                <li>
                                    <a href="customer_account.php"><i class="fa fa-user"></i> 我的資料</a>
                                </li>
                                <li>
                                    <a href="index.php"><i class="fa fa-sign-out"></i> 登出</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>訂單編號<?php echo $order['order_no'] ?></h1>

                        <p class="lead">訂單於<strong><?php echo $order['order_date'];  ?></strong> 成立，運送方式為
                        <strong><?php echo $order['delivery'] ?></strong>
                        </p>
                        <p class="text-muted">有任何問題請 <a href="contact.php">聯絡我們</a>, 我們將盡快回覆您.</p>
                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">產品名稱</th>
                                        <th>數量</th>
                                        <th>單價</th>
                                        <th colspan="2">小計</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                <?php  $totalprice = 0;    $allprice  =  0;  foreach($data as $detail){     ?>                                   
                                    <tr>
                                        <td>
                                        <img width="100px" src="../uploads/products/<?php echo $detail['picture'];  ?> ">
                                        </td>
                                        <td><?php echo $detail['name'];  ?></td>                                       
                                        <td > <?php echo $detail['quantity'];  ?></td>
                                        <td>$<?php echo $detail['price'];  ?></td>
                                        <td colspan="2">$<?php $allprice = $detail['price'] * $detail['quantity']; echo $allprice ;?></td>
                                    </tr>
                                 <?php      $totalprice  +=  $allprice ;   } ?>  
                                 </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" class="text-right">訂單總計</th>
                                        <th>$<?php echo $totalprice  ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-right">運費</th>
                                        <th>$<?php echo $order['shipping'] ?></th>
                                    </tr>
                                   
                                    <tr>
                                        <th colspan="5" class="text-right">合計</th>
                                        <th>$<?php echo $totalprice+$order['shipping'] ?></th>
                                    </tr> </tfoot>
                            </table>
                               
                        </div>
                        <!-- /.table-responsive -->

                        

                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


       <?php require_once('template/footer.php'); ?>



</body>

</html>
