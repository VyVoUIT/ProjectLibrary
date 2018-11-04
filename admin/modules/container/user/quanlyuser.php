<button type='button' class='btn btn-success' data-toggle="modal" data-target="#myModalNorm">Thêm user</button>
<?php 
	$sql = "select * from admin where level = 0";
	$requie = mysqli_query($conn, $sql);
	if(!$requie)
		die("Loi cau truy van");
?>
<div class="row">
  <div class="col-sm-12">
    <div class="row">
	<span id="helpBlock" class="help-block"><h3>Trang quản lý user</h3></span>
	<span id="helpBlock" class="help-block"><i><?php if(isset($_GET['ss'])) echo ""?></i></span>
	<?php
		if(mysqli_num_rows($requie)==0){
			echo "Lỗi không có dữ liệu!";
		}else{
		while($data = mysqli_fetch_array($requie)){
	?>
	<a href = "index.php?act=suathongtinuser&id=<?php echo $data['id']?>">
	<div class="col-md-4">
        <div class="well">
			<h4 class="text-success"><?php echo $data['username']?></h4>
			<span id="helpBlock" class="help-block">Tên User : <?php echo $data['name'];?></span>
			<span id="helpBlock" class="help-block">Email : <?php echo $data['email'];?></span>
			<span id="helpBlock" class="help-block">Ngày ĐK : <?php echo $data['ngaydangky'];?></span>
			<div class="radio">
			  <label>
				<input type="radio" id="optionsRadios2" <?php if($data['status']==1) echo "checked";?>>
					Trạng thái
			  </label>
			</div>
			<div class="radio">Level
			  <label> <i><?php if($data['level']==1) echo "Admin"; else echo "User";;?></i>
			  </label>
			</div>
        </div>
      </div></a>
		<?php } 
		}?>
    </div><!--/row-->    
  </div><!--/col-12-->
</div><!--/row-->
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
                    Thêm user mới
                </h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
            <form method = "POST" action = "modules/php/suauser.php" id = "themusermoi">
			  <div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" class="form-control" id="username" placeholder="Username" name = "username">
				<div id = "loiuser"></div>
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				
				  <input type="email" class="form-control" id="email" placeholder="Email" name = "email">
			</div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Tên User</label>
				<input type="text" class="form-control" id="tenuser" placeholder="Tên user" name = "tenuser">
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Trạng thái</label>
				<select class="form-control" name = "trangthai" id = "trangthai">
				  <option value = "1">Hiện</option>
				  <option value = "0">ẨN</option>
				</select>
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Level</label>
				<select class="form-control" name = "level" id = "level">
				  <option value = "1">Admin</option>
				  <option value = "0">User</option>
				</select>
			  </div>
			  <span id="helpBlock" class="help-block"><i>Điền đầy đủ thông tin cần thiết rồi nhấn nút thêm để thêm</i></span>
			  <input type="submit" class="btn btn-default" name = "themuser" id = "themuser" value = "Thêm"/>
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