<?php
session_start();

$is_existed = "false";
//判斷商品是否重覆
if(isset($_SESSION['List']) && $_SESSION['List'] != null){
  for($i = 0 ; $i < count($_SESSION['List']); $i++){
    if($_POST['id'] == $_SESSION['List'][$i]['product_id']){
      $is_existed = "true";
      goto_Page($is_existed);
    }
  }
}
if($is_existed == "false" ){
 //將接收的商品資料存到$temp陣列
  $temp['product_id']   = $_POST['id'];
  $temp['name']         = $_POST['products_name'];
  $temp['picture']      = $_POST['img'];
  $temp['price']        = $_POST['price'];
  $temp['quantity']     = $_POST['quantity'];
  //將陣列資料加入到session List中
  $_SESSION['List'][] = $temp;

  goto_Page($is_existed);
}

function goto_Page($is_existed){
    $url= explode('?',$_SERVER['HTTP_REFERER']);
    $location = $url[0];
    $location.= "?id=".$_POST['id'];
    $location.= "&加入商品=".$is_existed;

    header(sprintf('Location: %s ', $location));
  }

 ?>
