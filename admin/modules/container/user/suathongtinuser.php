<?php
	$sql = mysqli_query($conn, "select * from admin where id = $_GET[id]") or die("Loi cau truy van");
	$data = mysqli_fetch_array($sql);
?>
<form action = "modules/php/suauser.php" method = "POST"> 
 <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value = "<?php echo $data['username']?>" name = "username">
    <input type="hidden" value = "<?php echo $data['iduser']?>" name = "iduser">
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
    <label for="exampleInputEmail1">Trạng thái</label>
    <select name = "trangthai"  class="form-control">
		<option value = "1" <?php if($data['status']==1) echo "selected"?>>Hiện</option>
		<option value = "0" <?php if($data['status']!=1) echo "selected"?>>Ẩn</option>
	</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Level</label>
    <select name = "level"  class="form-control">
		<option value = "1" <?php if($data['level']==1) echo "selected"?>>Admin</option>
		<option value = "0" <?php if($data['level']!=1) echo "selected"?>>User</option>
	</select>
  </div>
  <button type="submit" class="btn btn-default" name = "suathongtinuser">Sửa</button>
  <div class="btn btn-default" data-toggle="modal" data-target="#myModalNorm">Xem mật khẩu</div>
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
				if($data_password['password']!=$_POST['password'])
					echo "Sai password!";
				else
					echo "Mật khẩu của tài khoản ".$data['username']." là : <b>".$data['password']."</b>";
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
                    Xem mật khẩu
                </h4>
            </div>
            <!-- Modal Body -->
			<span id="helpBlock" class="help-block"><i>Xác nhận thông tin tài khoản admin của bạn</i></span>
            <div class="modal-body">
            <form method = "POST" action = "#">
			  <div class="form-group">
				<label for="exampleInputEmail1">Password</label>
				<input type="password" class="form-control" id="exampleInputName2" placeholder="Password" name = "password">
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Xác nhận</label>
					<img src="modules/container/user/capcha.php" />
				  <input type="text" class="form-control" id="exampleInputName2" placeholder="Xác nhận" name = "txtCaptcha">
				</div>
			  <span id="helpBlock" class="help-block"><i>Điền đầy đủ thông tin cần thiết rồi nhấn nút thêm để thêm</i></span>
			  <input type="submit" class="btn btn-default" name = "doipass" value = "Xem"/>
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