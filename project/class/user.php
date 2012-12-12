<?php 

// this is class user
require_once 'db.php';

class User {

	public $name;
	public $family;
	public $username;
	public $pass;
	public $email;
	public $status = 0;
	public $level = 1;
	public $token;

	public function user_veri() {
		global $db;

		$pass_hash = sha1($this -> pass);

		$sql = " SELECT * FROM user WHERE name='" . $this -> name . "' AND pass='" . $pass_hash . "' ";

		$db = new db;

		$result = $db -> query($sql);
        
        $test = $this->test_result_form_db($result);

		return $test;

	}// end of user_veri

	// get all the parms and insert in to the db
	public function user_insert_to_db() {

		$sql = "INSERT INTO user ( name , family, username, email, pass, level , status , token )
                VALUES ( '$this->name' , '$this->family' , '$this->username' , '$this->email' , '$this->pass' , '$this->level' , '$this->status' , '$this->token' ) ";

		$db = new db();
		$result = $db -> query($sql);
		if ($result) {
			return true;
		}

	}

	public function first_log_in() {
			global $db;
			
		if (isset($_GET['token'])) {
			$token = $_GET['token'];
				
			$sql = "SELECT * FROM user WHERE token='{$token}' ";
			$result = $db->query($sql);

			$test = $this->test_result_form_db($result);
			
			
			
			return $test ;
		}
		
	}

	private function test_result_form_db($result = '') {
		//var_dump($result);
		while ($row = mysql_fetch_assoc($result)) {
			
			//die("very good");
			//die(print_r($row));

			$_SESSION['id'] = $row['id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['username'] = $row['username'];

			return TRUE;
		}
		return FALSE;
	}

} // end of class
?>