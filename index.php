<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru">
	<head>
	  <meta charset="utf-8">
	  <title>Строка</title>
	  <style>
	.txt{
		width:100%;
		height:250px;
	}
	</style>
	</head>
	<body>
		<h1>Введите вариативную строку</h1>
		<p>Строка раскрывается согласно следующим правилам:</p>
		<ul>
			<li>{..|..} &nbsp;значит, что допустимо одно из указанных значений, то есть {крутое|простое} значит, что выведется ТОЛЬКО крутое или ТОЛЬКО простое.</li>
			<li>&nbsp;Вложенные фигурные скобки так же должны раскрываться, значит: {простое|очень {сложное|удачное}} в итоге получим на выходе один из трёх вариантов: &quot;простое&quot;, &quot;очень сложное&quot;, &quot;очень удачное&quot;.</li>
			<li>Вложенность может быть бесконечной.</li>
		</ul>
		<form method="post" action="/pages/preview.php">
			<textarea name = "string" class="txt">{Пожалуйста,|Просто|Если сможете,} сделайте так, чтобы это {удивительное|крутое|простое|важное|бесполезное} тестовое предложение {изменялось {быстро|мгновенно|оперативно|правильно} случайным образом|менялось каждый раз}</textarea>
			<hr/>
			<input type='submit' value = "Посмотреть все варианты"/>
		</form>
	</body>
</html>

