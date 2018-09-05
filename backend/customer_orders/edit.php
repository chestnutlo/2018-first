<?php 
require_once('../../function/login_check.php');
require_once('../../connection/connection.php');

if(isset($_POST['edit']) && $_POST['edit'] == "UPDATE"){

  $sql= "UPDATE customer_orders SET status=:status, memo=:memo, updated_at=:updated_at WHERE customer_orders_id=:customer_orders_id";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":status", $_POST['status'], PDO::PARAM_STR);
  $sth ->bindParam(":memo", $_POST['memo'], PDO::PARAM_STR);
  $sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
  $sth ->bindParam(":customer_orders_id", $_POST['customer_orders_id'], PDO::PARAM_INT);
  $sth ->execute();


header('Location:list.php?status='.$_POST['status']);  //導向頁面 header('Location:檔案');
}else{
  $query = $db->query("SELECT * FROM customer_orders WHERE customer_orders_id =".$_GET['detail']);
  $customer_orders = $query->fetch(PDO::FETCH_ASSOC);
  $query2 = $db->query("SELECT * FROM members WHERE members_id =".$customer_orders['members_id']);
  $member = $query2->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css"> </head>

<body>
<?php require_once('../../surface/surface_nav.php');  ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">訂單編輯</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb" style="margin-bottom:0px;margin-top:0px">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">customer_orders</li>
            <li class="breadcrumb-item active">編輯</li>
            <li> </li>
          </ul>
          <form  action="edit.php" method="post">
          <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">訂單狀態</label>
              <div class="col-sm-10  text-left">
                <input type="radio" name="status" value="0" <?php if($customer_orders['status'] == 0) echo "checked" ?>> 新訂單
                <input type="radio" name="status" value="1" <?php if($customer_orders['status'] == 1) echo "checked" ?>> 已付款
                <input type="radio" name="status" value="2" <?php if($customer_orders['status'] == 2) echo "checked" ?>> 已出貨
                <input type="radio" name="status" value="3" <?php if($customer_orders['status'] == 3) echo "checked" ?>> 交易完成
                <input type="radio" name="status" value="99" <?php if($customer_orders['status'] == 99) echo "checked" ?>> 取消訂單
                </div>
   </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">訂單編號</label>
              <div class="col-sm-10 text-left">
                <?php echo $customer_orders['order_no']; ?>
              </div>
            </div>
           <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">訂購日期</label>
              <div class="col-sm-10  text-left">
                <?php echo $customer_orders['order_date']; ?>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">訂單總金額</label>
              <div class="col-sm-10  text-left">
                <?php echo $customer_orders['total_price']; ?>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">運費</label>
              <div class="col-sm-10  text-left">
                <?php echo $customer_orders['shipping']; ?>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">訂購會員</label>
              <div class="col-sm-10  text-left">
                <?php echo $member['name']; ?>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">收件者</label>
              <div class="col-sm-10  text-left">
                <?php echo $customer_orders['name']; ?>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">聯絡電話</label>
              <div class="col-sm-10  text-left">
                <?php echo $customer_orders['phone']; ?>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">收件地址</label>
              <div class="col-sm-10  text-left">
              <?php echo $customer_orders['zipcode']; ?>.<?php echo $customer_orders['county']; ?>.<?php echo $customer_orders['district']; ?>.<?php echo $customer_orders['address']; ?>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label">備註</label>
              <div class="col-sm-10">
                <textarea row="8" class="form-control" name="memo"><?php echo $customer_orders['memo']; ?></textarea>
              </div>
            </div >
            <div style='text-align:right'>
            <button type="submit" class="btn btn-primary" onclick="if(!confirm('確認編輯')){return false;};">輸入</button>
            <input type="hidden" name='members_id' value="<?php echo $member['members_id'];  ?>">
            <input type="hidden" name='customer_orders_id' value="<?php echo $customer_orders['customer_orders_id'];  ?>">     <!-- 欄位 -->
            <input type="hidden" name='updated_at' value="<?php  echo date('y-m-d H:i:s') ?>">  <!-- 設定系統時間 -->
            <input type="hidden" name='edit' value='UPDATE'>   <!--    -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <p class="lead">Do you best !</p>
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

</body>

</html>