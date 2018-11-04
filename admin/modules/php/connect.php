<?php
	// Kết nối database
$conn = mysqli_connect('localhost', 'root', '', 'project') or die ('Không thể kết nối đến CSDL');
mysqli_set_charset($conn, 'utf8');
?>