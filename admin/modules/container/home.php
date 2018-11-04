
<div class="row">
  <div class="col-sm-12">
    <div class="row">
	<
      <a href = "index.php?act=quanlysanpham&id=<?php echo $data_loaisanpham['idloaisanpham'];?>&page=1"><div class="col-md-4">
        <div class="well">
          <h4 class="text-danger"><span class="label label-danger pull-right"><?php echo $data_loaisanpham['tenloaisanpham'];?></span> Sản phẩm </h4>
        </div>
      </div></a>
	
	
	<a href = "index.php?act=quanlyphukien&id=<?php echo $data_loaiphukien['idloaiphukien'];?>"><div class="col-md-3">
        <div class="well">
          <h4 class="text-primary"><span class="label label-primary pull-right"><?php echo $data_loaiphukien['tenloaiphukien']?></span> Phụ kiện </h4>
        </div>
      </div></a>
	
	<span id="helpBlock" class="help-block"><i>Các chức năng quản lý chung, quản lý các thành phần hệ thống(hình ảnh, khuyến mãi, ...)</i></span>
	<a href="index.php?act=quanlyhinhanh"><div class="col-md-6">
        <div class="well">
          <h4 class="text-success"><span class="label label-success pull-right">Hình ảnh</span> Quản lý </h4>
        </div>
      </div></a>
	<a href="index.php?act=quanlykhuyenmai"><div class="col-md-6">
        <div class="well">
          <h4 class="text-success"><span class="label label-success pull-right">Khuyến mãi</span> Quản lý </h4>
        </div>
      </div></a>
	  <a href="index.php?act=quanlychuongtrinhkhuyenmai"><div class="col-md-6">
        <div class="well">
          <h4 class="text-success"><span class="label label-success pull-right">Chương trình khuyến mãi</span> Quản lý </h4>
        </div>
      </div></a>
	  <a href="index.php?act=quanlyhoadon"><div class="col-md-6">
        <div class="well">
          <h4 class="text-success"><span class="label label-success pull-right">Hóa đơn</span> Quản lý </h4>
        </div>
      </div></a>
	  <div class="col-md-6">
        <a href = "index.php?act=quanlytintuc&page=1"><div class="well">
          <h4 class="text-success"><span class="label label-success pull-right">Tin tức</span> Quản lý </h4>
        </div></a>
      </div>
	  <?php 
		$sql = mysqli_query($conn, "select * from admin where id = $_SESSION[id]") or die("Loi cau truy van");
		$data_user = mysqli_fetch_array($sql);
		if($data_user['level']==1){
	  ?>
	  <a href="index.php?act=quanlyuser"><div class="col-md-6">
        <div class="well">
          <h4 class="text-success"><span class="label label-success pull-right">User</span> Quản lý </h4>
        </div>
      </div></a>
		<?php }?>
    </div><!--/row-->    
  </div><!--/col-12-->
</div><!--/row-->

