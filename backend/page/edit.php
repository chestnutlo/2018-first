<?php 
require_once('../../function/login_check.php');
require_once('../../connection/connection.php');


if(isset($_POST['edit']) && $_POST['edit'] == "UPDATE"){
$sql= "UPDATE page SET title=:title, content=:content, updated_at=:updated_at WHERE page_id=:page_id ";
$sth = $db ->prepare($sql);

$sth ->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
$sth ->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
$sth ->bindParam(":page_id", $_POST['page_id'], PDO::PARAM_INT);
$sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
$sth ->execute();

header('Location:list.php');  //導向頁面 header('Location:檔案');
}else{
  $query = $db->query("SELECT * FROM page WHERE page_id=".$_GET['page_id']);
$page = $query->fetch(PDO::FETCH_ASSOC);
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
            <li class="breadcrumb-item active">頁面</li>
            <li class="breadcrumb-item active">編輯</li>
            <li> </li>
          </ul>
          <form class="text-right" action='edit.php' method='post'>   <!--  -->

            <div class="form-group form-row" >
              <label class="col-sm-2 col-form-label text-center" >標題</label>
              <div class="col-sm-10">
                <input class="form-control my-1 text-center"  name="title" value="<?php echo $page['title'];  ?>"> </div>
            </div>
            <div class="form-group form-row">
              <label class="col-sm-2 col-form-label text-center"  >內容</label>
              <div class="col-sm-10">
                <textarea class="form-control"name="content" id='datepicker'><?php echo $page['content'];  ?></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" onclick="if(!confirm('確認編輯')){return false;};">輸入</button>
            <input type="hidden" name='page_id' value="<?php echo $page['page_id'];  ?>">     <!-- 寫入欄位 -->
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