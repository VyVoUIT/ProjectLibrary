<?php

//register.php

include('connectdb.php');

$form_data = json_decode(file_get_contents("php://input"));

$message = '';
$validation_error = '';

if(empty($form_data->name))
{
 $error[] = 'Tên không được bỏ trống';
}
else
{
 $data[':name'] = $form_data->name;
}

if(empty($form_data->email))
{
 $error[] = 'Email không được bỏ trống';
}
else
{
 if(!filter_var($form_data->email, FILTER_VALIDATE_EMAIL))
 {
  $error[] = 'Email không hợp lệ';
 }
 else
 {
  $data[':email'] = $form_data->email;
 }
}

if(empty($form_data->password))
{
 $error[] = 'Mật khẩu không được bỏ trống';
}
else
{
 $data[':password'] = password_hash($form_data->password, PASSWORD_DEFAULT);
}

if(empty($error))
{
 $query = "
 INSERT INTO users (name, email, password) VALUES (:name, :email, :password)
 ";
 $statement = $connect->prepare($query);
 if($statement->execute($data))
 {
  $message = 'Đăng ký tài khoản thành công mời đăng nhập';
 }
}
else
{
 $validation_error = implode(", ", $error);
}

$output = array(
 'error'  => $validation_error,
 'message' => $message
);

echo json_encode($output);


?>