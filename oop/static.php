<?php

class test {
	
	static public $var = 10 ;
	
	static public function fun(){
	   self::$var = 20 ;
		echo "this is function " .  self::$var;
		
	}		
	
}	

echo "<br>";
test::fun();
echo "<br>";
echo test::$var;


?> 