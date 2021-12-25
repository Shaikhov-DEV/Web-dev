<html>
<head>
<title>Задание 3.6.12</title>
<h2>Шаихов Х.И.</h2>
<h2>12. Пользователем задается произвольный текст и два символа. Перепечатать заданный текст, удалив из него все вхождения второго символа, непосредственно перед которыми находится первый символ</h2>
</HEAD>
<BODY>
<FORM method="post" action="<?php print $PHP_SELF ?>">
 <p>Произвольный текст: <br>
 <INPUT type="text" name="a" size="30">
  <p>Первый символ : <br>
 <INPUT type="text" name="b1" size="5">
 <p>Второй символ : <br>
 <INPUT type="text" name="b2" size="5"><br><br>
 <input type ="submit" value="Проверить">
 <input type ="reset" name="ochistit" value ="Очистить" >
</FORM>
Исходный текст: <br />
<?php
$r1="";
print($_POST['a']."<br><br>" );
$b=$_POST['b1'].$_POST['b2'];
$str=str_replace($b,'',$_POST['a']);
print("Строка, где все малые латинские буквы заменены на заглавные: <br /> ".str_replace(mb_strtoupper($b, 'UTF-8'),'',$str));
?> 

</BODY> 
</HTML>