<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.true{
	background-color:#afa;
}
.false{
	background-color:#faa;
}
</style>
</head>

<body>
<?php
$testExpressions=array(
	'3+4'=>3+4, //test addition
	'5-2'=>5-2, //test substraction
	'-4-(-3)' =>-4-(-3), //test unary substraction
	'3*4'=>3*4, //test multiplication
	'18/5'=>18/5, //test division
	'2^3'=>pow(2,3), //test exponential
	'3+2*5'=>3+2*5, //test operations priority
	'(3+2)*5'=>(3+2)*5, //test braces
	'( 3+ 2) *5 ' => (3+2)*5, //test removing of whitespaces
	'2+3-(3*2)^2' => 2+3-pow((3*2),2),
	'3+2-1/3^2-15*1' =>3+2-pow(1/3,2)-15*1,
	'-1/3^2-15*1'=>-1*pow(1/3,2)-15*1,
	'1-15*1'=>1-15,
	'3+2-1/3^2-15*1+(2+3-(3*2)^2)'=>3+2-pow(1/3,2)-15*1+(2+3-pow((3*2),2))
);
include "class.SimpleCalc.php";
$calc=new SimpleCalc();
?>
<table>
	<thead>
		<th>Expression</th>
		<th>Result of calculations</th>
		<th>Intended result</th>
	</thead>
	<tbody>
<?php
foreach ($testExpressions as $exp => $res){
	$calculated=$calc->calculate ($exp);
	echo '<tr class="'.($res==$calculated?'true':'false').'">';
	echo '<td>'.$exp.'</td>';
	echo '<td>'.$calculated.'</td>';
	echo '<td>'.$res.'</td>';
	echo '</tr>';
}
?>
	</tbody>
</table>
</body>
</html>
