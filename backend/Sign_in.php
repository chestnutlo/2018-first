<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="css/log.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/log.js"></script>
<script src="https://code.jquery.com/jquery-2.1.0.min.js" ></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">


    <title>會員登入</title>
</head>
<body>
<body>
<form method="post" action='check.php'>
<div id="formWrapper">
<div id="form">
<div class="logo">
<h1 class="text-center head"><i class="fa fa-user p-2"></i>Log in</h1>
</div>
		<div class="form-item">
			<p class="formLabel">Account</p>
			<input type="text" name="account"  class="form-style" autocomplete="off"/>
		</div>
		<div class="form-item">
			<p class="formLabel">Password</p>
			<input type="password" name="number"  class="form-style" required="required" />
			<!-- <div class="pw-view"><i class="fa fa-eye"></i></div> -->
			</div>
			<?php if(isset($_GET['Error']) && $_GET['Error']  !=null ){  ?>
				<div >錯誤訊息</div>
			<?php } ?>	
			<?php if(isset($_GET['msg']) && $_GET['msg'] != null){ ?>
					<div class="wrap-input100 text-center" style="color:#333;">
					<?php echo $_GET['msg']; ?>
					</div>
					<?php } ?>
<div class="form-item">
		<input type="submit" class="login pull-right" value="Log In">
		<div class="clear-fix">
		</div>
		</div>
</div>
</div>
</form>
</body>
</html>
    
</body>
</html>