<?php 

// 1 - database connection
function database_connect(){
$connection = mysql_connect(SERVER, USERNAME, PASSWORD);

# for developemnt use
//var_dump($connection);
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
	# We return connection resource because we use it later
	return $connection;
}

 

function n_query($query, $connection) {


	$result = mysql_query($query, $connection);

	if (!$result) {
		die("Query did not work " . mysql_error());
	}
	return $result;
}

# this function includes all the validation actions before getting user input 
function input_validation(){
	
	
	# if we have post data than we validate it
	if($_POST){
			
		# since post is array we are looping through all the value
		# in the array
		
		$validated_post = array();
			
		foreach($_POST as $key => $value){
			
			
			
			# Lets make sure we have no capital letters
			$validated_post[$key] = strtolower($value);
			# the eco is for development only
			# we want to see the effect
			// echo "strtolower:" . $validated_post[$key] . "<br />";
			
			# Lets make sure that there no more than 20 characters
			if(strlen($value) > 40){
				echo "Too many characters";
				return FALSE;
			}
			
			# Lets make sure we have no html tags
			$validated_post[$key] = strip_tags($validated_post[$key]);
			# the eco is for development only
			# we want to see the effect
			// echo "strip_tags:" . $validated_post[$key] . "<br />";
			
			# Lets make sure that there is no white space in the beginning
			# and in the end
			$validated_post[$key] = trim($validated_post[$key]);
			# the eco for development only
			# we want to see the effect
			//echo "trim:" . $validated_post[$key] . "<br />";
				
			
		}
		# the eco for development only
		# we want to see the effect
		//print_r($validated_post);
	
	# We returned array with the validated values
	return $validated_post;
	} 
} # END OF FUCNTION




?>