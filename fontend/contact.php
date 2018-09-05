<?php 
session_start();

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
       我覺得不行阿
    </title>

    <meta name="keywords" content="">

    <?php require_once('template/head_files.php'); ?>



</head>

<body>
<?php require_once('template/navbar.php'); ?>

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">首頁</a>
                        </li>
                        <li>Contact</li>
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
                                    <a href="contact.php" >聯絡我們</a>
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

                <div class="col-md-9">


                    <div class="box" id="contact">
                        <h1>聯絡我們</h1>

                        <p class="lead">
                             你對某事感到好奇嗎？您對我們的產品有什麼問題嗎？  </p>
                        <p>請隨時與我們聯繫，我們的客戶服務中心全天候為您服務。</p>

                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> 門市地點</h3>
                                <p>台灣省
                                    <br>桃園市
                                    <br>中壢區
                                    <br>健行路
                                    <br>
                                    <strong>229號</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> 客服中心</h3>
                                <p class="text-muted">如果從公共電話打電話，這個號碼是免費的，否則我們建議您使用電子形式的通訊。</p>
                                <p><strong>0800-000-080</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i> 線上客服</h3>
                                <p class="text-muted">請隨時給我們發電子郵件或使用我們的電子票務系統。</p>
                                <ul>
                                    <li><strong>info@fakeemail.com</strong>
                                    </li>
                                    <li><strong>Ticketio</strong> - 我們的票務支持平台</li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <!-- /.row -->
                        <hr>
                        

                        <form method="post" action="mail_sent.php">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">姓名</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile">聯絡電話</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="subject">標題</label>
                                        <input type="text" class="form-control" id="subject" name="subject"> 
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">訊息</label>
                                        <textarea id="message" class="form-control" name="message"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> 確定送出</button>
                                    <input type="hidden" name="edit" value="UPDATE">
                                </div>
                            </div>
                            <!-- /.row -->
                        </form>


                    </div>


                </div>
                <!-- /.col-md-9 -->
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
                     <p class="text-muted">寄送完成</p><br>
                     <button class="btn btn-primary" style="text-align:center"  data-dismiss="modal" ><i class="fa fa-sign-in"></i>確定</button>
                       
                       
                   </div>
               </div>
           </div>
</div>

        <?php require_once('template/footer.php'); ?>

       <!-- 寄送完成顯示 -->

        <?php if ($_GET['sent'] == "ture") { ?>
         <script>   $(function(){
                $('#jump').modal()
            });
         </script>
       <?php } ?>



</body>

</html>
