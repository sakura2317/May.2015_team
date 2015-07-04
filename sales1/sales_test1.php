<!doctype html>
<html>
<head>
<meta charset"UTF-8>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
$fp   = fopen("test1.csv","r");
$i    = 0;
$sum  = 0;
$item = array();
while($stat = fgetcsv($fp)){
	if(!array_key_exists($stat[0],$item)){
	$item += array($stat[0] => $stat[1]);
	}else{
	$sum = array($stat[0] =>$item[$stat[0]] + $stat[1]);
	$item = array_replace($item,$sum);
	}
}
foreach($item as $key => $val){
	print "商品" . $key . "合計：" . $val;
	print "<br>";
}


//print_r($item);
fclose($fp);
?>
</body>
</html>