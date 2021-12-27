<html>
<head> <title> Добавление нового ключа </title> </head>
<body>
<H2>Добавление нового ключа:</H2>
<form action="save_new_key.php" method="get">
<?
include ("checks.php");
    require_once 'connect.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }
//id игры
   $result = $mysqli->query("SELECT id_os, os_name FROM os");
    echo "<br>OC: <select name='id_os'>"; 

    if ($result){
    while ($row = $result->fetch_array()){
    $id_os = $row['id_os'];
    $os_name = $row['os_name'];
    echo "<option value='$id_os'>$os_name</option>";
    }
    }
	 echo "</select>";
//id цифрового магазина
	 $result = $mysqli->query("SELECT id_stores, stores_name FROM stores");
     echo "<br>Магазин: <select name='id_stores'>";

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
  echo "<p><input name='add' type='submit' value='Добавить'></p>";
    echo "<p><input name='b2' type='reset' value='Очистить'></p>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=key.php> Вернуться к списку ключей </a></p>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=keyAdm.php> Вернуться к списку ключей </a></p>";
    ?>


</form>
</body>
</html>
