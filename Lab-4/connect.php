<?php
$host = 'localhost';
$database = 'a0613888_operating_system';
$user = 'a0613888_admin';
$password = 'admin';
$link = mysqli_connect($host, $user, $password, $database) or die("ошибка в конекте" . mysqli_error($link));
?>
