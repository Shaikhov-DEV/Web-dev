<HTML>
<TITLE> Шаихов Х.И. ПИ-323 </TITLE>
<BODY>
<TABLE>
	<p> Сам. работа - Задача 16 <br>
<?php
$num = range(1, 499); 
shuffle($num); 
$mass = array_slice($num, 0, 100);
echo 'Исходный массив: <br>';
print_r($mass); 
for ($i = 0; $i <= 99; $i=$i+2) { 
	$temp=$mass[$i];
	$mass[$i]=$mass[$i+1];
	$mass[$i+1]=$temp;	
}
echo '<br>Cкорректированный массив: <br>';
print_r($mass); 
?>
</TABLE>
</BODY>
</HTML>