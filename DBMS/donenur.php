<?php

$conn = mysqli_connect('localhost', 'root', '', 'hospital');
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}


extract($_POST);
$did=$_POST['id'];
$name=$_POST['name'];
$dept=$_POST['salary'];
$sql="insert into nurse values('$did','$name','$dept')";
$results=mysqli_query($conn,$sql);
echo "<center>";
echo "<table border='1' id= results>
<tr>
<th>NURSEID</th>
<th>NURSENAME</th>
<th>SALARY</th>
</tr>";

$sql="SELECT * FROM nurse";
$result=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    echo"<td>". $row[1]."</td>";
    echo"<td>". $row[2]."</td>";

  echo "</tr>";
  }
echo "</table><br><br><br><br><br><br><br><br>";

echo"<button><a href='insertNUR.php'>Insert Nurse</a></button>";

echo"</center>";
?>

<html>
<style>
body{
	background-color:yellow;
}
</style>
<body>
</body>
</html>