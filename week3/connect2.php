<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sidehustle";

	//create connection
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully"; 
} 

//check connection
catch(PDOException $e) {
  echo "Error in connection: " . $e->getMessage();
}

?>