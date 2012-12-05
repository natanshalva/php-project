<?php 
//$_SESSION['favcolor'] = 'green';


print_r($_SESSION);
//die();

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
			<h3>title</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nibh sem, posuere et placerat suscipit, pulvinar vitae augue. Curabitur in sapien eget lectus hendrerit dapibus. Vestibulum nec nulla eget tellus luctus dictum at in leo. Suspendisse venenatis hendrerit dui eu adipiscing. Duis felis neque, aliquam nec malesuada non, vulputate a enim. Suspendisse diam nisl, tincidunt a auctor at, ultricies non risus. Nullam ornare auctor arcu, et cursus enim eleifend vel. Sed facilisis suscipit ligula non tincidunt. Vivamus viverra, leo non vehicula ornare, mi nunc aliquam leo, at imperdiet nunc enim a velit. Suspendisse lobortis ultricies lectus congue varius. Duis nec quam non justo ultricies porttitor.
			</p>
		</article>
	</div>
</div>
<?php

require 'pages/html/footer.php';
?>

