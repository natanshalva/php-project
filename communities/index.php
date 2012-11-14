<?php
# Bring MySQL configuration from config.php
require ('config.php') ;

# Load function from function.php
require ('function.php');

# We are making database connection and getting the connection resource into 
# var $connection
$connection = database_connect();

require ('class/family.php');
require ('class/society.php');

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
				 
				# Instantiate class Family 
				$family = new Family();
				
				# We print all the families
				$family->print_all_families($connection);
				
				?>
			</div>
			
			<!-- this is a block that shows all the societies -->
			<div id="allsocieties">
				<h3>ALL Societies</h3>
				<?php
				
				# Instantiate class Society
				$society = new Society();
				
				# We print the societies
				$society->print_all_society($connection);
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
				$validated_array = input_validation();
				
				##################################
				# this is for development only
				# print_r($validated_array);
				# die;
				################################
				# Print details about selected society
				$society->get_details_about_selected_society($connection, 
															$validated_array['onesociety']); 
				
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