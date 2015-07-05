<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>カレンダー作成</title>
</head>
<body>

<table border = 1>

<?php

//セレクトボックスフォーム
	print "<form action ='' method = 'post'>";

//セレクトボックス年 a
	print "<select name = 'year'>";
	for($sy = 2010 ; $sy <= 2020 ; $sy++){
		print "<option value = {$sy} > {$sy} </option>";
	}
	print "</select>";
	print "<br>";

//セレクトボックス月 b
	print "<select name = 'month' >";
	for($sm = 1 ; $sm <= 12 ; $sm++){
		print "<option value = {$sm} > {$sm} </option>";
	}
	print "</select>";
	print "<br>";
	print "<input type = 'submit'>";
	print "</form>";


//カレンダー
//フォームが送信されたらその数値を読み取る
	if(isset($_POST['year'])){
		$year = $_POST['year'];
	}else{
		$year = date("Y");
	}
	if(isset($_POST['month'])){
		$month = $_POST['month'];
	}else{
		$month = date("n");
	}
	if(isset($_POST)){
		$today = date("j" , mktime(0 , 0 , 0 , $month , 1 , $year));
	}else{
		$today     = date("j");
	}
//その月の初日が何曜日なのか、その月の最終日が何日なのか
	$firstweek = date("w" , mktime(0 , 0 , 0 , $month , 1 , $year));
	$lastday   = date("j" , mktime(0 , 0 , 0 , $month + 1 , 0 ,$year));
	$week      = array("日" , "月" , "火" , "水" , "木" , "金" , "土");

//月
	print "<tr align = center>";
	print "<th colspan = 7> {$year} 年 {$month} 月</th>";
	print "</tr>";
	print "<tr>";

//曜日 i
	for($i = 0 ; $i <= 6 ; $i++){
		print "<th>{$week[$i]}</th>";
	}
	print "</tr>";

//カレンダーの最初空白を配列に入れる j
	$n = array();
	for($j = 0 ; $j < $firstweek ; $j++){
		array_push($n , "");
	}
//日付 k
	print "<tr>";
	for($k = 1 ; $k <= $lastday ; $k++){
		array_push($n , "{$k}");
		
	}
	$red  = "bgcolor = '#ff0000'";
	$blue = "bgcolor = '#0000ff'";
	foreach($n as $key => $val){
		print "<td class = {$key} ";
		if($key % 7 == 0){
			print $red;
		}else if($key % 7 == 6){
			print $blue;
		}
		print "> {$val} </td>";
		if($key == 6){
			print "</tr>";
		}else if(($key + 1) % 7 == 0 ){
			print "</tr>";
		
		}
	}


?>
</table>
</body>
</html>