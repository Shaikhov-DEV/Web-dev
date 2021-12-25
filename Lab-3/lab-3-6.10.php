<html>
<head>
<title>Задание 3.6.10</title>
<h2>Шаихов Х.И.</h2>
<h2>10. Заменить в данном тексте все малые латинские буквы на заглавные</h2>
</HEAD>
<BODY>
<FORM method="post" action="<?php print $PHP_SELF ?>">
 <p>Введите какой-либо отрывок текста: <br>
 <INPUT type="text" name="a" size="100">
 <input type ="submit" value="Вывести">
 <input type ="reset" value ="Очистить">
</FORM>
Исходная строка: <br /> 
<?php
print($_POST['a']."<br><br>" );
if ($_POST['a']){
print("Строка, где все малые латинские буквы заменены на заглавные: <br /> ".mb_strtoupper($_POST['a']));}
?>
</BODY> 
</HTML>