<!doctype html>
<html>
<head>
<meta charset"UTF-8>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
$fp     = fopen("test2.csv","r");
$i      = 0;
$sumi   = 0;
$item   = array();
$amount = array();
$suma   = 0;

while($stat = fgetcsv($fp)){
	if(!array_key_exists($stat[0],$item)){
		$item   += array($stat[0] => $stat[1]);
		if(isset($stat[2])){
			$amount += array($stat[0] => $stat[2]);
		}
	}else{
		$sumi   = array($stat[0] => $item[$stat[0]] + $stat[1]);
		$item   = array_replace($item , $sumi);
		if(isset($stat[2])){
			$suma   = array($stat[0] => $amount[$stat[0]] + $stat[2]);
			$amount = array_replace($amount , $suma);
		}
	}
}
print "<table>";
foreach($item as $key => $val){
	print "<tr>";
	print "<td>商品"   . $key . "</td>";
	print "<td>合計：" . $val . "</td>";
		if(!empty($amount)){
			print "<td>数量：" . $amount[$key] . "</td>";
		}
	print "</tr>";
}
print "</table>";

//print_r($amount);
fclose($fp);
?>
</body>
</html>