<?php session_start();

require_once '/class/db.php';
require_once '/class/user.php';



if(isset($_POST['register'])) {

	$name = $_POST['name'];
	$family = $_POST['family'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$pass_hash = sha1($pass) ;
	
	$user = new User();
	
	$user->name = $name;
	$user->family = $family;
	$user->username = $username;
	$user->email = $email;
	$user->pass = $pass_hash;
	
	$token = sha1(rand()) ;
	$user->token = $token ;
    $success = $user->user_insert_to_db();
    
	if($success == TRUE){
	
	$to = 'nobody@example.com';
	$subject = 'new user ';
	$message = 'please active your account :<br> 
	<a href="http://localhost/php/project/index.php?token=$token">are site</a>';
	$headers = 'From: webmaster@example.com' . "\r\n" . 'Reply-To: webmaster@example.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);
		
	$_SESSION['message'] = "mail bla bla ... ";
	
	header("Location: index.php");
	
	exit;
		
	}
	
	// TODO insert in to the db the values
	// TODO status 1 and level

	// add token column  in the db table user
	// inser rndum tokn to db
	// send the user emil with his toen
	// in the email he/she will have activation link with the token
	//

	// send mail to us



}
require 'pages/html/header.php';
?>

<div id="main">
	<header>
		<h1>Title</h1>
	</header>
	<div id="content">
		<aside>
			<nav>
				<div id="login">
					<?php
//print_r($_GET);
// logout
if(isset($_GET['logout']) == 1 ){

session_unset() ;
session_destroy() ;
unset($_GET);

}
// if the uset is ok then welcome
if(isset($_SESSION['name'])){

$name = $_SESSION['name'];

$output = " <div id=\"welcom\">Welcome $name <br> ";
$output .= " <a href='index.php?logout=1'>logout</a></div>";
print $output;

}else{

					?>
					<form action="pages/login.php" method="post">
						<input type="text" name="name" />
						<input type="text" name="pass" />
						<input type="submit" name="login" />
					</form>
					<?php }?>
				</div>
				<div id="register">
					<a href="pages/register.php">Register</a>
				</div>
				<ul>
					<li class="btn">
						<a href="">menu link</a>
					</li>
					<li class="btn" >
						<a href="">menu link</a>
						</li  >
					<li class="btn">
						<a href="">menu link</a>
					</li>
					<li class="btn">
						<a href="">menu link</a>
					</li>
					<li class="btn">
						<a href="">menu link</a>
					</li>
				</ul>
			</nav>
		</aside>
		<article>
			<form method="post" action="">
				<p>
					<input type="txet" name="name" />
				</p>
				<p>
					<input type="txet" name="family" />
				</p>
				<p>
					<input type="txet" name="username" />
				</p>
				<p>
					<input type="txet" name="email" />
				</p>
				<p>
					<input type="txet" name="pass" />
				</p>
				<p>
					<input type="submit" name="register" />
				</p>
			</form>
		</article>
	</div>
</div>
<?php

require 'pages/html/footer.php';
?>

