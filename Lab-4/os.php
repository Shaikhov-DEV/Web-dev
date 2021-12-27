<?php require_once 'connect.php';
include("checks.php");?>
<html>
<head> <title> Сведения об операционных системах </title> </head>
<body  align="center" background="/5WWU.gif">
<h2>Страница оператора</h2>
<h2>Шаихов Халил ПИ-323</h2>
<h2>Сведения об операционных системах:</h2>
<table align="center" border="1">
<tr>
<th>ID</th>
<th>Название</th> 
<th>Тип</th>
<th>Разрядность</th> 
<th>Разработчик</th>
<th>Кол-во пользователь</th> 
<th>Отредактировать</th> 
<th>Удалить</th> 
</tr>
</tr>
<?php
$link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно подключиться к серверу (индекс)" . mysqli_error($link));
$result=mysqli_query($link, "SELECT id_os, os_name, os_type, os_bit, os_dev, os_users FROM os"); // запрос на выборку сведений о пользователях
mysqli_select_db($link, "os");
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['id_os'] . "</td>";
 echo "<td>" . $row['os_name'] . "</td>";
 echo "<td>" . $row['os_type'] . "</td>";
 echo "<td>" . $row['os_bit'] . "</td>";
 echo "<td>" . $row['os_dev'] . "</td>";
 echo "<td>" . $row['os_users'] . "</td>";
  echo "<td><a href='edit_os.php?id_os=" . $row['id_os']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete_os.php?id_os=" . $row['id_os']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего ОС: $num_rows </p>");
if ($_SESSION['type'] == 1) {
        echo "<p><a href=new_os.php> Добавить ОС</a>";
        echo "<p><a href=key.php>Ключи</a>";
        echo "<p><a href=stores.php>Магазины</a>";
        echo "<p><a href=edit_users.php?id_u=" . $_SESSION['id_u'] . "> Изменить данные Оператора</a>";
    } elseif ($_SESSION['type'] == 2) {
        echo "<p><a href=new_os.php> Добавить ОС</a>";
        echo "<p><a href=keyAdm.php>Ключи</a>";
        echo "<p><a href=storesAdm.php>Магазины</a>";
        echo "<p><a href=usersAdm.php>Изменить данные Пользователей</a>";
    }
    echo "<p><a href=gen_pdf.php>Скачать pdf-файл</a>";
    echo "<p><a href=gen_xls.php>Скачать xls-файл</a>";
    include("checkSession.php");
?>
</body> </html>
