<?php 
session_start();
// print_r($_POST['quantity']);
$update = "false" ;
if(isset($_POST['edit']) && $_POST['edit'] == "UPDATE" ){
    for($i = 0 ; $i < count($_SESSION['List']); $i++) {
        if ($_POST['quantity'][$i] <= 0) $_POST['quantity'][$i] = 1;
        $_SESSION['List'][$i]['quantity'] = $_POST['quantity'][$i] ;

    }
        $update = "ture" ;
}    




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
    House : 帶給你最天然健康的幸福滋味
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
                        <li>我的購物車</li>
                    </ul>
                </div>

                <div class="col-md-12" id="basket">

                    <div class="box">

                        <form method="post" action="basket.php">
                              <h1>購物車</h1>
                              <?php if (isset($_SESSION['List']) && $_SESSION['List'] != null ) { ?>
                            <p class="text-muted"></p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">圖片</th>
                                            <th>數量</th>
                                            <th>價格</th>                                         
                                            <th colspan="3">小計</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php  
                                     $totalprice = 0;
                                     $allprice  =  0;
                                                for($i = 0 ; $i < count($_SESSION['List']); $i++) { ?>
                                        <tr>
                                            <td>                                      
                                            <img src="../uploads/products/<?php echo $_SESSION['List'][$i]['picture']?> ">
                                            </td>                                       
                                            <td>
                                            <a href="product?id=<?php echo $_SESSION['List'][$i]['product_id']?>"></a><?php echo $_SESSION['List'][$i]['name']?> 
                                            </td>                                        
                                            <td>
                                            <!-- 數量改陣列 -->
                                            <input type="number" name='quantity[]' value="<?php echo $_SESSION['List'][$i]['quantity']?>" class="form-control">
                                            <input type="hidden" name='edit' value="UPDATE" >

                                            </td>
                                            <td>$<?php echo $_SESSION['List'][$i]['price']?></td>                                          
                                            <td >$<?php $allprice = $_SESSION['List'][$i]['price'] * $_SESSION['List'][$i]['quantity']; echo $allprice ;?></td>                                            
                                            <td ><button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i></td>
                                            <td ><a href="template/delete_cart.php?car=<?php echo $i; ?>" ><i class="fa fa-trash-o"></i></a></td>                                                                                     
                                        </tr>
                                    <?php 
                                            $totalprice  +=  $allprice ;
                                    } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6">小計</th>
                                            <th colspan="3">$ <?php echo  $totalprice  ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i>更新購物車</button>
                                    <?php      if(isset($_SESSION['member']) && $_SESSION['member']  !=null ){  ?>
                                    <a href="checkout1.php" class="btn btn-primary">結帳<i class="fa fa-chevron-right"></i></a> 
                                    <?php   }else{  ?><a href="register.php" class="btn btn-primary">加入會員<i class="fa fa-chevron-right"></i></a>  <?php }  ?>               
                                </div>
                            </div>
                            <?php }else{   ?>
                                <!-- <a href=product?id=<?php echo $_SESSION['List']['product_id']; ?> class="btn btn-outline-info">回上一頁</a> -->
                                <h4>目前無購物清單<a href="productlist.php?id=7">繼續購物</a></h4>
                            <?php      } ?>
                        </form>

                    </div>
                    <!-- /.box -->


                <div class="row same-height-row">
                    <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li>熱門商品</li>
                    </ul>
                    </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                    <img src="../uploads/products/95.jpg" class="img-responsive" >
                                </a>
                                <div class="text">
                                    <h3>波士頓龍蝦</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>

                                                <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                    <img src="../uploads/products/92.jpg" class="img-responsive" >
                                </a>
                                <div class="text">
                                    <h3>咕咕</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                    <img src="../uploads/products/96.jpg" class="img-responsive" >
                                </a>
                                <div class="text">
                                    <h3>奶油鴨胸</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="product same-height">
                                    <img src="../uploads/products/98.jpg" class="img-responsive" >
                                </a>
                                <div class="text">
                                    <h3>培根奶油</h3>
                                    <p class="price">$143</p>
                                </div>
                            </div>
                            <!-- /.product -->
                        </div>
                            <!-- /.product -->
                        </div>

                    </div>


                </div>
                
                <!-- /.col-md-9 -->




                

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
  
<div class="modal fade"  tabindex="-1" role="dialog"  aria-hidden="true" id="jump">
           <div class="modal-dialog modal-sm">

               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <h4 class="modal-title" id="Login">訊息</h4>
                   </div>
                   <div class="modal-body aaa" style="text-align:center">
                     <p class="text-muted">更新成功</p><br>
                     <button class="btn btn-primary" style="text-align:center"  data-dismiss="modal" ><i class="fa fa-sign-in"></i>確定</button>
                       
                       
                   </div>
               </div>
           </div>
</div>


       <?php require_once('template/footer.php'); ?>


       <?php if ($update == "ture") { ?>
         <script>   $(function(){
                $('#jump').modal()
            });
         </script>
       <?php } ?>

       <?php if ($_GET['Del'] == "ture") { ?>
        <script>   
        $(function(){
              $('.aaa>p').html('刪除');
              $('#jump').modal();
              setTimeout(function() {
               $('#jump').modal('hide');}, 1500);
                    });
        </script>
       <?php } ?>




</body>

</html>