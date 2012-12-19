<?php

require_once '/class/db.php';
require_once '/class/user.php';
echo $db -> last_query;

$user = new User;
$user -> first_log_in();

require './pages/html/header.php';

// xml 

if($_POST['getxml']){
	
	 $xml = simplexml_load_file('test.xml');
	 
	// print_r($xml);
	 
	// $firstname = $xml->FullName->FirstName;
	 
//	 var_dump($xml);
	 
	 function toArray($xml) {
        $array = json_decode(json_encode($xml), TRUE);
        
        foreach ( array_slice($array, 0) as $key => $value ) {
            if ( empty($value) ) $array[$key] = NULL;
            elseif ( is_array($value) ) $array[$key] = toArray($value);
        }

        return $array;
    }
	 
	
	$t = toArray($xml);
	print_r($t); 
	 
}



?>
<div class="message">
	<?php
	if (isset($_SESSION['message'])) {
		print $_SESSION['message'];
		session_unset($_SESSION['message']);
	}
	?>
</div>
<div id="main">
	<header>
		<h1>Title</h1>
	</header>
	<div id="content">
		<form action="" method="post">
			<input type="submit" name="getxml" value="get xml"/>
			
		</form>
	</div>
</div>
<?php

require 'pages/html/footer.php';
?>

