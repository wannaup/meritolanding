<?php


$firstName=$lastName="";
$firstNameErr=$lastNameErr="";

// Validate input and sanitize
if (!$_SERVER['REQUEST_METHOD']== "POST") 
   die();
if (empty($_POST["name"])) 
	die();
if (empty($_POST["email"])) 
   die();

   

// connect
$m = new MongoClient();

// select a database
$db = $m->merito_subscribes;

// select a collection (analogous to a relational database's table)
$collection = $db->users;

// add a record
$document = array( "name" => test_input($_POST["name"]), "email" => test_input($_POST["email"]) );
$collection->insert($document);

echo 'OK'
// Sanitize data
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   $data = str_replace('$','',$data);
   return $data;
}

?>