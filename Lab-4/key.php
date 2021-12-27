<html>
<head> <title> Сведения о ключах </title> </head>
<body  align="center" background="/5WWU.gif">
<h2>Страница оператора</h2>
<h2>Шаихов Халил ПИ-323</h2>
<h2>Сведения о ключах:</h2>
<table align="center" border="1">
    <tr>
        <th>ID ключа</th>
        <th>Дата приобретения</th>
        <th> Дата окончания</th>
        <th> ОС</th>
        <th> Магазин</th>
        <th> Стоимость</th>
        <th> Ключ</th>
        <th> Редактировать</th>
    </tr>
    </tr>
<?php
 include("checks.php");
    require_once 'connect.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }
   $result=$mysqli->query("SELECT kl.id_key, kl.key_date, 
   kl.key_date_end, os.os_name as os, stores.stores_name as stores, 
   kl.key_cost, kl.key_name
FROM kl 
LEFT JOIN os ON kl.id_os=os.id_os
LEFT JOIN stores ON kl.id_stores=stores.id_stores"); // запрос на

 $counter=0;
  
             if ($result) {
        while ($row = $result->fetch_array()) {// для каждой строки из запроса
            $id = $row['id_key'];
            $date_buy = $row['key_date'];
            $date_ex = $row['key_date_end'];
            $os = $row['os'];
            $ds = $row['stores'];
            $price = $row['key_cost'];
            $key_os = $row['key_name'];

            $date_buy = date('d-m-Y', strtotime($date_buy));
            $date_ex = date('d-m-Y', strtotime($date_ex));

            echo "<tr>";
            echo "<td>$id</td><td>$date_buy</td><td>$date_ex</td><td>$os</td><td>$ds</td><td>$price</td><td>$key_os</td>";

            echo "<td><a href='edit_key.php?id_key=" . $row['id_key']
                . "'>Редактировать</a></td>"; //Запуск редактирования
            echo "<td><a href='delete_key.php?id_key=" . $row['id_key']
                . "'>Удалить</a></td>"; //запуск удаления
            echo "</tr>";
            $counter++;
        }
    }
            print "</table>";
            print("<p>Всего игр: $counter </p>");
        echo "<p><a href=new_key.php> Добавить ключ </a>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=os.php> Вернуться назад </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=osAdm.php> Вернуться назад </a>";
    include("checkSession.php");
?>
</body> </html>
