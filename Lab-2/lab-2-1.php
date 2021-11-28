<?php
$treug = array(1,2,3,4,5,6,7,8,9,10);
$kvd=array(1,2,3,4,5,6,7,8,9,10);
$rez=array();
echo'Массив треугольных чисел: <br>';
foreach($treug as $k=>$n) {
    $treug[$k]=$n*($n+1)/2;
    echo $treug[$k] .'&nbsp;&nbsp;';
}
echo '<br>';
echo '<br>';
echo'Массив квадратов натуральных чисел: <br>';
foreach($kvd as $a=>$b) {
    $kvd[$a]=$b*$b;
    echo $kvd[$a].'&nbsp;';
}
echo '<br><br>';
echo'Объединенный массив: <br>';
$rez=array_merge($treug,$kvd);
print_r($rez);
echo '<br><br>';
echo'Отсортированный массив: <br>';
sort($rez);
reset($rez);
while (list($key, $val) = each($rez)) {
echo "rez  [" . $key . "] = " . $val . "\n";
}
echo '<br><br>';
echo'Массив с удаленным первым элементом: <br> ';
array_shift($rez);
print_r($rez);
echo '<br><br>';
echo'Массив с удаленными повторяющимися элементами: <br>';
$rez1 = array_unique($rez);
print_r($rez1);
?>