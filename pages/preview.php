<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
<head>
  <meta charset="utf-8">
  <title>Строка</title>
</head>
<body>
<p><a href='/'>На главную</a></p>
<?php
include "../functions/functions.php";
if(!isset($_POST['string'])){
	exit("<h1>Строка не найдена</h1>");
}
$string = $_POST['string'];
echo "<h1>Вариативная строка</h1>";
//$string = "{Пожалуйста,|Просто|Если сможете,} сделайте так, чтобы это {удивительное|крутое|простое|важное|бесполезное} тестовое предложение {изменялось {быстро|мгновенно|оперативно|правильно} случайным образом|менялось каждый раз}.";

//$string2 = "{Просто {не сложное|простое}|Например,} предложение";

echo "<p>$string</p>";
echo "<hr>";

/*$matches = [];
preg_match_all("|{.*}|U",$string,$matches,PREG_PATTERN_ORDER);
foreach($matches as $value){
	print_r($value);
	echo "<br>";
}*/

echo "<h2>1. Случайное предложение</h2>";
echo rand_form($string)."<br>";
$subjects = [];
getStr($string,$subjects);
echo "<h2>2. Все варианты строки (".count($subjects).")</h2>";
echo "<form method='POST' action='/pages/database.php'>"
	."<input type='hidden' name='string' value='$string'>"
	."<input type='submit' value='Сохранить в БД'>"
."</form>";

foreach($subjects as $key=>$value){
	echo "<p>$key: $value</p>";
}
?>
</body>
</html>

