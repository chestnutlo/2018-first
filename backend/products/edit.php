<?php 
require_once('../../function/login_check.php');
require_once('../../connection/connection.php');
if(isset($_POST['edit']) && $_POST['edit'] == "UPDATE"){
  
  if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){
    unlink("../../uploads/products/".$_POST['old_picture']);
    $filename = $_FILES['picture']['name'];
    $file_path = "../../uploads/products/".$_FILES['picture']['name'];
    move_uploaded_file($_FILES['picture']['tmp_name'], $file_path);
  }else{
    $filename = $_POST['old_picture'];
  }




$sql= "UPDATE products SET picture=:picture, name=:name, price=:price, description=:description, updated_at=:updated_at WHERE products_id=:products_id";
$sth = $db ->prepare($sql);
$sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
$sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
$sth ->bindParam(":price", $_POST['price'], PDO::PARAM_STR);
$sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
$sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
$sth ->bindParam(":products_id", $_POST['products_id'], PDO::PARAM_INT);
$sth ->execute();

header('Location:list.php?product_categories_id='.$_POST['product_categories_id']);  //導向頁面 header('Location:檔案');
}else{
  $query = $db->query("SELECT * FROM products WHERE products_id=".$_GET['products_id']);
$products = $query->fetch(PDO::FETCH_ASSOC);
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
          <h1 class="">News</h1>
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
            <li class="breadcrumb-item active">products</li>
            <li class="breadcrumb-item active">編輯</li>
            <li> </li>
          </ul>
          <form class="text-right" action='edit.php' method='post' enctype="multipart/form-data">   <!--  -->
          <div class="form-group form-row" >
              <label class="col-sm-2 col-form-label text-center">圖片</label>
              <div class="col-sm-5">
           
                <input type="file"  class="form-control my-1" name='picture' id='picture'> </div>
                <input type="hidden"  name='old_picture' value="<?php echo $products['picture'];  ?>">
            </div>
            <div class="form-group form-row">
              <label    class="col-sm-2 col-form-label text-center">名稱</label>
              <div class="col-sm-10">
                <input type="text" class="form-control my-1" name="name"  value="<?php echo $products['name'];  ?>"> </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label text-center" >價格</label>
              <div class="col-sm-10">
              <input type="text" class="form-control my-1" name="price"  value="<?php echo $products['price'];  ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label text-center" >產品描述</label>
              <div class="col-sm-10">
                <textarea class="form-control"name="description"><?php echo $products['description'];  ?></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" onclick="if(!confirm('確認編輯')){return false;};">輸入</button>
            <input type="hidden" name='product_categories_id' value="<?php echo $products['product_categories_id']; ?> ">
            <input type="hidden" name='products_id' value="<?php echo $products['products_id'];  ?>">     <!-- 欄位 -->
            <input type="hidden" name='updated_at' value="<?php  echo date('y-m-d H:i:s') ?>">  <!-- 設定系統時間 -->
            <input type="hidden" name='edit' value='UPDATE'>   <!--    -->
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