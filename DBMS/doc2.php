<?php
$conn=mysqli_connect("localhost","root","","hospital");
if(!$conn)
{
echo mysqli_error();
echo ("CONNECTION ERROR");
}


extract($_POST);
$username=$_POST['user'];
$password=$_POST['pass'];
$sql="SELECT * from logindetails where username='$username' AND password='$password'";
$results=mysqli_query($conn,$sql);

if(mysqli_num_rows($results)==1)
{
	echo("<center>");
	echo("Logged in succesfully");
	echo("<br/><br/>");
	echo("<a href='admin.html'>Click here to continue</a>");
	echo("</center>");
}
else
{
	echo("<center>");
echo("Login Unsuccesfull");
}
?>