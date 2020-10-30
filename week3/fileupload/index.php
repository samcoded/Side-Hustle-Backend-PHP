<html>
<head>
	<title>FILE UPLOADER - SideHustle - CodedSAM </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="head">
File Uploader | SideHustle - CodedSAM
</div>
<?php
if(isset($_FILES['file'])) 
{ 
// Allowed file extension 
$allowedext = array("avi", "3gp", "mp4");

$ext = explode('.', basename($_FILES['file']['name']));

$file_extension = end($ext);

//generate Name for the image: 
$videoname = "video_".rand(100000,900000).".".$file_extension;

$target_path = $videoname;

//maximum allowed filesize
$maxsize = 5 * 1024 * 1024;


if (($_FILES["file"]["size"] > $maxsize ))
{
	//allowed filesize error
	echo '<div class="infored">Error: File size exceeds 5mb</div>';
}
else 
{
if(in_array($file_extension, $allowedext))
{
if (move_uploaded_file($_FILES['file']['tmp_name'], "videos/".$videoname))
{
	echo '<div class="msg">Video successfully uploaded (<a href="videos/'.$videoname.'" class="href">'.$videoname.'</a>)</div>'; 
}
else {
	echo '<div class="infored">Error: '.$_FILES['file']['error'].'</div>';
}

}

else 
{
	//file extension error
	echo '<div class="infored">Error: '.$file_extension.' file extension not allowed</div>';
}
}
}
?>


<form action="" method="POST" enctype="multipart/form-data"> 

<div class="info">
Allowed video file extension: .avi, .3gp, .mp4 <Br>
File size must not exceed 5mb
</div>

<div class="input-group">
<input type="file" name="file" /></div>

<div class="input-group">
<button class="btn" type="submit" name="submit" style="background: #556B2F;" >Upload</button></div>

</form>

</body>
</html>