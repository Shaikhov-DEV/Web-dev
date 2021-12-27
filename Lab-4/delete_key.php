<?php
include("checks.php");
require_once 'connect.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id_key = $_GET['id_key'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM kl WHERE id_key='$id_key'");
else
    echo "Недостаточно прав";
header("Location: keyAdm.php");

exit;
?>

