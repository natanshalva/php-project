<?php 

require '/class/db.php';

echo $db->last_query;

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
					
					<?php } ?>
					
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
				<p><input type="txet" name="name" /></p>
				<p><input type="txet" name="family" /></p>
				<p><input type="txet" name="username" /></p>
				<p><input type="txet" name="email" /></p>
				<p><input type="txet" name="pass" /></p>
				<p><input type="submit" name="register" /></p>
			</form>
		</article>
	</div>
</div>
<?php

require 'pages/html/footer.php';
?>

