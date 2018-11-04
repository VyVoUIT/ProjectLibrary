<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login Form Template</title>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/login.css">
    </head>

    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Đăng nhập vào hệ thống</h3>
                            		<p>Đây là hệ thống quản trị, chỉ có  admin mới có quyền truy cập!</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
								<!-----PHP------->
                            <div class="form-bottom">
			                    <form id="form-login" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" requie>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" requie>
			                        </div>
			                        <button type="submit" name = "login" class="btn">Đăng nhập</button>
			                    </form>
								<?php
									include("modules/php/connect.php");
									if(isset($_POST['login'])){
										$username = $_POST['username'];
										$password = $_POST['password'];
										$requie = mysqli_query($conn, "select * from admin where username = '$username'") or die("Loi cau truy van!");
										$member = mysqli_fetch_array($requie);
										if(mysqli_num_rows($requie)<=0)
											echo "Username không tồn tại!";
										else if($password != $member['password'])
											echo "Password không đúng!";
										// Khởi động phiên làm việc (session)
										else if($_SESSION['id'] = $member['id'])
											header("Location: index.php");
									}
								?>
		                    </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Javascript -->
        <script src="js/jquery.js"></script>
		<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
        <script type = "text/javascript">
		$(document).ready(function() {
			 $("#form-login").validate({
				rules: {
					username: "required",
					password: "required",
				},
				messages: {
					username: "Username không được bỏ trống",
					password: "Password không được bỏ trống",
				}		
			 });
		});
		</script>
    </body>

</html>