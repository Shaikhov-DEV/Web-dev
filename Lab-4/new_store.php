<html>
<head> <title> Добавление нового магазина </title> </head>
<body>
<H2>Добавление нового магазина:</H2>
<form action="save_new_store.php" method="get">
 Название: <input name="stores_name" size="30" type="varchar">
<br>url: <input name="stores_url" size="30" type="varchar">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<?php
include("checks.php"); 
if ($_SESSION['type'] == 1)
    echo "<p><a href=stores.php> Вернуться к списку магазинов </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=storesAdm.php> Вернуться к списку магазинов </a>";
?>
</body>
</html>
