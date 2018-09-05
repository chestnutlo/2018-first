<?php 
require('../../connection/connection.php'); 

$query = $db->query("SELECT * FROM order_details  WHERE customer_orders_id=".$_GET['明細']);
$data = $query->fetchAll(PDO::FETCH_ASSOC);
$query2 = $db->query("SELECT * FROM customer_orders WHERE customer_orders_id=".$_GET['明細']);
$customer_orders = $query2->fetch(PDO::FETCH_ASSOC);




?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css"> 
  
</head>

<body>
<?php require_once('../../surface/surface_nav.php'); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class=""><?php echo $customer_orders['order_no'];?>訂單明細管理</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left">
          <ul class="breadcrumb" style="margin-bottom: 0px; margin-top: 0px;">
            <li class="breadcrumb-item">
              <a href="#">HOME</a>
            </li>
            <li class="breadcrumb-item"><?php echo $customer_orders['order_no'];?></li>
            <li class="breadcrumb-item active">訂單明細管理</li>
          </ul>
          <!-- 內建上一頁 -->
          <a href="javascript:history.back()" class="btn btn-outline-dark m-1">上一頁</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>產品圖片</th>
                <th>產品名稱</th>
                <th>價格</th>
                <th>數量</th>
                <th>小計</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $order_details){  ?>
              <tr>
              <td ><img src="../../uploads/products/<?php echo $order_details['picture']; ?>" width='100' height='100'></td>
                <td><?php echo $order_details['name']; ?></td>
                <td><?php echo $order_details['price']; ?></td>
                <td><?php echo $order_details['quantity']; ?></td>
                <td><?php $subtotal = $order_details['price'] * $order_details['quantity']; echo $subtotal;?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>


    </div>
  </div>
  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 MacroViz - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>

</body>

</html>