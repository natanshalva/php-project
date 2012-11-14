<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>kindergarden </title>
	
	</head>
	<body>
		<?php
		
		if(isset($_GET['id'])){
			echo "we got get";
		}else {
			echo "not working";
		}
		?>
		<form action="two.php" method="post"> 
			<input type="text" name="text" />
			<input type="submit"  />
		</form>		
	</body>
</html>
