

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">
      <a  href="../login.php"><i class="fa d-inline fa-lg fa-battery-full p-1"></i></a>
      <b>Sea_Food</b>
    </a>
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent" style=  >
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" >
              <i class="fa fa-home p-1"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../news/list.php">
              <i class="fa fa-paperclip p-1"></i>消息最新</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../members/list.php">
            <i class="fa fa-id-card-o p-1" aria-hidden="true"></i>會員管理</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../page/list.php">
            <i class="fa fa-window-maximize p-1" aria-hidden="true"></i>頁面管理</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="../product_categories/list.php">
            <i class="fa fa-folder-o p-1" aria-hidden="true"></i>產品管理</a>
          </li>
        
          <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-alt p-1" aria-hidden="true"></i>訂單管理</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="../customer_orders/list.php?status=0">未出貨</a>
              <a class="dropdown-item" href="../customer_orders/list.php?status=1">已付款</a>
              <a class="dropdown-item" href="../customer_orders/list.php?status=2">已出貨</a>
              <a class="dropdown-item" href="../customer_orders/list.php?status=99">取消</a>
            </div>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="http://localhost/Sea_food/backend/customer_orders/list.php">
            <i class="fa fa-money p-1" aria-hidden="true"></i>Customer_orders</a>
          </li> -->
          <li class="nav-item p-1 "> <a href="../logout.php" class="btn btn-primary">登出</a></li>
        </ul>
   
      </div>

    </div>
  </nav>
