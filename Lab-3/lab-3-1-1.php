<?
if ($_POST["a"]>$_POST["b"]) {
  echo ("Большее из двух чисел a = $a");
  print_r($_POST["a"]);
} elseif ($_POST["a"]<$_POST["b"]) {
  echo ("Большее из двух чисел b =$b");
  print_r($_POST["b"]);
  }else {
  echo ("Два чисела a = ".$_POST["a"].", b =".$_POST["b"]." равны");  
  }

echo ("<BR> <A href='lab-3-1.html'> Назад </A>");
?>