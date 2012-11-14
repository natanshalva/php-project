<?php

require_once ('config.php');

function dbConnect() { // connect and select DB
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or die('Could not connect to database.' . mysqli_error($connection));
	$connection -> select_db(DB_NAME) or die('Could not select database. ' . mysqli_error($connection));
	return $connection;
}

function dbQuery($query) { // perform a query
	$connection = dbConnect();
	$result = $connection -> query($query) or die('Failed to query database.' . mysqli_error($connection));
	$connection -> close();
	return $result;
}

function dbSelect($columns, $tables, $where_arr = array()) { // selects stuff from DB
	if (is_array($columns)) {
		$columns = explode(" , ", $columns);
	}
	if (is_array($tables)) {
		$tables = explode(" , ", $tables);
	}
	$query = "SELECT" . " " . $columns . " ";
	$query .= "FROM" . " " . $tables . " ";
	if ($where_arr != NULL) {
		$where = whereEquals($where_arr);
		if ($where != FALSE) {
			$query .= "WHERE" . " " . $where . " ";
		} else {
			
		}
		
	}
	echo $query;
	$result = dbQuery($query);
	return $result;
}

function whereEquals($where) { // converts two arrays to comparisons, or creates a single comparison
	$result = "";
	if (is_array($where)) {
		$keys = array_keys($where);
		foreach ($where as $key => $value) {
			if(is_string($key)) {
				$result .= "" . $key . "" . " = ";
				if(is_numeric($value)) {
					$result .= "" . $value . "";
				} else {
					$result .= "'" . $value . "'";
				}
				if ((false !== ($p = array_search($key, $keys)) && ($p < count($keys) - 1))) {
					$result .= " AND ";
				} else {
					$result .= "";
				}
				
			} else {
				return false;
			}
			
		}
	}
	return $result;
}
