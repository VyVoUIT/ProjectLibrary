<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Home</title>
    <!-- Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/datetimepicker.css" rel="stylesheet">
	<!-- jQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/datetimepicker.js"></script>
	<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="js/javascript.js"></script>
</head>
<body>
<?php
	session_start();
	if(isset($_SESSION['id'])){
		include("modules/php/connect.php");
		$requie = mysqli_query($conn, "select id from admin") or die("Loi cau truy van");
		$result = array();
		while($row = mysqli_fetch_array($requie)){
			array_push($result, $row['id']);
		}
		if(in_array($_SESSION['id'], $result)==true){
		$requie_user = mysqli_query($conn, "select * from admin where id = $_SESSION[id]") or die("Loi cau truy van");
		$data = mysqli_fetch_array($requie_user);
?>
<div id="wrapper">
	<div class = "welcome">Xin chào <a href = "index.php?act=thongtinuser&id=<?php echo $data['iduser'];?>" style = "color: red"><b><?php echo " | ".$data['username']." | ";?></b></a> 
	<a href = "modules/php/logout.php" style = "color: #fff"><u> Logout</u></a>
	</div>
	<?php include("modules/menu/menu.php");?>
    <div class="container">
        <?php 
			if(isset($_GET['act'])){
				
				//hiện thị trang thông tin user
				if($_GET['act']=="thongtinuser")
					include("modules/container/user/thongtinuser.php");
				//hiện thị trang quản lý user
				if($_GET['act']=="quanlyuser")
					include("modules/container/user/quanlyuser.php");
				//hiện thị trang sua user
				if($_GET['act']=="suathongtinuser")
					include("modules/container/user/suathongtinuser.php");
			}else{
				include("modules/container/home.php");
			}
		?>
		
	</div>
	<?php }else{
		include("404.html");
		}
	}else
		include("login.php");
	?>
</body></html>