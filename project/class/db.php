<?php
    class db
    {
    	public $server = "localhost";
		public $username = "root";
		public $password = "";
		public $db = "communities";
		
		public $connection;
		public $last_query;
		
		
		
		public function __construct()
		{
			$this->open_connection_db();
			
			
		}
		
		public function open_connection_db ($value='')
		{
			$this->connection = mysql_connect($this->server,$this->username,$this->password);
			if (!$this->connection)
			{
				exit ('database connction failed' . mysql_error());
			}
			
			$db = mysql_select_db($this->db , $this->connection);
			if (!$this->db)
			{
				exit ("can't connect to db: " . mysql_error());
			}
		}
		
		public function close_connection_db()
		{
			if ($this->connection)
			{
				mysql_close($this->connection);
				unset($this->connection);      //erases the data from variable
			}
			// session_destroy();
		}
		
		public function query($sql)
		{
			#we want to know what is the last query we used
			$this->last_query = $sql;
			//die("ss");
			$result = mysql_query($sql);
			if (!$result)
			{
				exit("the sql query failed" . mysql_error());
			}
			return $result;
		}
		
    }//end of class db
	
	$db = new db();
	
	echo $db->last_query;           //we put this on the end of the html page, before disconnecting
					//uses the constract also. constract can influence attributes!
	
?>