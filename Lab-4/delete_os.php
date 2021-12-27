<?php
include("checks.php");
require_once 'connect.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id_os = $_GET['id_os'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM os WHERE id_os ='$id_os'");

header("Location: osAdm.php");
exit;
?>
