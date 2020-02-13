<?php
//Эта функция делит строку на подстроки по | но не делит внутри {}
function str_explode(string $str):array{
	$n = strlen($str);
	$arr = [];
	$str2 = "";
	$b=0;
	for($i=0;$i<$n;$i++){
		if($str[$i]=='}'){
			$b--;
		}
		elseif($str[$i]=='{'){
			$b++;
		}
		if($str[$i]=="|"&&$b==0){
			array_push($arr,$str2);
			$str2 = "";
		}
		else{
			$str2 .= $str[$i];
		}
	}
	array_push($arr,$str2);
	return $arr;
}


function rand_form(string $string):string{
	$n = strlen($string);
	$newString = "";
	$pattern = "";
	$b=0;
	$words = [];
	for($i=0;$i<$n;$i++){
		//Поиск подстрок первого уровня
		if($string[$i]=="{"){
			//Если открылась {
			$b++;	//Увеличить счетчик вложености
			if($b==1)continue;
			//Если вложеность 1ого уровня, пропустить
		}
		elseif($string[$i]=="}"){
			//Если закрылась {
				
			$b--;//Уменьшиь счетчик вложености
			if($b==0)break;
		}
		if($b>0){
			$pattern.=$string[$i];
		}
		else{
			$newString.=$string[$i];
		}
	}
	if(!empty($pattern)){
		$words = str_explode($pattern);
		$word = $words[rand(0,count($words)-1)];
		unset($words);
		return rand_form($newString.$word.substr($string,$i+1));
	}
	else{
		return $string;
	}
}

function getStr($string, array &$variants=[]){
	$n = strlen($string);
	$newString = "";
	$pattern = "";
	$b=0;
	$words = [];
	for($i=0;$i<$n;$i++){
		//Поиск подстрок первого уровня
		if($string[$i]=="{"){
			//Если открылась {
			$b++;	//Увеличить счетчик вложености
			if($b==1)continue;
			//Если вложеность 1ого уровня, пропустить
		}
		elseif($string[$i]=="}"){
			//Если закрылась {
				
			$b--;//Уменьшиь счетчик вложености
			if($b==0)break;
		}
		if($b>0){
			$pattern.=$string[$i];
		}
		else{
			$newString.=$string[$i];
		}
	}
	if(!empty($pattern)){
		$words = str_explode($pattern);
		foreach($words as $word){
			//echo $newString.$word.substr($string,$i+1)."<br>";
			getStr($newString.$word.substr($string,$i+1),$variants);
		}
		
	}
	else{
		array_push($variants,$string);
	}
}