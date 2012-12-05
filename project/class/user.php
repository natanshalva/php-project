<?php

// this is class user
require_once 'db.php';

class User {

	public $name;
	public $family;
	public $username;
	public $pass;
	public $email;
	public $status;
	public $level;

	public function user_veri() {
	global $db;
         
		$sql = " SELECT * FROM user WHERE name='" . $this->name . "' AND pass='". $this->pass . "' ";
        
		$db = new db;
		
		$result = $db->query($sql);
			while ($row = mysql_fetch_assoc($result)) {
                print_r($row);
				//die("very good");
				//die(print_r($row));
				
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['username'] = $row['username'];
				
  				 return TRUE;
			}					
		 return FALSE;

	} // end of user_veri 

}
?>