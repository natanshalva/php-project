<?php session_start();

require_once '../class/user.php';

if($_POST['login']){
	

$name = $_POST['name']; 	
	
$pass = $_POST['pass'];	
	
	
$name = trim($name);	
$name = strtolower($name); 


// long text 
if(strlen($name) > 30 ){
	$name = substr($name , 0 , 30); 
	
	$message = "name is to long!";
	
}

// tags

//echo "$name + $pass";

$user = new User;

$user->name = $name;
$user->pass = $pass;
$login = $user->user_veri();


if($login == FALSE) {
	
	
}
 header("Location: /php/project/index.php");
// check if we have the name and pass in db 

// if yes - then : creat  session for user

// send the php to the first page back. 

 
	
} // end of the first if 



?>