<?php
	$requie = mysqli_query($conn, "select * from admin where id = $_GET[id]");
	$data = mysqli_fetch_array($requie);
?>
<form action = "modules/php/suauser.php" method = "POST" id = "suathongtinuser"> 
 <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="username" value = "<?php echo $data['username']?>" name = "username">
	<div id = "loiuser"></div>
    <input type="hidden" value = "<?php echo $data['id']?>" name = "id">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Tên User</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value = "<?php echo $data['name']?>" name = "name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="text" class="form-control" id="exampleInputPassword1" value = "<?php echo $data['email']?>" name = "email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Ngày đăng ký : <i><?php echo $data['ngaydangky']?></i></label>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Level</label><i>
		<?php if($data['level']==1) 
				echo "Admin";
			else
				echo "User";
		?></i>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Trạng thái : </label><i>
		<?php if($data['status']==1) 
				echo "Hiện";
			else
				echo "Ẩn";
		?></i>
  </div>
  <button type="submit" class="btn btn-default" name = "suauser" id = "suauser">Sửa</button>
  <div class="btn btn-default" data-toggle="modal" data-target="#myModalNorm">Đối mật khẩu</div>
 </form>
  <?php
	if(isset($_POST['doipass'])){
		if($_POST['txtCaptcha'] == NULL)
			echo "Chưa nhập mã xác nhận";
		else{
			if($_POST['txtCaptcha'] != $_SESSION['security_code'])
				echo "Mã xác nhận sai";
			else{//đã nhập đúng, kiểm tra mật khẩu
				$sql = mysqli_query($conn, "select password from admin where id = $_SESSION[id]") or die("Loi truy van");
				$data_password = mysqli_fetch_array($sql);
				if($data_password['password']!=$_POST['passwordcu'])
					echo "Sai password!";
				else{
					$passwordmoi = $_POST['passwordmoi'];
					$id = $_SESSION['id'];
					mysqli_query($conn, "update admin set password = '$passwordmoi' where id = '$id'") or die("Loi cau truy van");
					echo "Success! Vui lòng Logout ra khỏi hệ thống và đăng nhập lại";
				}
			}
		}
	}
			?>
 <!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Đổi Mật Khẩu!
                </h4>
            </div>
            <!-- Modal Body -->
			<span id="helpBlock" class="help-block"><i>Xác nhận thông tin tài khoản của bạn</i></span>
            <div class="modal-body">
            <form method = "POST" action = "#" id = "form_doimatkhau">
			  <div class="form-group">
				<label for="exampleInputEmail1">Password cũ</label>
				<input type="password" class="form-control" id="passwordcu" placeholder="Password" name = "passwordcu">
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Password mới</label>
				<input type="password" class="form-control" id="passwordmoi" placeholder="Password" name = "passwordmoi">
				<div id="loipassmoi"></div>
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Xác nhận</label>
					<img src="modules/container/user/capcha.php" />
				  <input type="text" class="form-control" id="exampleInputName2" placeholder="Xác nhận" name = "txtCaptcha">
				</div>
			  <span id="helpBlock" class="help-block"><i>Điền đầy đủ thông tin cần thiết rồi nhấn nút thêm để thêm</i></span>
			  <input type="submit" class="btn btn-default" name = "doipass" id = "doipass" value = "Đổi"/>
			</form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
            </div>
        </div>
    </div>
</div>
<!----/Modal----->