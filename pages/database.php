<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
	<head>
	  <meta charset="utf-8">
	  <title>Добавление в БД</title>
	</head>
	<body>
	<p><a href='/'>На главную</a></p>
<?php
include "../functions/functions.php";
$doit = false;
if(!isset($_POST['string'])){
	echo "<h1>Строка не найдена</h1>";
}
else{
	//test
	$db = new mysqli("localhost", "root", "", "test");
	if(!$db){
		echo "<p>Ошибка: Невозможно установить соединение с MySQL."
		."Код ошибки errno: " . mysqli_connect_errno() . "<br>"
		."Текст ошибки error: " . mysqli_connect_error() . "<br></p>";
	}
	else $doit = true;
}
if($doit){
	$string = $_POST['string'];
	$subjects=[];
	getStr($string,$subjects);
	if(($p = $db->prepare("INSERT IGNORE INTO `Subjects`(`String`) VALUES (?)"))){
		$str = "";
		$p->bind_param("s", $str);
		foreach($subjects as $value){
			$str = $value;
			$p->execute();
			
		}
		unset($subjects);
		echo "<p>Данные сохранены в БД</p>";
	}
	else{
		echo "<p>Ошибка при подготовке запроса(" . $db->errno . ") " . $db->error."</p>";
	}
	echo "<h2>Уже есть</h2>";
}
?>
		<table border="1" color="black" cellspacing='1' cellpadding='5'>
			<tr>
				<th>Номер</th>
				<th>Предложение</th>
			</tr>
			<?php
			if(($sel = $db->query("SELECT * FROM Subjects"))){
				while(($row=$sel->fetch_assoc())){
					echo "<tr>"
						."<td>".$row["id"]."</td>"
						."<td>".$row["String"]."</td>"
					."</tr>";
				}
			}
			?>
		</table>
	</body>
</html>

