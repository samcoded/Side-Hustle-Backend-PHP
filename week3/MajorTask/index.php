

<?php 

	// 
include('process.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($con, "SELECT * FROM crudtable WHERE id=$id");
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$age = $n['age'];
			$username = $n['username'];
			$location = $n['location'];
			$profilepicture = $n['profilepicture'];
			
	

	}
?>

<html>
<head>
	<title>PROFILE DETAILS UPLOAD | SideHustle | CodedSAM </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="head">
Profile | SideHustle - CodedSAM (WEEK 3 MAJOR TASK)
</div>

<?php 
if(isset($_SESSION["msg"])) {?>
<?php 
echo $_SESSION["msg"];
unset($_SESSION["msg"]);
}?>
<?php 
if(isset($_SESSION["upload"])) {?>

<?php 
echo $_SESSION["upload"];
unset($_SESSION["upload"]);
}?>



<?php $results = mysqli_query($con, "SELECT * FROM crudtable"); ?>

<table>
	<thead>
		<tr>
			<th>Profile Picture</th>
			<th>Name</th>
			<th>Age</th>
			<th>Username</th>
			<th>Location</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<?php if (!$row['profilepicture']) {
				//Display default photo if user has no display photo
			echo'<td><div class="profilepic"> <img src="profilepics/default.jpg" alt="profile"></div></td>';
			} 
			else {
				//Display user photo stored in database
			 echo'<td><div class="profilepic"> <a href="profilepics/'.$row['profilepicture'].'" target="_blank"><img src="profilepics/'.$row['profilepicture'].'" alt="profile"></a></div></td>';
			}?>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['age']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['location']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>#update" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="process.php?del=<?php echo $row['id']; ?>" class="delete_btn" >Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<div id="update"></div>
<?php if ($update == true): ?>
			<div class="head">Update <?php echo $name; ?> profile</div>
		<?php else: ?>
			<div class="head">Add user profile</div>
		<?php endif ?>


<form method="post" action="process.php" enctype="multipart/form-data">

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div>
	<div class="input-group">
		<label>Age</label>
		<input type="text" name="age" value="<?php echo $age; ?>">
	</div>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Location</label>
		<input type="text" name="location" value="<?php echo $location; ?>">
	</div>
	<div class="input-group">
		<label>Profile Picture</label>
	<?php if ($update == true) { ?>
	
	<?php if (!$profilepicture) {
			//Display default photo if user has no display photo
			echo'<td><div class="profilepic"><img src="profilepics/default.jpg" alt="profile"></div></td>';
			} 
			else {
			//Display user photo stored in database
			 echo'<td><div class="profilepic"> <a href="profilepics/'.$profilepicture.'" target="_blank"><img src="profilepics/'.$profilepicture.'" alt="profile"></a></div></td>';
			}
		}?>
		<div class="info">
		Allowed video file extension: .jpg, .jpeg, .png, .gif <Br>
		Image size must not exceed 10mb
</div>
		<input type="file" name="pic" /></div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
	<div class="input-group">
		<?php if ($update == true): ?>
		<br> <a href="index.php">Add new user (Refresh page)</a></div>
		<?php endif ?>
</form>
</body>
</html>
