<?php
//$ketnoi['host'] = 'localhost';
//$ketnoi['dbname'] = 'sign_up';
//$ketnoi['username'] = 'vohai';
//$ketnoi['password'] = '12345678';
//@mysql_connect(
//    "{$ketnoi['host']}",
//    "{$ketnoi['username']}",
//    "{$ketnoi['password']}")
//or
//die("Không thể kết nối database");
//@mysql_select_db(
//    "{$ketnoi['dbname']}")
//or
//die("Không thể chọn database");

$server_username = "vohai";
$server_password = "12345678";
$server_host = "localhost";
$database = 'sign_up';

$conn = mysqli_connect($server_host, $server_username, $server_password, $database);
mysqli_select_db($conn, 'sign_up');