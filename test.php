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

$consts=array(
	'G'=>6.6742*pow(10,-11)
);
$vars=array(
	'R'=>6.371*pow (10,6), //meters (mass of Earth)
	'M'=>5.9736*pow (10,24) //kilograms (radius of Earth)
);
$formula='G*M/R^2'; //gravity force of object with mass M kg on distance R from its center

$toCalc=str_replace(array_keys($consts),array_values($consts),$formula);
$toCalc=str_replace(array_keys($vars),array_values($vars),$toCalc);
$testExpressions[$toCalc]=6.6742E-11*5.9736E+24/pow(6371000,2);
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
