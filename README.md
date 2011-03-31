#class.SimpleCalc.php PHP SimpleCalc Class

Copyright (C) 2011 Vladimir Shugaev

* Author: Vladimir Shugaev <vladimir.shugaev@junvo.com>
* Created: 2011 March 31

Class executes simple mathematical calculations with expression in infix notation
Curently allows simple algebraic binary operations:

* addition (+)
* substraction (-)
* multiplication (*)
* division (/)
* exponential (^)

It also allows to use braces and watchs for priority of operations

##Usage

    require_once "class.SimpleCalc.php";
    $calc=new SimpleCalc();
    echo $calc->calculate ('3+2-1/3^2-15*1+(2+3-(3*2)^2)');
	