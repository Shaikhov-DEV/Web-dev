<html>
<head>
<title>  Редактирование данных о ключах </title>
</head>
<body>
<?php
include("checks.php");
require_once 'connect.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id_key1 = $_GET['id_key'];
$prod = mysqli_query($mysqli,"SELECT
			kl.id_key,
			kl.key_date,
			kl.key_date_end,
			kl.key_cost,
			kl.key_name,

			os.id_os as id_os,
			os.os_name as os_name,

			stores.id_stores as id_stores,
			stores.stores_name as stores_name

			FROM kl
			LEFT JOIN os ON kl.id_os=os.id_os
			LEFT JOIN stores ON kl.id_stores=stores.id_stores
			WHERE kl.id_key='$id_key1'"
		);

		if ($prod){
			$prod = $prod->fetch_array();

			$id_key = $prod['id_key'];
			$key_date = $prod['key_date'];
			$key_date_end = $prod['key_date_end'];
			$key_cost = $prod['key_cost'];
			$key_name = $prod['key_name'];
			
			$id_stores = $prod['id_stores'];
			$stores_name = $prod['stores_name'];

			$id_os = $prod['id_os'];
			$os_name = $prod['os_name'];
			
		}


 
print "<form action='save_edit_key.php' method='get'>";

//работа с играми
$result = $mysqli->query("SELECT id_os, os_name FROM os WHERE id_os <> '$id_os' ");
echo "<br>Игра:<select name='id_os'>";
echo "<option selected value='$id_os'>$os_name</option>";
   if ($result){
    while ($row = $result->fetch_array()){
    $id_os = $row['id_os'];
    $os_name = $row['os_name'];
    echo "<option value='$id_os'>$os_name</option>";
  
    }
    }
	 echo "</select>";

//работа с магазинами

	 $result = $mysqli->query("SELECT id_stores, stores_name FROM stores WHERE id_stores <> '$id_stores' ");
     echo "<br>Магазин: <select name='id_stores'>";
      echo "<option selected value='$id_stores'>$stores_name</option>";

     if ($result){
     while ($row = $result->fetch_array()){
      $id_stores = $row['id_stores'];
      $stores_name = $row['stores_name'];
      echo "<option value='$id_stores'>$stores_name</option>";
      }
      }
       echo "</select>";
	   

print "<br> дата приобретения: <input name='key_date' placeholder='dd-mm-yyyy' type='date' value=$key_date>";
print "<br> дата окончания: <input name='key_date_end' placeholder='dd-mm-yyyy' type='date' value=$key_date_end>";
print "<br> стоимость: <input name='key_cost' size='11' type='int' value=$key_cost>";
print "<br> ключ: <input name='key_name' size='11' type='int'value=$key_name>";
print "<input type='hidden' name='id_key' size='11' value=$id_key1>";
print "<input  name='save' type='submit' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=key.php> Вернуться назад </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=keyAdm.php> Вернуться назад </a>";
?>
</body>
</html>