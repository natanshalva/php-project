<?php 

	/**
	 * Prints out all the societies  
	 *
	 * @return void
	 * @author  
	 */
class Society{

	function print_all_society($connection = NULL) {
		
			 # Get all the societies from database
				$query = "SELECT name FROM society";
				$result = n_query($query, $connection);
				
				# Now we are running on every coloumn and print the value
				while ($rows = mysql_fetch_assoc($result)) {
					foreach ($rows as $value) {
						echo $value . " , ";
					}
				}
				
	} # END OF function print_all_society
	
	
	# Get details about selected society

	function get_details_about_selected_society($connection = NULL, $name_of_society){
	
	
	
	####################################################
	# arrguments:
	# 1. connection - resource
	# 2. name_of_society - post value after validation 
	####################################################			
				##################################
				# This is for development only
				#// var_dump($_POST);
				#// print_r($_POST);
				##################################
				
				# We test if we got result from the $_POST['onesociety']
				if (!empty($name_of_society)) {
					
					# Insert the post value into a variable
					$singlesociety = $name_of_society;
					
					/* Get all the data from table 'society' 
					where the value match $singlesociety */
					
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
				
		}
	
	
}


?>