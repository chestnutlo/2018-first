<?php session_start(); ?>
<?php 
require_once('../connection/connection.php');

$query = $db->query("SELECT * FROM news WHERE news_id=".$_GET['id']);
$news = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="我覺得不行">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        安安你好
    </title>

    <meta name="keywords" content="">

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
                        <hr>
                        <h3 class="intro"><?php echo (strip_tags($news['content'])); ?></h3> 
                        
                    </div>
     
  

                    
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">最新消息</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="newslist.php">上一頁</a>
                                </li>
                                
                            </ul>
                        </div>

                    </div>
      

                    <div class="banner">
                        <a href="#">
                            <img src="../images/辱動.gif" " class="img-responsive">
                        </a>
                    </div>
                </div>

            
            <!-- /.container -->
        </div>
       
        
        

  
          
        
        <!-- /#content -->


       <?php require_once('template/footer.php'); ?>
        



</body>

</html>