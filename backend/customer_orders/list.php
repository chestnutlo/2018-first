<?php 
require_once('../../function/login_check.php');   
require_once('../../connection/connection.php');

$limit = 3;

if(isset($_GET['page']))  { $page = $_GET['page']; }else{$page = 1 ;}; 
$start_from = ($page-1) * $limit;

$query = $db->query("SELECT * FROM customer_orders WHERE status=".$_GET['status']);
$data = $query->fetchAll(PDO::FETCH_ASSOC);


$totalrows = count($data);
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
<?php require_once('../../surface/surface_nav.php');  ?>
<div class="py-5" style= "background-image: url(../../images/6.jpg); opacity:0.8"  >
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">訂單管理</h1>
          <p class="lead">Where is my money ?</p>
        </div>
        </div>
        </div>
        </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12"> </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb" style="margin-bottom: 0px; margin-top: 0px;">
            <li class="breadcrumb-item">
              <a >Home</a>
            </li>
            <li class="breadcrumb-item">
              <a >訂單管理</a>
            </li>
            <li class="breadcrumb-item ">
            <?php switch($_GET['status']){
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
                  }
            ?></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" style='text-align:center'>

      <?php  if ($totalrows > 0) { ?>     <!--   如果有資料 -->
          <table class="table">
            <thead>
              <tr>   
                <th>狀態</th>
                <th>訂單編號</th>
                <th>日期</th>
                <th>會員編號</th>
                <!-- <th>總價</th> -->
                <!-- <th>運費</th> -->
                <!-- <th>姓名</th>
                <th>電話</th>
                <th>區號</th>
                <th>地址</th> -->
                <th>備註</th>
                <th>設定</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($data as $customer_orders){    ?>
        <tr>
            <td><?php echo $customer_orders['status']; ?></td>
            <td><?php echo $customer_orders['order_no']; ?></td>
            <td><?php echo $customer_orders['order_date']; ?></td>
            <td><?php echo $customer_orders['members_id']; ?></td>
            <!-- <td><?php echo $customer_orders['total_price']; ?></td> -->
            <!-- <td><?php echo $customer_orders['shipping']; ?></td> -->
            <!-- <td><?php echo $customer_orders['name']; ?></td>
            <td><?php echo $customer_orders['phone']; ?></td>
            <td><?php echo $customer_orders['zipcode']; ?></td>
            <td><?php echo $customer_orders['address']; ?></td> -->
            <td><?php echo $customer_orders['memo']; ?></td>
          
            <td> <a href="edit.php?detail=<?php echo $customer_orders['customer_orders_id']; ?>" class="btn btn-outline-info">編輯</a>
            <a href="../order_details/list.php?明細=<?php echo $customer_orders['customer_orders_id']; ?>" class="btn btn-outline-secondary">檢視訂單明細</a>
             
              </tr>  
            <?php } ?>
            </tbody>
          </table>
            <?php } else  { ?>   <p>無資料顯示</p>   <?php  } ?>                              <!--   無資料的話 -->         
        </div>
      </div>
    <?php  if($totalrows > 0){
            $sth = $db->query("SELECT * FROM customer_orders WHERE status=".$_GET['status']);
            $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
            $total_pages = ceil($data_count / $limit);
           ?>
        <div class="row">
        <div class="col-md-12">
          <ul class="pagination">
            <li class="page-item">
            <?php   if($page > 1){ ?>
              <a class="page-link" href="list.php?status=<?php echo $_GET['status']; ?>&page=<?php echo $page-1;?>">
                <span >«</span>
               </a>
            </li> <?php }else{ ?>
              <span class="page-link">«</span>
            <?php } ?>
            <?php for ($i=1; $i<=$total_pages; $i++) { ?>
            <li class="page-item">
              <a class="page-link" href="list.php?status=<?php echo $_GET['status']; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php } ?>
            <li class="page-item">
            <?php   if($page <  $total_pages ){ ?>
              <a class="page-link" href="list.php?status=<?php echo $_GET['status']; ?>&page=<?php echo $page+1;?>">
                <span>»</span>
             <span class="sr-only">Next</span>
              </a>
              <?php }else{ ?>
              <span class="page-link">»</span>
              <?php } ?>
            </li>
          </ul>
        </div>
      </div>
      <?php } ?></div>
  </div>
  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <p class="lead"></p>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.facebook.com" target="_blank">
            <i class="fa fa-fw fa-facebook fa-3x text-white"></i>
          </a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://twitter.com" target="_blank">
            <i class="fa fa-fw fa-twitter fa-3x text-white"></i>
          </a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.instagram.com" target="_blank">
            <i class="fa fa-fw fa-instagram text-white fa-3x"></i>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 
</body>

</html>