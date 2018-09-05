<?php
session_start();
require_once('../connection/connection.php');
$query = $db->query("SELECT * FROM customer_orders WHERE members_id=" .$_SESSION['member']['members_id']);
$data = $query->fetchAll(PDO::FETCH_ASSOC);


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
                        <li><a href="#">首頁</a>
                        </li>
                        <li>我的訂單</li>
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
                                    <a href="custome_order.php"><i class="fa fa-list"></i> 我的訂單</a>
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

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1><?php echo $_SESSION['member']['name']; ?>的訂單</h1>
                        <br>
                        <p class="text-muted">若有任何問題請...</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>訂單編號</th>
                                        <th>訂購日期</th>
                                        <th>總金額</th>
                                        <th>訂單狀態</th>
                                        <th>訂單明細</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data as $order){    ?>
                                    <tr>
                                        <th><?php echo $order['order_no'];  ?></th>
                                        <td><?php echo $order['order_date'];  ?></td>
                                        <td><?php echo $order['total_price'];  ?></td>
                                        <td class="breadcrumb-item">
                                        <?php switch($order['status']){
                                                    case 0:
                                                        echo "未出貨";
                                                        break;
                                                    case 1:
                                                        echo "已付款";
                                                        break;
                                                    case 2:
                                                        echo "已出貨";
                                                        break;
                                                    case 99:
                                                        echo "已取消";
                                                        break;
                                                }    ?>
                                        </td>                                         
                                        <td><a href="customer_details.php?你買了啥=<?php echo $order['customer_orders_id'] ?>" class="btn btn-primary btn-sm">明細</a>
                                        </td>
                                    </tr>
                                   
                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>



</body>

</html>
