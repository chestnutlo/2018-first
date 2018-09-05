<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <script src="https:////cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js" ></script>
    <script src="https:////cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
  
    <script src="../js/sign_in.js"></script>
    <script src="../js/log.js"></script>
    <link href="css/log.css" rel="stylesheet" id="bootstrap-css">
  <link href="css/login.css" rel="stylesheet" id="bootstrap-css">
    <title>Document</title>
</head>
<body>

    <div id="login-button" class="aaa">
        <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
       
      </div>
      <div id="container" class="aaa">
     
      
        <form method="post" action='check.php'>
		<div id="formWrapper">
		<div id="form">
		<div class="logo"><h1 >Log in</h1> </div>
		
		
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
							<?php echo $_GET['msg']; ?></div>
							
							<?php } ?>
				<div class="form-item">
				<input type="submit" class="login pull-right" value="Log In"></div>

				
		</div>
		</div>
		</form>
      </div>

</body>
</html>