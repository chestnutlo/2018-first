<?php 
require_once('../../function/login_check.php');
require_once('../../connection/connection.php');
$query = $db->query('SELECT * FROM product_categories ');
$data = $query->fetchAll(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css">
  </head>

<body>
<?php require_once('../../surface/surface_nav.php');  ?>
<div class="py-5" style= "background-image: url(../../images/5.jpeg); opacity:0.8"  >
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-3">產品種類</h1>
          <p class="lead">Why so serious ?</p>
        </div>
        </div>
        </div>
        </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12"> </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb" style="margin-bottom: 0px; margin-top: 0px;">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">產品管理</li>
          </ul>
   
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
              
                <th style="text-align:center">產品種類</th>
                <th width=25% style="text-align:center">設定</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($data as $product_categories){ ?>
              <tr>
             
                <td style="text-align:center"><?php echo $product_categories['category']; ?></td>
                <td>
                <a href="../products/list.php?product_categories_id=<?php echo $product_categories['product_categories_id']; ?> "class="btn btn-outline-secondary">產品管理</a>
                  <a href=edit.php?product_categories_id=<?php echo $product_categories['product_categories_id']; ?> class="btn btn-outline-info">編輯</a>
                  <a class="btn btn-outline-danger" href="delete.php?product_categories_id=<?php echo $product_categories['product_categories_id']; ?>"  onclick="if(!confirm('掰掰!!')){return false;};">刪除</a>
                </td>
              </tr>  
          <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
     
    </div>
  </div>
  <div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <p class="lead"></p>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.facebook.com" target="_blank">
            <i class="fa fa-fw fa-facebook fa-3x text-white"></i>
          </a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://twitter.com" target="_blank">
            <i class="fa fa-fw fa-twitter fa-3x text-white"></i>
          </a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.instagram.com" target="_blank">
            <i class="fa fa-fw fa-instagram text-white fa-3x"></i>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 
</body>

</html>