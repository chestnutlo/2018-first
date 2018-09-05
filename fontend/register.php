<?php session_start(); 

require_once('../connection/connection.php');

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
                        <li><a href="index.php">首頁</a>
                        </li>
                        <li>加入會員</li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h1>加入會員</h1>
                        <hr>

                        <form action="register_success.php" method="post">
                            <div class="form-group">
                                <label for="name">姓名</label>
                                <input type="text" class="form-control"  name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">帳號</label>
                                <input type="text" class="form-control"  name="account" required>
                            </div>
                            <div class="form-group">
                                <label for="password">密碼</label>
                                <input type="password" class="form-control"  name="password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> 註冊</button>
                            </div>
                        </form>
                    </div>
                </div>

                


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>



</body>

</html>
