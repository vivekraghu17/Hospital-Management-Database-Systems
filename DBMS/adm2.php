<?php
SESSION_START();

$conn=mysqli_connect("localhost","root","","Hospital");
if(!$conn)
{
echo mysqli_error();
echo ("CONNECTION ERROR");
}


extract($_POST);
$username=$_POST['user'];
$password=$_POST['pass'];
$sql="SELECT * from logindetails where username='$username' AND password='$password'";
$sql2="SELECT did from doctor where dname='$username'";
$answer=mysqli_query($conn,$sql2);
$r=mysqli_fetch_row($answer);
$results=mysqli_query($conn,$sql);
$_SESSION['a']=$username;
$_SESSION['b']=$r[0];
//echo ($results);

if(mysqli_num_rows($results)==1)
{
	$sql = "SELECT * from logindetails where username='$username' AND password='$password'";
	$result=mysqli_query($conn,$sql);
	$r=mysqli_fetch_row($result);
		if($r[0] == 'admin'){
			$sql = "SELECT name from logincredentials where id='$uid'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_row($result);
			echo("<center>");
			echo ("<h1 style='font-size:40px;font-family:Courier New'>Welcome ");
			echo ($row[0]);
			echo ("</h1>");
			echo("<br/><br/>");
			echo("<a href='doctor.php'><img src='doctor.jpg' width='400px' height='300px'></a>");
			echo("<a href='patient.php'><img src='patient.jpg' width='400px' height='300px'></a><br>");
			echo("<a href='nurse.php'><img src='nurse.png' width='400px' height='300px'></a>");
			echo("<a href='room.php'><img src='room.jpg' width='400px' height='300px'></a>");
			echo("</center>");
		}
		if($r[0] == 'nurse'){
			$sql = "SELECT name from logincredentials where id='$uid'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_row($result);
			echo("<body background='nurse1.jpg' style='background-repeat: no-repeat;'>");
			echo("<center>");
			echo ("<h1 style='font-size:40px;font-family:Courier New'>Welcome ");
			echo("<a href='mynursedetails.php' style='text-decoration: none;'>");
			echo ($row[0]);
			echo("</a>!");
			echo ("</h1>");
			echo("<br/><br/>");
			$sql = "SELECT adate , shift , roomno from assigned where nid='$uid' order by adate desc";
			$result = mysqli_query($conn,$sql);
			echo ("<table border='1'>");
			echo("<tr>");
			echo("<th>Date</th>");
			echo("<th>Shift</th>");
			echo("<th>RoomNo</th>");
			echo("</tr>");
			while($ro = mysqli_fetch_row($result)){
				echo("<tr>");
				echo("<td>$ro[0]</td>");
				echo("<td>$ro[1]</td>");
				echo("<td>$ro[2]</td>");
				echo("</tr>");
			}
			echo("</table>");
			echo("</body>");

		}
		else if($r[2] == 'doctor'){
			echo("<body background='doctor1.png' style='background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;'>");
			echo("<center>");
			$sql = "SELECT name from logincredentials where id='$uid'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_row($result);
			echo ("<h1 style='font-size:40px;font-family:Courier New'>Welcome ");
			echo("<a href='mydocdetails.php' style='text-decoration: none;'>");
			echo ($row[0]);
			echo("</a>!");
			echo ("</h1>");
			echo("<br/><br/>");echo("<br/><br/>");echo("<br/><br/>");
			$sql = "SELECT pid,pname,gender,age,healthcard,problem,weight from patient , consults where pid = patid and docid='$uid'";
			$result = mysqli_query($conn,$sql);
			echo ("<table border='1'>");
			echo("<tr>");
			echo("<th>Patient Id</th>");
			echo("<th>Patient Name</th>");
			echo("<th>Gender</th>");
			echo("<th>Age</th>");
			echo("<th>Health Card</th>");
			echo("<th>Problem</th>");
			echo("<th>Weight</th>");
			echo("</tr>");
			while($ro = mysqli_fetch_row($result)){
				echo("<tr>");
				echo("<td>$ro[0]</td>");
				echo("<td>$ro[1]</td>");
				echo("<td>$ro[2]</td>");
				echo("<td>$ro[3]</td>");
				echo("<td>$ro[4]</td>");
				echo("<td>$ro[5]</td>");
				echo("<td>$ro[6]</td>");
				echo("</tr>");
			}
			echo("</table>");			
			echo("</center>");
			echo("</body>");

		}
}
else
{
	echo("<center>");
	echo("Login Unsuccesfull");
	echo("<br/><br/>");
	echo("<a href='login.html'>Click Here To try again!</a>");
	echo("<br/><br/>");
	echo("<a href='signup.html'>New User ?</a>");
	echo("</center>");
}
?>
