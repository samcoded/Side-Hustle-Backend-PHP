<?php 

echo "<h1>USERNAME AND PASSWORD GENERATOR BY CodedSAM</h1>";

//*****Program to display usernames and passwords****//

function CreateUser()
{
$names = array("Micheal","Chika","Yakubu","Bola","Josephine");
//Username values

$passwords = array("qwe","rty","uio","pas","dfg");
//Password headers values


$errormsg = "not allowed (Username must not exceeed 8 characters)";
//Error messages for unallowed characters

function RandNum3()
{
$randnum="";
for ($i=0; $i < 3; $i++) 
{
$randnum.= rand (0,9);
}
return $randnum;
}
//Function to generate random 3 digits

foreach ($names as $index => $user)
{
if (strlen($user) < 6) 
//Sort Usernames lower than 6
{
$newuser[$index]=$user.RandNum3();
//add 3 random digits to Username
}

if (strlen($user) >= 6 && strlen($user) <= 8)
//Username between 6 and 8
{
$newuser[$index]=$user;
}

if (strlen($user) > 8) 
//Username greater than 8
{
echo "<font color='red'>Error</font> <b>".$user."</b> ".$errormsg."<br><br>";
//Display error
}

}

foreach ($passwords as $index => $pass)
{
$newpass[$index]=$pass.RandNum3().$pass;
}

$arrlength = count($newuser);

for($x = 0; $x < $arrlength; $x++) 
{

echo "<b>Username:".$newuser[$x]."<br>Password:".$newpass[$x]."</b><br><br>";
// Display user details
} 
}

CreateUser();
// Execute function 

?>
