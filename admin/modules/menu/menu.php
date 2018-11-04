
    <!-- Modified navbar: Animating from right to left (off canvas) -->
    <nav id="navbar2" class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
		<div id="ios-arrow-left" onclick="goBack()">Back</div>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <ol class = "breadcrumb">
		  <?php
			if(isset($_GET['act'])){
				echo "<li><a href = 'index.php'>Home</a></li>";
				if($_GET['act']=="quanlysanpham")		
					echo "<li class = 'active'>Quản lý sản phẩm</li>";
				else if($_GET['act']=="suasanpham")
					echo "<li class = 'active'>Sửa sản phẩm</li>";
				else if($_GET['act']=="themsanpham")
					echo "<li class = 'active'>Thêm sản phẩm</li>";
				else if($_GET['act']=="doiavatarsanpham")
					echo "<li class = 'active'>Đổi avatar</li>";
				else if($_GET['act']=="chucnangsanpham")
					echo "<li class = 'active'>Chức năng sản phẩm</li>";
				else if($_GET['act']=="hoadonsanpham")
					echo "<li class = 'active'>Hóa đơn sản phẩm</li>";
				else if($_GET['act']=="hinhanhsanpham")
					echo "<li class = 'active'>Quản lý hình ảnh sản phẩm</li>";
				else if($_GET['act']=="themsanphammoi")
					echo "<li class = 'active'>Thêm hình ảnh mới</li>";
				else if($_GET['act']=="cauhinhsanpham")
					echo "<li class = 'active'> Quản lý cấu hình</li>";
				else if($_GET['act']=="phukiensanpham")
					echo "<li class = 'active'>Quản lý phụ kiện sản phẩm</li>";
				else if($_GET['act']=="mausacsanpham")
					echo "<li class = 'active'>Quản lý màu sắc sản phẩm</li>";
				else if($_GET['act']=="themmausacmoi")
					echo "<li class = 'active'>Thêm màu sắc mới</li>";
				else if($_GET['act']=="khuyenmaisanpham")
					echo "<li class = 'active'>Quản lý khuyến mãi sản phẩm</li>";
				else if($_GET['act']=="chuongtrinhkhuyenmaisanpham")
					echo "<li class = 'active'>Quản lý chương trình khuyến mãi sản phẩm</li>";
				else if($_GET['act']=="suachuongtrinhkhuyenmai")
					echo "<li class = 'active'>Sửa chương trình khuyến mãi</li>";
				else if($_GET['act']=="quanlyphukien")
					echo "<li class = 'active'>Quản lý phụ kiện</li>";
				else if($_GET['act']=="quanlyhinhanh")
					echo "<li class = 'active'>Quản lý hình ảnh</li>";
				else if($_GET['act']=="suahinhanh")
					echo "<li class = 'active'>Sửa hình ảnh</li>";
				else if($_GET['act']=="quanlykhuyenmai")
					echo "<li class = 'active'>Quản lý khuyến mãi</li>";
				else if($_GET['act']=="quanlychuongtrinhkhuyenmai")
					echo "<li class = 'active'>Quản lý chương trình khuyến mãi</li>";
				else if($_GET['act']=="quanlyhoadon")
					echo "<li class = 'active'>Quản lý hóa đơn</li>";
				else if($_GET['act']=="chitiethoadon")
					echo "<li class = 'active'>Chi tiết hóa đơn</li>";
			}
			else{
				echo "Home";
			}
		  ?>
		 </ol>
        </div>
			
        <!-- Collect the nav links, forms, and other content for toggling -->
		
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		<form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
          </form>
          <ul class="nav navbar-nav">
            <li <?php if(!isset($_GET['act'])) echo "id='active'"?>><a href="index.php">Home</a></li>
            <li <?php if(isset($_GET['act'])) if($_GET['act']=="quanlysanpham") echo "id='active'"?>>
			<a href="index.php?act=quanlysanpham" class="dropdown-toggle" data-toggle="dropdown">Quản lý sản phẩm<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
				<?php
				while($data_loaisanpham = mysqli_fetch_array($requie_loaisanpham)){
				?>
                <li class="divider"></li>
                <li><a href="index.php?act=quanlysanpham&id=<?php echo $data_loaisanpham['idloaisanpham'];?>&page=1"><?php echo $data_loaisanpham['tenloaisanpham'];?></a></li>
				<?php }?>
                <li class="divider"></li>
              </ul>
			</li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
			<li <?php if(isset($_GET['act'])) if($_GET['act']=="quanlyphukien") echo "id='active'"?>>
			<a href="index.php?act=quanlyhinhanh" class="dropdown-toggle" data-toggle="dropdown">Quản lý phụ kiện<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<?php
				while($data_loaiphukien = mysqli_fetch_array($requie_loaiphukien)){
				?>
                <li class="divider"></li>
                <li><a href="index.php?act=quanlyphukien&id=<?php echo $data_loaiphukien['idloaiphukien'];?>"><?php echo $data_loaiphukien['tenloaiphukien'];?></a></li>
				<?php }?>
                <li class="divider"></li>
              </ul>
			</li>
            <li <?php if(isset($_GET['act'])) if($_GET['act']=="quanlyhinhanh") echo "id='active'"?>><a href="index.php?act=quanlyhinhanh">Quản lý hình ảnh</a></li>
            <li <?php if(isset($_GET['act'])) if($_GET['act']=="quanlykhuyenmai") echo "id='active'"?>><a href="index.php?act=quanlyhinhanh">Quản lý khuyến mãi</a></li>
            <li <?php if(isset($_GET['act'])) if($_GET['act']=="quanlychuongtrinhkhuyenmai") echo "id='active'"?>><a href="index.php?act=quanlyhinhanh">Quản lý chương trình khuyến mãi</a></li>
            <li <?php if(isset($_GET['act'])) if($_GET['act']=="quanlyhoadon") echo "id='active'"?>><a href="index.php?act=quanlyhinhanh">Quản lý hóa đơn</a></li>
            <li <?php if(isset($_GET['act'])) if($_GET['act']=="thongke") echo "id='active'"?>><a href="index.php?act=quanlyhinhanh">Thông kê</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>