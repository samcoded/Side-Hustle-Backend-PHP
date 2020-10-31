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
	
    // Allowed file extension for profile photo
	$allowedpicext = array("jpg", "png", "jpeg", "gif", "JPG", "JPEG", "PNG", "GIF");
	//maximum allowed filesize for profile photo 5mb
	$maxpicsize = 5 * 1024 * 1024;

	//For Insert
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$location = $_POST['location'];
		
		//Profile photo insert
		if(isset($_FILES['pic'])) {
			if (file_exists($_FILES['pic']['tmp_name']) || is_uploaded_file($_FILES['pic']['tmp_name'])) {
			$ext = explode('.', basename($_FILES['pic']['name']));
			$file_extension = end($ext);
			//generate Name for the image: 
			$profilepicname = 'profile_'.rand(100000,900000).'.'.$file_extension;
			$target_path = $profilepicname;
		
			if (($_FILES['pic']['size'] > $maxpicsize )){ 
				//allowed filesize error
				$_SESSION['upload']='<div class="infored">Error while uploading profile picture: Profile Image size exceeds 5mb</b></div>'; }
			else {
			if(in_array($file_extension, $allowedpicext)){
			if(move_uploaded_file($_FILES['pic']['tmp_name'], "profilepics/".$profilepicname)){
				//upload profile photo and add to database
			$newprofilepicname=$profilepicname;
			$_SESSION['upload']='<div class="msg">Profile picture uploaded</div>';
		}
			else { 
				//error uploading
				$_SESSION['upload']='<div class="infored">Error while uploading profile picture: '.$_FILES['pic']['error'].'</div>'; }}
			else {
				//file extension error
				$_SESSION['upload']='<div class="infored">Error while uploading profile picture: Image file extension not allowed (Allowed: .jpg, .jpeg, .png, .gif)</div>'; }}}}
				
		mysqli_query($con, "INSERT INTO crudtable (name, age, username, location, profilepicture ) VALUES ('$name', '$age', '$username', '$location', '$newprofilepicname')");
		$_SESSION["msg"]="<div class='msg'>User details saved</div>"; 
		header('location: index.php');
	}

		//For Update
	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$username = $_POST['username'];
		$location = $_POST['location'];

		//Profile photo update
		if(isset($_FILES['pic'])) {
			if (file_exists($_FILES['pic']['tmp_name']) || is_uploaded_file($_FILES['pic']['tmp_name'])) {
			$ext = explode('.', basename($_FILES['pic']['name']));
			$file_extension = end($ext);
			//generate Name for the image: 
			$profilepicname = 'profile_'.rand(100000,900000).'.'.$file_extension;
			$target_path = $profilepicname;
		
			if (($_FILES['pic']['size'] > $maxpicsize )){ 
				//allowed filesize error
				$_SESSION['upload']='<div class="infored">Error while uploading profile picture: Profile Image size exceeds 5mb</b></div>'; }
			else {
			if(in_array($file_extension, $allowedpicext)){
			if(move_uploaded_file($_FILES['pic']['tmp_name'], "profilepics/".$profilepicname)){
				//upload profile photo and update database
			mysqli_query($con, "UPDATE crudtable SET profilepicture='$profilepicname' WHERE id=$id");
			$_SESSION['upload']='<div class="msg">Profile picture uploaded</div>';
		}
			else { 
				$_SESSION['upload']='<div class="infored">Error while uploading profile picture: '.$_FILES['pic']['error'].'</div>'; }}
			else {
			//file extension error
                $_SESSION['upload']='<div class="infored">Error while uploading profile picture: Image file extension not allowed (Allowed: .jpg, .jpeg, .png, .gif)</div>'; }}}}
                
		mysqli_query($con, "UPDATE crudtable SET name='$name', age='$age', username='$username', location='$location' WHERE id=$id");
		$_SESSION["msg"]="<div class='msg'>User details updated</div>"; 
		header('location: index.php');
	}
	//For Delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($con, "DELETE FROM crudtable WHERE id=$id");
	$_SESSION["msg"]="<div class='infored'>User details deleted</div>"; 
	header('location: index.php');
}


?>
