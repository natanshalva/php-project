<?php session_start();?>
<?php

define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASENAME', 'kindergarden');

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
		<title>kindergarden </title>
		<style>
			body {
				font-size: 25px;
			}
			#menu {
				border: 2px solid;
				width: 20%;
				float: left;
			}
			#re {
				border: 2px solid;
				width: 69%;
				float: left;
				min-height: 200px;
				padding: 20px;
			}
		</style>
	</head>
	<body>
		<?php

		// store session data

		print_r($_SESSION);
		//$expire=time()+60*60*24*30;
		//setcookie("user", "this is the value", $expire);

		//echo $_COOKIE["user"];
		?>
		<h3>kindergarden </h3>
		<?php

		$var = 3;

		switch ($var) {
			case '1' :
				echo 1;
				break;

			case '2' :
				echo 2;
				break;

			case '3' :

			      $var += 100000 ;
				echo $var;
				break;
			default :
				echo "there is no var mach";
				break;
		}
		?>
	</body>
</html>
<?php
//session_destroy();
// 5 close connection
mysql_close($connection);
?>