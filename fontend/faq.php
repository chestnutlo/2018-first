<?php session_start(); ?>
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

    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">首頁</a>
                        </li>
                        <li>FAQ</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">分頁</h3>
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
                                    <a href="faq.php" active='ture'>FAQ</a>
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
                        <h1>常見問題</h1>

                        <hr>
                      <div class="panel-group" id="accordion">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

					    <a data-toggle="collapse" data-parent="#accordion" href="#faq1">

						1. 我要如何進行退(換)貨?

					    </a>

					    </h4>
                                </div>
                                <div id="faq1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>退換貨流程須知：</p>
                                        <ol>
                                        <li>若因商品本身瑕疵，運費由本公司負擔，消費者需於收到商品七日內，告知本公司要求退換貨，消費者除應保持原購買商品相關附件包裝、及所有附隨文件或資料之完整性，連同發票於告知後三日內寄回至本公司，若超過期限則不予辦理退換貨。</li><br>
                                        <li>若非商品本身瑕疵（例：因尺寸不合／購買錯誤等），消費者需於收到商品七日內，告知本公司要求退換貨．因非本公司造成消費者需退換貨，運費由消費者自行負擔，並且商品應保持原購買商品相關附件包裝、及所有附隨文件或資料之完整性，連同發票於告知後三日內由消費者自行寄回至本公司（台北市內湖區內湖路一段１２０巷１７號２樓／電子商務部／０２－６６０１－７７７０），若超過期限則不予退換貨。</li><br>
                                        <li>海外退換因應狀況的不同，將會由不同的方式辦理，若有任何問題，煩請至客服中心留言。</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

					    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">

						2. 我是選擇宅配到府，大概多久可以收到訂購的商品呢？

					    </a>

					</h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       若商品有現貨時，當您訂單完成所有的訂購程序並付款後，只要您於當日11:30前訂購之訂單，會於1-2天過後送到您指定的地址(遇六日或國定假日之訂單，統一於第一個上班日處理隔日出貨，宅配需1-2個工作日)。請留意若商品需調貨時，時間可能增加數個工作天數，若遇商品缺貨或其他特殊情形時將另行通知。
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->


                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">

					    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">

						3. 我的運費如何計算?

					    </a>

					</h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        國內會員:<br>
                                        只要您購買超過800元，就不用付任何運送費用，若未滿800元，無論何種計送方式，皆會收取70元運費。<br>
                                       <br>
                                        海外會員:<br>
                                        會依您商品的重量計費，若超過30公斤，必需分批下訂單；本網站的海外郵資，是使用EMS國際快捷郵件資費標準，請會員安心使用。<br>
                                       <br>
                                        註：Taxes And Duties /關稅關稅費用由收件者簽收商品時支付，當商品跨越國界且價值到達一定金額時即需課稅(不過目前仍有某些自由貿易區不需課稅)。稅額的計算需視應報關貨件的估價而定。此制度由世界海關組織World Customs Organization所制定，並不斷更新。當商品遇到需課稅的情況，寄件進度可能會因報關行處理進度而延遲，請注意。
                                    </div>
                                </div>
                            </div>
                            <!-- /.panel -->

                        </div>
                        <!-- /.panel-group -->


                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php require_once('template/footer.php'); ?>




</body>

</html>
