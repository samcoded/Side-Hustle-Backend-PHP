<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sidehustle";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection 
if(mysqli_connect_errno()){
echo "Error in connection!".mysqli_connect_error();
exit();
}
echo "Connected successfully";

?>
