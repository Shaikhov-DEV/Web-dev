<html>
<head>
<title>  Редактирование данных об OC </title>
</head>
<body>
<?php
include("checks.php");
require_once 'connect.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}
$id_os = $_GET['id_os'];

$result = $mysqli->query("SELECT os_name, os_type, os_bit, os_dev, os_users FROM os WHERE id_os='$id_os'");
if ($result){
 while ($gm = $result->fetch_array()) {
 $os_name = $gm['os_name'];
 $os_type = $gm['os_type'];
 $os_bit = $gm['os_bit'];
 $os_dev = $gm['os_dev'];
 $os_users = $gm['os_users'];
 }}
 
print "<form action='save_edit_os.php' method='get'>";
print "Название: <input name='os_name' size='30' type='varchar'
value='$os_name'>";
print "<br>Тип: <input name='os_type' size='30' type='varchar'
value='$os_type'>";
print "<br>Разрядность: <input name='os_bit' size='30' type='int'
value='$os_bit'>";
print "<br>Разработчик: <input name='os_dev' size='30' type='varchar'
value='$os_dev'>";
print "<br>Кол-во пользователь: <input name='os_users' size='11' type='int'
value='$os_users'>";
print "<input type='hidden' name='id_os' size='11' type='int'
value='$id_os'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
print "<p><a href='index.php'> Вернуться к списку OC </a>";
?>
</body>
</html>