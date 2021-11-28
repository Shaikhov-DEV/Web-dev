<HTML>
<TITLE> Шаихов Х.И. ПИ-323 </TITLE>
<BODY>
<TABLE>
	<p> Сам. работа - Задача 5 <br>
<?php
$n = rand(50, 500);
$num = range(1, 999); 
shuffle($num); 
$a = array_slice($num, 0, $n);
echo 'Исходный массив a('.$n.'): <br>';
print_r($a); 
$s = rand(1, 99); 
for ($i = 0; $i <= $s; $i++) { 
	$sum = $sum + $a[$i];
}
$sred=$sum/$s;
echo '<br>Сред. ариф. '.$s.' элементов: <br>';
print_r($sred);
for ($i = 0; $i < $n; $i++) { 
	if ($a[$i]>$s) { $b++; }
	elseif ($a[$i]<$s) { $m++; }
	elseif ($a[$i]=$s) { $r++; }	
}
echo '<br>Кол-во элементов больше '.$s.': ';
print_r($b);
echo '<br>Кол-во элементов меньше '.$s.': ';
print_r($m);
echo '<br>Кол-во элементов равно '.$s.': ';
print_r($r);
?>
</TABLE>
</BODY>
</HTML>