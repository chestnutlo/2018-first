<?php 
require_once('../../function/login_check.php');
require_once('../../connection/connection.php');
if(isset($_POST['addform']) && $_POST['addform'] == "insert"){
  
if (!file_exists('../../uploads/products')) {
  mkdir('../../uploads/products', 0755, true);}     //建立圖片資料夾

  $file_path = "../../uploads/products/".$_FILES['picture']['name'];
  if(isset($_FILES['picture']['name'])){
    $filename = $_FILES['picture']['name'];
    move_uploaded_file($_FILES['picture']['tmp_name'],$file_path);
  }else{
    $filename = null;
  }

$sql= "INSERT INTO products(picture,name,price,description,created_at,product_categories_id) 
VALUES (:picture,:name,:price,:description,:created_at,:product_categories_id)";
$sth = $db ->prepare($sql);
$sth ->bindParam(":picture", $filename , PDO::PARAM_STR);
$sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
$sth ->bindParam(":price", $_POST['price'], PDO::PARAM_STR);
$sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
$sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
$sth ->bindParam(":product_categories_id", $_POST['product_categories_id'], PDO::PARAM_INT);
$sth ->execute();
header('Location:list.php?product_categories_id=' .$_POST['product_categories_id']);  
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" price="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../js/jquery-ui-1.12.1/jquery-ui.css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css"> 
 

</head>
<body>
<?php require_once('../../surface/surface_nav.php');  ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">新增產品</h1>
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
            <li class="breadcrumb-item active">產品</li>
            <li class="breadcrumb-item active">新增</li>
            <li> </li>
          </ul>
          <form class="text-right" action='creat.php' method='post' enctype="multipart/form-data">   <!--  -->
          <div class="form-group form-row" >
              <label class="col-sm-2 col-form-label text-center">圖片</label>
              <div class="col-sm-10">
                <input type="file" class="form-control my-1" name='picture'> </div>
            </div>
            <div class="form-group form-row">
              <label    class="col-sm-2 col-form-label text-center">名稱</label>
              <div class="col-sm-10">
                <input type="text" class="form-control my-1" name="name"> </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label text-center" >價格</label>
              <div class="col-sm-10">
              <input type="text" class="form-control my-1" name="price">
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label text-center" >產品描述</label>
              <div class="col-sm-10">
                <textarea class="form-control"name="description" id=""></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">輸入</button>
            <input type="hidden" name='product_categories_id' value="<?php echo $_GET['product_categories_id']; ?>">
            <input type="hidden" name='created_at' value="<?php  echo date('y-m-d H:i:s') ?>">  <!-- 設定系統時間 -->
            <input type="hidden" name='addform' value='insert'>   <!--    -->
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
  
  <script src="../../js/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
  <script src="../../js/jquery-ui-1.12.1/jquery-ui.js"></script>
  <script src="../../js/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
  selector: 'textarea',
  height: 200,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code help wordcount'
  ],
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});

  } );
  </script>
</body>

</html>