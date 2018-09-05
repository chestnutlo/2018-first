<?php 
require_once('../../function/login_check.php');
require_once('../../connection/connection.php');

if(isset($_POST['edit']) && $_POST['edit'] == "UPDATE"){
    $updated_at = date('Y-m-d H:i:s');
    $sql= "UPDATE members SET name=:name, birthday=:birthday, gender=:gender, zipcode=:zipcode, county=:county, district=:district, phone=:phone, mobile=:mobile, email=:email, address=:address, updated_at=:updated_at WHERE members_id=:members_id";
    $sth = $db ->prepare($sql);
    $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
    $sth ->bindParam(":birthday", $_POST['birthday'], PDO::PARAM_STR);
    $sth ->bindParam(":gender", $_POST['gender'], PDO::PARAM_STR);
    $sth ->bindParam(":zipcode", $_POST['zipcode'], PDO::PARAM_STR);
    $sth ->bindParam(":county", $_POST['county'], PDO::PARAM_STR);
    $sth ->bindParam(":district", $_POST['district'], PDO::PARAM_STR);
    $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
    $sth ->bindParam(":mobile", $_POST['mobile'], PDO::PARAM_STR);
    $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
    $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
    $sth ->bindParam(":updated_at", $updated_at, PDO::PARAM_STR);
    $sth ->bindParam(":members_id", $_POST['members_id'], PDO::PARAM_INT);
    $result = $sth ->execute();

    header('Location:list.php');
}else{
$query = $db->query("SELECT * FROM members WHERE members_id=".$_GET['members_id']);
$member = $query->fetch(PDO::FETCH_ASSOC);
}

 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../../js/jquery-ui-1.12.1/jquery-ui.css">
  <link rel="stylesheet" href="../css/theme.css" type="text/css">

  
  </head>

<body>
<?php require_once('../../surface/surface_nav.php');  ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="">會員管理</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb" style="margin-bottom:0px;margin-top:0px">
            <li class="breadcrumb-item">
              <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item active">members</li>
            <li class="breadcrumb-item active">新增</li>
            <li> </li>  
          </ul>

          <form  action='edit.php' method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label >帳號</label>
      <input type="text" class="form-control" name="account" value="<?php echo $member['account'];  ?>">
    </div>
     <div class="form-group col-md-6">
      <label >密碼</label>
      <input type="text" class="form-control" name="password" value="<?php echo $member['password'];  ?>">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-2">
      <label>姓名</label>
      <input type="text" class="form-control" name="name" value="<?php echo $member['name'];  ?>">
    </div> 
    
    <div class="form-group col-md-2">
     <label>性別</label>
      <div style= 'text-align:center'>
      <input type="radio"  name="gender" value="0" <?php if($member['gender'] == 0) echo "checked" ?>><td>woman</td>
      <input type="radio"  name="gender" value="1" <?php if($member['gender'] == 1) echo "checked" ?>><td>man</td>
    </div></div>
      <div class="form-group col-md-2">
      <label>生日</label>
      <input type="text" class="form-control" placeholder="1990/01/01" name="birthday" id="datepicker" value="<?php echo $member['birthday'];  ?>">
      </div>
      <div class="form-group col-md-3">
      <label>市話</label>
      <input type="text" class="form-control" name="phone" value="<?php echo $member['phone'];  ?>">
      </div>
      <div class="form-group col-md-3">
      <label >行動</label>
      <input type="text" class="form-control" name="mobile" value="<?php echo $member['mobile'];  ?>">
      </div>
  </div>
  <div class="form-group">
    <label >E-mail</label>
    <input type="text" class="form-control" placeholder='@yahoo.com.tw' name="email" value="<?php echo $member['email'];  ?>" >
  </div>
  <diV id="twzipcode">
  <div class="form-row">
  <div class="form-group col-md-2">
      <label>區碼</label>
      <input type="text" class="form-control" name="zipcode" value=" <?php echo $member['zipcode'];  ?>">
      </div>
        <div class="form-group col-md-2">
    <label >縣市</label>
     <select class="form-control" id="county" name="county" value=" <?php echo $member['county'];  ?>"></select>
  </div>
    <div class="form-group col-md-2">
    <label >地區</label>
    <select class="form-control" id="district" name="district" value=" <?php echo $member['district'];  ?>"></select>
  </div>
  <div class="form-group col-md-6">
    <label >地址</label>
    <input type="text" class="form-control" name="address" value="<?php echo $member['address'];  ?>">
  </div>
  </div></diV>
  <div class="form-row">
  <div class="form-group col-md-2">
     <label>VIP</label>
      <div style= 'text-align:center'>
      <input type="radio"  name="vip" value="0"  <?php if($member['vip'] == 0) echo "checked" ?>> <td>平民</td>
      <input type="radio"  name="vip" value="1"  <?php if($member['vip'] == 1) echo "checked" ?>> <td>老闆</td>
      <input type="radio"  name="vip" value="2"  <?php if($member['vip'] == 2) echo "checked" ?>> <td>王董</td>
    </div>
    </div>
    <div class="form-group col-md-2">
      <label >購物金</label>
      <input type="text" class="form-control" name="money" value="<?php echo $member['money'];  ?>">
    </div> 
  </div>    
  <div style='text-align:right'>
  <input type="reset" class="btn btn-primary" value="清空">
    <button type="submit" class="btn btn-primary" onclick="if(!confirm('確認編輯')){return false;};">輸入</button> 
    <input type="hidden" name="edit" value="UPDATE" >  
    <input type="hidden" name='members_id' value="<?php echo $member['members_id'];  ?>">
</form>
</div>
</div>
</div>
</div>
</div>
</div>



<div class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <p class="lead">Do you best !</p>
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
  <script src="../../js/jquery-ui-1.12.1/external/jquery/jquery.js"></script>
  <script src="../../js/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="../../js/jquery.twzipcode.js"></script>                    

<script>
  $(function() {
            $zipcode = $('input[name="zipcode"]').text();
            $county = $('select[name="county"]').value();
            $district = $('select[name="district"]').value();
             if($zipcode == null) $zipcode = $member['zipcode'];
            if($county == null) $county = $member['county'];
            if($district == null) $district = $member['district'];

     $('#twzipcode').twzipcode();

      $('#twzipcode').find('select[name="county"]').eq(1).remove();
      $('#twzipcode').find('select[name="district"]').eq(1).remove();
     $('#twzipcode').find('input[name="zipcode"]').eq(1).remove();

    $("#datepicker").datepicker({
  dateFormat: "yy-mm-dd"  });
 

    

  });
</script>

</body>

</html>