<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>kindergarden </title>
	</head>
	<body>
		
		<h1> function in class </h1> 
		
		<?php

class Test {
	
	var $var = "text";
	
	function one($var = null) {
		
		echo "this is the attribute: " . $this->var . "<br>";
		echo "this is the arguement : " .$var . "<br>";
		$this->var = $var;
		echo $this->var;
	}
}

   $test = new Test();
   
   echo "<br>";
   $ts = "ggg";
   $test->one($ts);
   
   
   



		?>
	</body>
</html>
