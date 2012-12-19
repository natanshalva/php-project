<?php

require_once '/class/db.php';
require_once '/class/user.php';
echo $db -> last_query;

$user = new User;
$user -> first_log_in();

require './pages/html/header.php';
?>
<div class="message">
	<?php
	if (isset($_SESSION['message'])) {
		print $_SESSION['message'];
		session_unset($_SESSION['message']);
	}
	?>
</div>
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
					<a href="register.php">Register</a>
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
		<div class="gallery">
			<!-- Elastislide Carousel -->
			<ul id="carousel" class="elastislide-list demo-4">
				<li data-preview="images/large/4.jpg">
					<a href="#" class="demo-4"><img src="images/small/4.jpg" alt="image04" /></a>
				</li>
				<li data-preview="images/large/5.jpg">
					<a href="#"><img src="images/small/5.jpg" alt="image05" /></a>
				</li>
				<li data-preview="images/large/6.jpg">
					<a href="#"><img src="images/small/6.jpg" alt="image06" /></a>
				</li>
				<li data-preview="images/large/7.jpg">
					<a href="#"><img src="images/small/7.jpg" alt="image07" /></a>
				</li>
				<li data-preview="images/large/11.jpg">
					<a href="#"><img src="images/small/11.jpg" alt="image11" /></a>
				</li>
				<li data-preview="images/large/12.jpg">
					<a href="#"><img src="images/small/12.jpg" alt="image12" /></a>
				</li>
				<li data-preview="images/large/13.jpg">
					<a href="#"><img src="images/small/13.jpg" alt="image13" /></a>
				</li>
				<li data-preview="images/large/14.jpg">
					<a href="#"><img src="images/small/14.jpg" alt="image14" /></a>
				</li>
				<li data-preview="images/large/15.jpg">
					<a href="#"><img src="images/small/15.jpg" alt="image15" /></a>
				</li>
				<li data-preview="images/large/16.jpg">
					<a href="#"><img src="images/small/16.jpg" alt="image16" /></a>
				</li>
				<li data-preview="images/large/17.jpg">
					<a href="#"><img src="images/small/17.jpg" alt="image17" /></a>
				</li>
				<li data-preview="images/large/18.jpg">
					<a href="#"><img src="images/small/18.jpg" alt="image18" /></a>
				</li>
				<li data-preview="images/large/19.jpg">
					<a href="#"><img src="images/small/19.jpg" alt="image19" /></a>
				</li>
				<li data-preview="images/large/20.jpg">
					<a href="#"><img src="images/small/20.jpg" alt="image20" /></a>
				</li>
				<li data-preview="images/large/1.jpg">
					<a href="#"><img src="images/small/1.jpg" alt="image01" /></a>
				</li>
				<li data-preview="images/large/2.jpg">
					<a href="#"><img src="images/small/2.jpg" alt="image02" /></a>
				</li>
				<li data-preview="images/large/3.jpg">
					<a href="#"><img src="images/small/3.jpg" alt="image03" /></a>
				</li>
				<li data-preview="images/large/8.jpg">
					<a href="#"><img src="images/small/8.jpg" alt="image08" /></a>
				</li>
				<li data-preview="images/large/9.jpg">
					<a href="#"><img src="images/small/9.jpg" alt="image09" /></a>
				</li>
				<li data-preview="images/large/10.jpg">
					<a href="#"><img src="images/small/10.jpg" alt="image10" /></a>
				</li>
			</ul>
			<!-- End Elastislide Carousel -->
			<div class="image-preview">
				<img id="preview" src="images/large/4.jpg" />
			</div>
		</div>
	</div>
</div>
		<script type="text/javascript">
			
			// example how to integrate with a previewer

			var current = 0,
				$preview = $( '#preview' ),
				$carouselEl = $( '#carousel' ),
				$carouselItems = $carouselEl.children(),
				carousel = $carouselEl.elastislide( {
					current : current,
					minItems : 4,
					onClick : function( el, pos, evt ) {

						changeImage( el, pos );
						evt.preventDefault();

					},
					onReady : function() {

						changeImage( $carouselItems.eq( current ), current );
						
					}
				} );

			function changeImage( el, pos ) {

				$preview.attr( 'src', el.data( 'preview' ) );
				$carouselItems.removeClass( 'current-img' );
				el.addClass( 'current-img' );
				carousel.setCurrent( pos );

			}

		</script>
<?php

require 'pages/html/footer.php';
?>

