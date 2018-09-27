<?php


$conn = mysqli_connect('localhost', 'root', '', 'hospital');
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}


extract($_POST);
$did=$_POST['id'];
$name=$_POST['name'];
$dept=$_POST['dep'];
$gender=$_POST['gender'];
$salary=$_POST['salary'];
$type=$_POST['type'];


$sql="insert into doctor values('$did','$name','$dept','$gender','$salary','$type')";
$results=mysqli_query($conn,$sql);
echo"<center>";
echo "<table border='1' id= results>
<tr>
<th>DOCTORID</th>
<th>DOCTORNAME</th>
<th>DOCTORDEPARTMENT</th>
<th>GENDER</th>
<th>SALARY</th>
<th>Type</th>
</tr>";

$sql="SELECT * FROM doctor";
$result=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    echo"<td>". $row[1]."</td>";
    echo"<td>". $row[2]."</td>";
    echo"<td>". $row[3] ."</td>";
	echo"<td>". $row[4] ."</td>";
	echo"<td>". $row[5] ."</td>";
    
  echo "</tr>";
  }
echo "</table><br><br><br><br><br><br><br><br>";

echo"<button><a href='insertdoc.php'>Insert Doctor</a></button>";

echo"</center>";
?>

