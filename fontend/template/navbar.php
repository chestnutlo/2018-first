<?php 

require_once('../connection/connection.php');


$query = $db->query("SELECT * FROM  product_categories ORDER BY  product_categories_id DESC ");
$category = $query->fetchAll(PDO::FETCH_ASSOC);

?>

   <div id="top">
       <div class="container">
           <div class="col-md-6 offer" data-animate="fadeInDown">
               
           </div>
           <div class="col-md-6" data-animate="fadeInDown">
               <ul class="menu">

               <?php if(isset($_SESSION['member']) && $_SESSION['member']  !=null ){ ?>
                <li><a href="customer_account.php">會員專區</a>
                </li>
                <li><a href="logout.php">登出</a>
                </li>
               <?php }  else{  ?>

                   <li><a href="" data-toggle="modal" data-target="#login-modal">會員登入</a>
                   </li>
                   <li><a href="register.php">加入會員</a>
                   </li>
               <?php }  ?>
                   <li><a href="404.php">客服聯繫</a>
                   </li>
               </ul>
           </div>
       </div>
       <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
           <div class="modal-dialog modal-sm">

               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title" id="Login">會員登入</h4>
                   </div>
                   <div class="modal-body">
                       <form action="check.php" method="post">
                           <div class="form-group">
                               <input type="text" class="form-control" name="account" placeholder="account">
                           </div>
                           <div class="form-group">
                               <input type="password" class="form-control" name="password" placeholder="password">
                           </div>

                           <p class="text-center">
                               <button class="btn btn-primary"><i class="fa fa-sign-in"></i> 登入</button>
                           </p>

                       </form>

                  </div>
               </div>
           </div>
       </div>

   </div>

   <!-- *** TOP BAR END *** -->

   <!-- *** NAVBAR ***
_________________________________________________________ -->

   <div class="navbar navbar-default yamm" role="navigation" id="navbar">
       <div class="container">
           <div class="navbar-header">

               <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                   <img src="../images/a-6.png" alt="Cake House logo" class="hidden-xs" data-animate-hover="shake">
                   <img src="../images/logo-small.png" alt="Cake House logo" class="visible-xs">
               </a>              
           </div>
           <!--/.navbar-header -->

           <div class="navbar-collapse collapse" id="navigation">

               <ul class="nav navbar-nav navbar-left">
                    <li>
                       <a href="index.php" >首頁</a>
                       
                   </li>
                   <li>
                       <a href="newslist.php" >最新消息</a>
                       
                   </li>
                   <li>
                       <a href="page.php" >關於我們</a>
                       
                   </li>
                   <li class="dropdown yamm-fw">
                       <a href="#"   data-hover="dropdown">產品介紹<b class="caret"></b></a>
                       <ul class="dropdown-menu">
                           <li>
                               <div class="yamm-content">
                                   <div class="row">
                                       <div class="col-sm-12">
                                       <?php foreach($category as $product_categories){ ?>
                                       <a href="productlist.php?id=<?php echo $product_categories['product_categories_id']; ?> ">
                                       <h5><?php echo $product_categories['category']; ?></h5></a>     <?php } ?>
                                       </div>
                                   </div>
                               </div>
                               <!-- /.yamm-content -->
                           </li>
                       </ul>
                   </li>

                   <li class="dropdown yamm-fw">
                       <a href="contact.php" >聯絡資訊</a>
                       
                   </li>
               </ul>

           </div>
           <!--/.nav-collapse -->

           <div class="navbar-buttons">

               <div class="navbar-collapse collapse right" id="basket-overview">
             <a href="basket.php" class="btn btn-primary navbar-btn" ><i class="fa fa-shopping-cart"></i>
             <span class="hidden-sm">(<?php if(isset($_SESSION['List']) && $_SESSION['List'] != null) echo count($_SESSION['List']); else echo "0"; ?>)</span></a>
               </div>
               <!--/.nav-collapse -->

               <div class="navbar-collapse collapse right" id="search-not-mobile">
                   <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                       <span class="sr-only">Toggle search</span>
                       <i class="fa fa-search"></i>
                   </button>
               </div>

           </div>

           <div class="collapse clearfix" id="search">

               <form class="navbar-form" role="search" method="get" action="search_result.php">
                   <div class="input-group">
                       <input type="text" class="form-control" placeholder="本站查詢" name="keyword"  >
                       <span class="input-group-btn">

           <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

           </span>
                   </div>
               </form>

           </div>
           <!--/.nav-collapse -->

       </div>
       <!-- /.container -->
   </div>
   <!-- /#navbar -->

   <!-- *** NAVBAR END *** -->
