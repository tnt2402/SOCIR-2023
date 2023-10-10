<?php

$title = "Quản Trị - ";
include_once('../header.php');

		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] == 0){ ?>
			<div class="alert alert-danger fade in" role="alert" style="max-width:400px;margin:0 auto">
		      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      <strong>ERROR!</strong> Bạn không đủ quyền để truy cập trang này, trở lại trang chủ sau 3s.
		      <script>
	    	window.setTimeout(function(){window.location.href="../index.php";}, 3000);
	    	</script>
		    </div>
		<?php }else {?>
	<!-- Navbar -->
	<div class="hidden-lg hidden-md hidden-md hidden-sm navbar navbar-default navbar-fixed-top " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">
            <?php
              if($_GET["menu"] == "bangdk"){
                echo "Bảng Điều Khiển";
              } elseif($_GET["menu"] == "them"){
                echo "Thêm Sinh Viên";
              } elseif($_GET["menu"] == "quanlysv"){
                echo "Quản Lý Sinh viên";
              } elseif($_GET["menu"] == "dothi"){
                echo "Đồ thị điểm";
              } elseif($_GET["menu"] == "baitap"){
                echo "Bài tập";
              }else{
                echo "Bảng Điều Khiển";
              }
              
             ?>
          </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="?menu=bangdk" id="bangdk">
            <span class="glyphicon glyphicon-dashboard"></span>
            Bảng Điều Khiển
            </a></li>
            <li><a href="?menu=them" id="themsv">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm Sinh Viên
            </a></li>
            <li><a href="?menu=dothi" id="dothi">
            <span class="glyphicon glyphicon-cog"></span>
            Đồ thị điểm
            </a></li>
            <li><a href="?menu=quanlysv" id="quanlysv">
            <span class="glyphicon glyphicon-wrench"></span>
            Quản Lý Sinh viên
            </a></li>
            <li><a href="?menu=baitap" id="baitap">
            <span class="glyphicon glyphicon glyphicon-book"></span>
            Bài tập
            </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php echo $_SESSION["tensv"]; ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="../">
                <span class="glyphicon glyphicon-user"></span>
                Trang Cá Nhân</a></li>
                <li><a href="../tai-khoan/dang-xuat.php">
                <span class="glyphicon glyphicon-log-out"></span>
                Đăng Xuất</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  
    <!-- End Navbar -->

    <div class="row" id="thongtinad">
    <div class="hidden-xs col-sm-1 col-md-1 col-lg-1">

    	<div class="menu">
    		<div class="list-group">
			  <a href="?menu=bangdk" id="bangdk" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-dashboard"></span> <br>
			  Điểm thi
			  </a>
			  <a href="?menu=them" id="themsv" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-plus"></span> <br>
			  Thêm Sinh Viên
			  </a>
			  <a href="?menu=dothi" id="dothi" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-cog"></span> <br>
			  Đồ thị điểm
			  </a>
        <a href="?menu=quanlysv" id="quanlysv" class="list-group-item" style="text-align:center">
        <span style="font-size:50px;" class="glyphicon glyphicon-wrench"></span> <br>
        Quản Lý Sinh Viên
        <a href="?menu=baitap" id="baitap" class="list-group-item" style="text-align:center">
        <span style="font-size:50px;" class="glyphicon glyphicon glyphicon-book"></span> <br>
        Bài tập
			  <a href="../tai-khoan/dang-xuat.php" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-log-out"></span> <br>
			  Đăng Xuất
			  </a>
			</div>
    	</div>
    </div>
    
    <div style="color:#FFF" class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
		<div class="list-group-item">
   
			<?php
				if($_GET["menu"] == "bangdk"){
					include_once('bangdk.php');
				} elseif($_GET["menu"] == "them"){
					include_once('them.php');
				} elseif($_GET["menu"] == "quanlysv"){
					include_once('quanlysv.php');
        } elseif($_GET["menu"] == "dothi"){
          include_once('dothi.php');
        } elseif($_GET["menu"] == "baitap"){
          include_once('baitap.php');
				}else{
					include_once('quanlysv.php');
				}
			 ?> 
		</div>
    </div>
    <!-- Thông tin Admin -->
    <?php } ?>
</div>
 <?php 
	include_once('../footer.php');
 ?>
