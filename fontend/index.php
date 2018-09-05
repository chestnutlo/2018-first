<?php session_start(); 
require_once('../connection/connection.php');

$query = $db->query("SELECT * FROM products WHERE type ORDER BY created_at" );
$product_list = $query->fetchAll(PDO::FETCH_ASSOC);

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
    Class.test
    </title>

    <meta name="keywords" content="">


    <?php require_once('template/head_files.php'); ?>

</head>

<body>

      <?php require_once('template/navbar.php'); ?>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



    <div id="all">

        <div id="content">
           
            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider" >
                        <div class="item">
                            <img class="img-responsive" src="../images/b4.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="../images/hero-1.jpg" alt="">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="../images/hero-4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            

                <!-- /.container -->            
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>熱門單品</h2>
                            <h4 style="text-align:center" >Top Sale</h4>
                        </div>
                    </div>
                </div> 
                <div class="container">

                    <div class="product-slider">
                    <?php foreach($product_list as $product){ ?> 
                        <div class="item">
                     
                            <div class="product">                                                   
                                <a href="product.php?id=<?php echo $product['products_id']; ?>" >
                                <img src="../uploads/products/<?php echo $product['picture']; ?>"  width="176" height="160">
                                </a>
                                <div class="text">  
                                <a href="product.php?id=<?php echo $product['products_id']; ?>" >
                                <h3><?php echo $product['name']; ?></h3>   </a>  

                                    <p class="price">$NT<?php echo $product['price']; ?></p>
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
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
         <div id="advantages">
                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon">
                                    <i class="fa fa-heart"></i>
                                </div>

                                <h3>
                                    <a href="page.php">About Us</a>
                                </h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>  
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon">
                                    <i class="fa fa-tags"></i>
                                </div>

                                <h3>
                                    <a href="page.php">Best prices</a>
                                </h3>
                                <p>You can check that the height of the boxes adjust when longer text like this one is used
                                    in one of them.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon">
                                    <i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3>
                                    <a href="page.php">100% satisfaction guaranteed</a>
                                </h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            <!-- *** GET INSPIRED END *** -->
        </div>
            <!-- *** BLOG HOMEPAGE ***
   
   _________________________________________________________ -->

            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">關於</h3>

                        <p class="lead">What's new in the world of fashion?
                            Check our blog!
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4>
                                Fashion now
                                </h4>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                                    Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                                    libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend
                                    leo.
                                </p>
                                <p class="read-more">
                                    <a href="#" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="post">
                                <h4>
                                Who is who - example blog post
                                </h4>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                                    Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                                    libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend
                                    leo.
                                </p>
                                <p class="read-more">
                                    <a href="#" class="btn btn-primary">Continue reading</a>
                                </p>
                            </div>

                        </div>

                    </div>
                    <!-- /#blog-homepage -->
                </div>
            </div>
            <!-- /.container -->

            <!-- *** BLOG HOMEPAGE END *** -->


        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 __________ _______________________________________________ -->
   
        <?php require_once('template/footer.php'); ?>
  
</body>

</html>