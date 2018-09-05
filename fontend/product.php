<?php 
session_start();
require('../connection/connection.php');
// 清除購物資料
// unset($_SESSION['Cart']);
$query = $db->query("SELECT * FROM products WHERE products_id=".$_GET['id']);
$product= $query->fetch(PDO::FETCH_ASSOC);

$query2 = $db->query("SELECT * FROM product_categories WHERE product_categories_id =".$product['product_categories_id']);
$member = $query2->fetch(PDO::FETCH_ASSOC);
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
   
    <?php require_once('template/head_files.php');?>

</head>

<body>


<!-- <?php
  if(isset($_GET['加入商品']) && $_GET['加入商品'] != null){
    if($_GET['加入商品'] == 'true'){
      echo "<script>alert('此商品已存在購物車，請至「我的購物車」修改數量。')</script>";
    }else{
      echo "<script>alert('成功加入購物車!')</script>";
    }
  }
  ?> -->



<?php require_once('template/navbar.php'); ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">首頁</a>
                        <li><?php echo $member['category'];?></li>
                        <li><?php echo $product['name'];?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">產品分類</h3>
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
                <!-- *** MENUS AND FILTERS END *** -->
                    <div class="banner">
                        <a href="#">
                            <img src="../images/ad-banner.jpg" alt="cake" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9" >

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="../uploads/products/<?php echo $product['picture'];?>" alt="" class="img-responsive">
                            </div>

                             <?php if($product['type']==1){?>
                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php } else if($product['type']==2){ ?>
                                <!-- /.ribbon -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <?php }?>

                        </div>
                        <div class="col-sm-6">
                            <form action='template/cart.php' method="post">
                            <div class="box">
                                <h1 class="text-center"><?php echo $product['name'];?></h1>
                                <p class="goToDescription">超好喝!</p>                                                                                             
                                <p class="price">$NT<?php echo $product['price'];?></p>                              
                                  <div class="col-sm-6">
                                <div class="form-group">                               
                                <input type="number"  value="1" class="form-control"  name='quantity'>
                                </div>
                                </div>
                               <p class="text-center buttons">
                            <button type="submit" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i>加入購物車</button></p>
                                    <!-- <a href="basket.php" class="btn btn-default"><i class="fa fa-heart"></i>願望清單</a> -->
                               <input type="hidden" name='img' value="<?php echo $product['picture'];?>" >
                               <input type="hidden" name='products_name' value="<?php echo $product['name'];?>" >
                               <input type="hidden" name='price' value="<?php echo $product['price'];?>" >
                               <input type="hidden" name='id' value="<?php echo $product['products_id'];?>">
                             </div>
                         </form>
                       

                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    <a href="../uploads/products/<?php echo $product['picture'];?>" class="thumb">
                                        <img src="../uploads/products/<?php echo $product['picture'];?>"alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="../uploads/products/<?php echo $product['picture'];?>" class="thumb">
                                        <img src="../uploads/products/<?php echo $product['picture'];?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="../uploads/products/<?php echo $product['picture'];?>" class="thumb">
                                        <img src="../uploads/products/<?php echo $product['picture'];?>" alt="" class="img-responsive">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>產品介紹</h4>
                            
                            <blockquote>
                                <p><?php echo $product['description'];?> </p>
                               
                            </blockquote>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>


                            
                        </div>

                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

 <?php require_once('template/footer.php'); ?>


 <div class="modal fade"  tabindex="-1" role="dialog"  aria-hidden="true" id="jump">
           <div class="modal-dialog modal-sm">

               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title" id="Login">訊息</h4>
                   </div>
                   <div class="modal-body" style="text-align:center">
                     <p class="text-muted">更新成功</p><br>
                     <button class="btn btn-primary" style="text-align:center"  data-dismiss="modal" ><i class="fa fa-sign-in"></i>確定</button>   
                   </div>
               </div>
           </div>
</div>

<!-- 判斷是否商品是否已加入 彈出視窗 -->
<?php
  if(isset($_GET['加入商品']) && $_GET['加入商品'] != null){
    if($_GET['加入商品'] == 'true'){   ?>
          <script>   
          $(function(){
               $('.modal-body>p').html('此商品已存在');
                  $('#jump').modal();
            });
         </script>
     <?php   }else{   ?>
        <script>   
        $(function(){
              $('.modal-body>p').html('成功加入');
              $('#jump').modal();
              setTimeout(function() {
               $('#jump').modal('hide');}, 2000);
                    });
        </script>
<?php   } }  ?>
 
   
  

</body>

</html>