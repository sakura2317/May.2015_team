<!doctype html>
<html>
<head>
<meta charset"UTF-8>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
$fp = fopen("sales.csv","r");
$sumA = 0;
$sumB = 0;
$sumC = 0;
while($stat = fgetcsv($fp)){
	//print_r($stat);
	if($stat[0] == "A"){$sumA += $stat[1];}
	if($stat[0] == "B"){$sumB += $stat[1];}
	if($stat[0] == "C"){$sumC += $stat[1];}
}

print "商品：A合計：" . $sumA;
print "<br>";
print "商品：B合計：" . $sumB;
print "<br>";
print "商品：C合計：" . $sumC;
print "<br>";
print "<br>";

fclose($fp);
?>
</body>
</html>