<?php

define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASENAME', 'communities');

// 1 - database connection
$connection = mysql_connect(SERVER, USERNAME, PASSWORD);
if (!$connection) {
	die('cant connecto to the database' . mysql_error());
}
// Hebrew need this:
mysql_query("SET NAMES 'utf8'");
// 2 Select the database to use
$db = mysql_select_db(DATABASENAME, $connection);
if (!$db) {
	die('database connction failed' . mysql_error());
}

function n_query($query, $connection) {

	$result = mysql_query($query, $connection);

	if (!$result) {
		die("Query did not work " . mysql_error());
	}
	return $result;
}




?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Communities</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div id="main">
			<div id="allfamilies">
				<h3>ALL Families</h3>
				<?php 
				$query = "SELECT * FROM families";
				
				# Sending Query to function that executes the SQL
				$result = n_query($query, $connection);
				echo "<table>";
				
				# Insert into array and run the rows
				while ($rows = mysql_fetch_assoc($result)) {
					echo "<tr>";
					
					# Now we are running on every coloumn and print the value
					foreach ($rows as $value) {
						echo "<td>";
						echo $value;
						echo "</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
				?>
			</div>
			
			<!-- this is a block that shows all the societies -->
			<div id="allsocieties">
				<h3>ALL Societies</h3>
				<?php 
				$query = "SELECT name FROM society";
				$result = n_query($query, $connection);
				
				# Now we are running on every coloumn and print the value
				while ($rows = mysql_fetch_assoc($result)) {
					foreach ($rows as $value) {
						echo $value . " , ";
					}
				}
				?>
			</div>
			
			<!-- Get details about society -->
			<div id="singlesociety">
				<h3>Find details about a society</h3>
				<form action="" method="post">
					<input type="text" name="onesociety"/>					
					<input type="submit" name="singlesociety"/>					
				</form>
				<?php
				
				##################################
				# This is for development only
				#// var_dump($_POST);
				#// print_r($_POST);
				##################################
				
				# We test if we got result from the $_POST['onesociety']
				if (!empty($_POST['onesociety'])) {
					
					# Insert the post value into a variable
					$singlesociety = $_POST['onesociety'];
					
					/* Get all the data from table 'society' 
					where the value match $single */
					
					##########################################
					#
					# TODO we have a problem in the sql, what if we have 2 results?
					# we get only one answer
					##########################################
					
					$query = "SELECT * FROM society WHERE name = '{$singlesociety}'";
					$result = n_query($query, $connection);
					
					# Get the result from the query and convert it to array
					# and insert into variable $row 
					# We are only intersted in one result
					$row = mysql_fetch_assoc($result);
					
					# for development use
					# var_dump($row);
					#########################
					
					# We wanna make sure we have result before running foreach loop			
					if($row != FALSE) {
					
					# Go through every value in the row and print it	 
						foreach ($row as $key => $value) {
							echo $value . " - ";
						}
						
					# If we dont have result:
					} else {
						echo "This society doesn't exist.";
					} # END IF
					
				} # END IF - if (!empty($_POST['onesociety']))
				?>
			</div> <!-- END <div id="singlesociety">  -->
				
			<!-- Shows the families in one society -->	
			<div id="familiesbysociety">
				<h3>Find families in a society</h3>
				<form action="" method="post">
					<input type="text" name="familiesbysociety"/>					
					<input type="submit" name="societyfamilies"/>					
				</form>
				<?php
				
				# We dont start if we dont have value for $_POST['societyfamilies'] 
				if (!empty($_POST['societyfamilies'])) {
					$familiesbysociety = $_POST['familiesbysociety'];
					
					# Get all families from one society 
					$query = "SELECT * FROM families WHERE community_id = '{$familiesbysociety}'";
					$result = n_query($query, $connection);
					while ($row = mysql_fetch_assoc($result)) {
							
						
						if($row != FALSE) {
							foreach ($row as $key => $value) {
								echo $value . " - ";
							}
						} else {
							echo "There are no families in this society.";
						}
					}
				}
				?>
			</div>
			<div id="movefamily">
				<h3>Move a family to another society</h3>
				<form action="" method="post">
					<input type="text" name="familytomove" />
					<input type="text" name="societytomoveto" />
					<input type="submit" name="movefamily" />
				</form>
				<?php
				
				# We wanna make sure we have results
				if (isset($_POST['movefamily']) && !empty($_POST['familytomove']) && !empty($_POST['societytomoveto'])) {
					$familytomove = $_POST['familytomove'];
					$societytomoveto = $_POST['societytomoveto'];
					
					# We want to make sure we have this family name in the database
					$query = "SELECT * FROM families WHERE family_name = '{$familytomove}'";
					$result = n_query($query, $connection);
					$row = mysql_fetch_assoc($result);
					
					# check if family exists, and if not than:
					if ($row != FALSE) {
						// we now know that family exists
						// 
						// now we're checking if society exists
						$query = "SELECT * FROM society WHERE name = '{$societytomoveto}'";
						$result = n_query($query, $connection);
						$row = mysql_fetch_assoc($result);
						if ($row != FALSE) {
							// society exists
							//
							// Now we are updating the selected family community
							$query = "UPDATE families SET community_id = '{$societytomoveto}' WHERE family_name = '{$familytomove}'";
							$result = n_query($query, $connection);
							// var_dump($result);
							if ($result == TRUE) {
								echo "Success!";
						} else {
							echo "Society not found.";
						}
						
					} else {
						echo "Family not found.";
					}
					
				} else {
					echo "Please input both family name and society name.";
				}
				}
				?>
			</div>
		</div>
	</body>
</html>
<?php
mysql_close($connection);
?>