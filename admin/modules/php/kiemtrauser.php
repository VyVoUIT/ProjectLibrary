<?php
// Lấy thông tin username
$username = isset($_POST['username']) ? $_POST['username'] : false; 
// Kết nối database
$conn = mysqli_connect('localhost', 'root', '', 'project') or die ('{error:"bad_request"}');
// Khai báo biến lưu lỗi
$error = array(
    'error' => 'success',
    'username' => '',
);
// Kiểm tra tên đăng nhập
if ($username)
{
    $query = mysqli_query($conn, 'select count(*) as count from admin where username = \''.  addslashes($username).'\'');
    if ($query){
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ((int)$row['count'] > 0){
            $error['username'] = 'Tên đăng nhập đã tồn tại';
        }
    }
    else{
        die ('{error:"bad_request"}');
    }
}
// Trả kết quả về cho client
die (json_encode($error));
?>