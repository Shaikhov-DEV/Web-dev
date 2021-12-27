<html>
<head>
<title>  Редактирование данных о магазине </title>
</head>
<body>
<?php
include("checks.php");
require_once 'connect.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id_stores = $_GET['id_stores'];

$result = $mysqli->query("SELECT stores_name, stores_url FROM stores WHERE id_stores='$id_stores'");
if ($result){
 while ($gm = $result->fetch_array()) {
 $stores_name = $gm['stores_name'];
 $stores_url = $gm['stores_url'];
 }}

print "<form action='save_edit_store.php' method='get'>";
print "Название: <input name='stores_name' size='30' type='varchar'
value='$stores_name'>";
print "<br>url: <input name='stores_url' size='30' type='varchar'
value='$stores_url'>";
print "<input type='hidden' name='id_stores' size='11' type='int'
value='$id_stores'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=stores.php> Вернуться назад </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=storesAdm.php> Вернуться назад </a>";
?>
</body>
</html>