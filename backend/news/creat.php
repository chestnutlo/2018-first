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



$sql= "INSERT INTO news(published_date, title, content, created_at ,picture) 
VALUES (:published_date,:title,:content,:created_at ,:picture)";
$sth = $db ->prepare($sql);
$sth ->bindParam(":picture", $filename , PDO::PARAM_STR);
$sth ->bindParam(":published_date", $_POST['published_date'], PDO::PARAM_STR);
$sth ->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
$sth ->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
$sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
$sth ->execute();
  header('Location:list.php');  //導向頁面 header('Location:檔案');
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <li class="breadcrumb-item active">news</li>
            <li class="breadcrumb-item active">新增</li>
            <li> </li>
          </ul>
          <form class="text-right" action='creat.php' method='post'>   
          <div class="form-group form-row" >
              <label class="col-sm-2 col-form-label text-center"  >日期</label>
              <div class="col-sm-10">
                <input type="text" class="form-control my-1" name='published_date' id="datepicker" required="required" autofocus> </div>
            </div>
            <div class="form-group form-row">
              <label    class="col-sm-2 col-form-label text-center">標題</label>
              <div class="col-sm-10">
                <input type="text" class="form-control my-1" name="title" > </div>
            </div>
            <div class="form-group form-row" >
              <label class="col-sm-2 col-form-label text-center">圖片</label>
              <div class="col-sm-10">
              <input type="file" class="form-control my-1" name='picture'> </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label text-center" >內容</label>
              <div class="col-sm-10">
                <textarea class="form-control"name="content" ></textarea>
              </div>
            </div>
            <input type="reset" class="btn btn-primary" value="清空">
            <button type="submit" class="btn btn-primary">輸入</button>
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
  $( function() {
    $("#datepicker").datepicker({
  dateFormat: "yy-mm-dd"
});
  } );
  </script>
  
</body>

</html>