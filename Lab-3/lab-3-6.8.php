<h2>Шаихов Х.И.</h2>
<HTML>
<HEAD> <TITLE> Задание 3.6.8 </TITLE>
</HEAD>
<BODY>
	<h2> Задание:</h2>
<FORM method="post" action="<?php print $PHP_SELF ?>">
8. Вывести заданный текст, удалив из него повторные вхождения каждого символа.
<br><br>Введите предложение: <br>
     <INPUT type="text" name="a" size="50">
<P> <INPUT type="submit" name="obr" value="Удалить повторяющиеся символы">
</FORM>
<?php
$a = ($_POST["a"]);
$a = preg_split("//u",$a);
$b = array();
foreach ($a as $v)
{
	   if (in_array($v, $b))
		   continue;
	   $b[] = $v;
}
$a = implode($b);
echo "Вывод текста, без повторов: <br>".$a;
?>
</BODY> </HTML>