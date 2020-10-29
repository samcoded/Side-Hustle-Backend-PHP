<?php 
	include 'connect.php';
	session_start();

	// initialize variables
	$name = "";
	$age = "";
	$username = "";
	$location = "";
	$id = 0;
	$update = false;
	//For Insert
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$location = $_POST['location'];

		mysqli_query($con, "INSERT INTO crudtable (name, age, username, location) VALUES ('$name', '$age', '$username', '$location')");
		$_SESSION["msg"]="User details saved"; 
		header('location: index.php');
	}

		//For Update
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$location = $_POST['location'];

		mysqli_query($con, "UPDATE crudtable SET name='$name', age='$age', username='$username', location='$location' WHERE id=$id");
		$_SESSION["msg"]="User details updated"; 
		header('location: index.php');
	}
	//For Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM crudtable WHERE id=$id");
	$_SESSION["msg"]="User details deleted"; 
	header('location: index.php');
}


?>