<?php 

##########################
#
# This is Family class. This class deals with all the family matters.
##########################
 
/**
	 * This is Family class, This class deals with all the family matters.
	 *
	 * @package default
	 * @author Israel 
	 */
 class Family {
	
	
	
	
	function print_all_families($connection = NULL){
	
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
				
	}

	function get_all_families_from_one_society($familiesbysociety , $connection){
	
					
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
			
}  // END of class	
 


?>