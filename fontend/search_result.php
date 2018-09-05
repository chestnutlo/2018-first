<?php
 session_start();
require_once('../connection/connection.php');

$query = $db->query("SELECT * FROM products WHERE name LIKE '%".$_GET['keyword']."%' OR description LIKE '%".$_GET['keyword']."%' " );
$search = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Obaju : e-commerce template
    </title>

    <meta name="keywords" content="">

 <?php require_once('template/head_files.php'); ?>


</head>

<body>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
   
 <?php require_once('template/navbar.php'); ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>站內搜尋</li>
                        <li><?php echo $_GET['keyword'] ?> </li>  
                    </ul>

                </div>
                
                <div class="col-md-3">
                                     
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3>產品種類</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                            <?php foreach($category as $article){    
                                $query = $db->query("SELECT * FROM products WHERE product_categories_id=".$article['product_categories_id']);
                                $total_products= count($query->fetchAll(PDO::FETCH_ASSOC));
                                    ?>
                                <li>
                                   <a href="productlist.php?id=<?php echo $article['product_categories_id']; ?>"><?php echo $article['category'];?>
                                   <span class="badge pull-right"><?php echo $total_products ?></span></a>
                                </li>
                            <?php }?>
                            </ul>
                        </div> 
                    </div>
                    <div class="banner">
                        <a href="#">
                            <img src="../images/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>
                   
                <div class="col-md-9">
                <div class="row">

                <?php foreach($search as $product){ ?>
                 
                <div class="col-sm-3">
                
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                        <a href="product.php?id=<?php echo $product['products_id']; ?>" >
                                                <img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                        <a href="product.php?id=<?php echo $product['products_id']; ?>" >
                                                <img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="product.php?id=<?php echo $product['products_id']; ?>" class="invisible">
                                <img src="../uploads/products/<?php echo $product['picture']; ?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                <a href="product.php?id=<?php echo $product['products_id']; ?>">
                                <h3><?php echo $product['name']; ?></h3>  </a>

                                
                                    <p class="price"><?php echo $product['price']; ?></p>
                                </div>

                                <?php if ($product['type'] ==1){ ?>

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php }else if ($product['type'] ==2){ ?>
                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php   }    ?>
                                <!-- /.ribbon -->
                            </div>
                            <!-- /.product -->
                        </div>
                    <?php } ?>
                </div>
         
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->


   <?php require_once('template/footer.php'); ?>






</body>

</html>