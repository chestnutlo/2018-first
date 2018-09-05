<?php session_start(); ?>
<?php

require_once('../connection/connection.php');
$limit = 2;
if(isset($_GET['page']))  { $page = $_GET['page']; }else{$page = 1 ;}; 
$start_from = ($page-1) * $limit;
$query = $db->query("SELECT * FROM news ORDER BY published_date DESC LIMIT ".$start_from." , ".$limit);
$data = $query->fetchAll(PDO::FETCH_ASSOC);

$totalrows = count($data);
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <title>
        安安你好
    </title>


    <?php require_once('template/head_files.php'); ?>



</head>

<body>

   <?php require_once('template/navbar.php'); ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-sm-12">
                    <ul class="breadcrumb">

                        <li><a href="index.html">首頁</a>
                        </li>
                        <li>消息最新</li>
                    </ul>
                </div>
                    <div class="col-sm-9" id="blog-listing">
                    <?php foreach($data as $news){ ?>
                    <div class="post">
                        <h2><?php echo $news['title']; ?></h2>
                        <hr>
                       <p class="date-comments">
                            <a href="post.html"><i class="fa fa-calendar-o"></i> <?php echo $news['published_date']; ?>
                         
                       </p>
                        <div class="image">
                            <a href="post.html">
                                <img src="../images/2.jpeg" class="img-responsive" >
                            </a>
                        </div>
                        <p class="intro"><?php echo mb_strimwidth(strip_tags($news['content']),0,100,'....Read'); ?></p> 
                        <a href=news_detail.php?id=<?php echo $news['news_id']; ?> ><button type="input" class="btn btn-primary"><i class="fa fa-sign-in"></i>查看</button></a>
                        
                    </div>
     
                    <?php } ?>

                    
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">最新消息</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="page.php">關於</a>
                                </li>
                           
                            </ul>
                        </div>

                    </div>
      

                    <div class="banner">
                        <a href="#">
                            <img src="../images/tra.gif" " class="img-responsive">
                        </a>
                    </div>
                </div>

            <div class="col-md-9">
           <?php  if($totalrows > 0){
                     $sth = $db->query("SELECT * FROM news ORDER BY published_date DESC ");
                     $data_count = count($sth ->fetchAll(PDO::FETCH_ASSOC));
                    $total_pages = ceil($data_count / $limit);
                    ?>
          <ul class="pager">
            <li class="page-item">
            <?php   if($page > 1){ ?>
             <a class="page-link" href="newslist.php?page=<?php echo $page-1;?>">
                <span >«</span>
               </a>
            </li> <?php }else{ ?>
              <span class="page-link">«</span>
            <?php } ?>
            <?php for ($i=1; $i<=$total_pages; $i++) { ?>
            <li class="page-item">
              <a class="page-link" href="newslist.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php } ?>
            <li class="page-item">
            <?php   if($page <  $total_pages ){ ?>
              <a class="page-link" href="newslist.php?page=<?php echo $page+1; ?>">
                <span>»</span>
             <span class="sr-only">Next</span>
              </a>
              <?php }else{ ?>
              <span class="page-link">»</span>
              <?php } ?>
            </li>
          </ul>
          <?php } ?>
            </div>
            <!-- /.container -->
        </div>
       
        
        

  
          
        
        <!-- /#content -->


       <?php require_once('template/footer.php'); ?>
        



</body>

</html>