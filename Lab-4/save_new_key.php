 <?php
    include ("checks.php");
require_once 'connect.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

    $key_date = $_GET['key_date'];
    $key_date_end = $_GET['key_date_end'];
    $id_os = $_GET['id_os'];
    $id_stores = $_GET['id_stores'];
    $key_cost = $_GET['key_cost'];
    $key_name = $_GET['key_name'];

    // Выполнение запроса
    $result = $mysqli->query("INSERT INTO kl
        SET key_date='$key_date', key_date_end='$key_date_end',
        id_os='$id_os', id_stores='$id_stores',
        key_cost='$key_cost', key_name ='$key_name'"
    );

if ($result) {
    print "<p>Внесение данных прошло успешно!";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=key.php> Вернуться к списку </a>";
    elseif ($_SESSION['type'] == 2)
        echo ".<p><a href=keyAdm.php> Вернуться к списку </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения . <p><a href=key.php> Вернуться к списку </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения . <p><a href=keyAdm.php> Вернуться к списку </a>";
}
mysqli_close($mysqli);
?>