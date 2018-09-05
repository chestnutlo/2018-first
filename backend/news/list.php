<?php 
require_once('../../function/login_check.php');
require_once('../../connection/connection.php');
$limit = 4;
if(isset($_GET['page']))  { $page = $_GET['page']; }else{$page = 1 ;}; 
$start_from = ($page-1) * $limit;
$query = $db->query("SELECT * FROM news ORDER BY published_date  DESC LIMIT ".$start_from." , ".$limit);
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
<div class="py-5" style= "background-image: url(../../images/3.jpeg); opacity:0.8"  >
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">最新消息</h1>
          <p class="lead">Why waiting if you can do it ?</p>
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
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">news</li>
          </ul>
          <a class="btn btn-outline-dark m-1" href="creat.php">新增 </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
         <?php if ($totalrows > 0) { ?>
          <table class="table">
           <thead>
              <tr>
                <th width=10%>Date</th>
                <th>Title</th>
                <th>contant</th>
                <th width=15%>Operating</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($data as $news){ 
             ?>
              <tr>
                <td><?php echo $news['published_date']; ?></td>
                <td><?php echo $news['title']; ?></td>
                <td class='text-left'><?php echo mb_strimwidth($news['content'],0,100,'....Read'); ?></td>
                <td>
                  <a href=edit.php?news_id=<?php echo $news['news_id']; ?> class="btn btn-outline-info">編輯</a>
                  <a class="btn btn-outline-danger" href="delete.php?news_id=<?php echo $news['news_id']; ?>"  onclick="if(!confirm('掰掰!!')){return false;};">刪除</a>
                </td>
              </tr>  
          <?php } ?>
            </tbody>
          </table>
            <?php } else {  ?><h1>無資料顯示</h1> <?php } ?>
            </div>
      </div>
      <?php  if($totalrows > 0){
            $sth = $db->query("SELECT * FROM news ORDER BY published_date DESC ");
            $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
            $total_pages = ceil($data_count / $limit);
           ?>
        <div class="row">
        <div class="col-md-12">
          <ul class="pagination">
            <li class="page-item">
            <?php   if($page > 1){ ?>
              <a class="page-link" href="list.php?page=<?php echo $page-1;?>">
                <span >«</span>
               </a>
            </li> <?php }else{ ?>
              <span class="page-link">«</span>
            <?php } ?>
            <?php for ($i=1; $i<=$total_pages; $i++) { ?>
            <li class="page-item">
              <a class="page-link" href="list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php } ?>
            <li class="page-item">
            <?php   if($page <  $total_pages ){ ?>
              <a class="page-link" href="list.php?page=<?php echo $page+1; ?>">
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