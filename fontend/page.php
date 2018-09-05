<?php session_start(); ?>
<?php

require_once('../connection/connection.php');



$query = $db->query("SELECT * FROM page ORDER BY page_id");
$about = $query->fetchAll(PDO::FETCH_ASSOC);
?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cake House 帶給你最天然健康的幸福滋味">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Cake House : 帶給你最天然健康的幸福滋味
    </title>

    <meta name="keywords" content="">
    <?php require_once('template/head_files.php'); ?>
   



</head>

<body>
    <?php require_once('template/navbar.php'); ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">首頁</a>
                        </li>
                        <li>關於我們</li>
                    </ul>
                </div>

                        <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Pages</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="page.php">關於我們</a>
                                </li>
                                <li>
                                    <a href="contact.php">聯絡我們</a>
                                </li>
                                <li>
                                    <a href="faq.php">FAQ</a>
                                </li>

                            </ul>

                        </div>
                    </div>

                    <!-- *** PAGES MENU END *** -->


                    <div class="banner">
                        <a href="#">
                            <img src="../images/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>
                    <?php foreach($about as $page){  ?>
            
                   <div class="col-md-9">
                     <div class="box" id="text-page">
             
                        <h1><?php echo $page['title']; ?></h1>
                        <p class="text-muted"> <?php echo $page['content'] ?> </p> 
                    </div> 
                  
            <!-- /.container -->
        </div>  <?php } ?>
        </div>
        </div>
        <!-- /#content -->
 <?php require_once('template/footer.php'); ?>


</body>

</html>