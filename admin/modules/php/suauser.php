<?php
	function genpassword($length=6) {
	   $password = '';
	   $possible = '23456789bcdfghjkmnpqrstvwxyz';
	   $i = 0;
	   while ($i < $length) {
	 
		  $password .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
		  $i++;
	   }
	   return $password;
	}
	include("connect.php");
	if(isset($_POST['suauser'])){
		mysqli_query($conn, "update admin set username = '$_POST[username]', tenuser = '$_POST[name]',
		email = '$_POST[email]', ngaydangky = NOW() where iduser = '$_POST[id]'") or die("Loi cau truy van");
		header("Location: ../../index.php?act=thongtinuser&id=".$_POST['id']);
	}
	else if(isset($_POST['suathongtinuser'])){
		$username = $_POST['username'];
		$tenuser = $_POST['name'];
		$email = $_POST['email'];
		$trangthai = $_POST['status'];
		$level = $_POST['level'];
		$id = $_POST['id'];
		mysqli_query($conn, "update admin set username = 'username', name = '$name',email = '$email', 
		ngaydangky = NOW(), status = '$trangthai', level = '$level' where id = '$id'") 
		or die("Loi cau truy van");
		header("Location: ../../index.php?act=quanlyuser");
	}
	else if(isset($_POST['themuser'])){
		$username = $_POST['username'];
		$tenuser = $_POST['name'];
		$email = $_POST['email'];
		$trangthai = $_POST['status'];
		$level = $_POST['level'];
		$password = genpassword(8);
		$sql = "insert into admin (username, password, name, email, ngaydangky, status, level) 
		value ('$username', '$password', '$tenuser', '$email', NOW(), '$trangthai', '$level')";
		mysqli_query($conn, $sql);
		
		header("Location: ../../index.php?act=quanlyuser");
	}
?>