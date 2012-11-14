<?php

 $var = $_POST['text'];
 
 if($var == 'ok'){
 	$test = "tttt";
 	header("Location: http://localhost/php/headers/one.php?id=nogood");
 
 }else {
 	echo "not ok";
 }
 
?>