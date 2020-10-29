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
	

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: Create, Update, Delete in PHP and MySQL </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
<?php 
if(isset($_SESSION["msg"])) {?>
<div class="msg">
<?php 
echo $_SESSION["msg"];
unset($_SESSION["msg"]);
}?>
 </div>


<?php $results = mysqli_query($con, "SELECT * FROM crudtable"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Age</th>
			<th>Username</th>
			<th>Location</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['age']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['location']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="process.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="process.php" >

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

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>