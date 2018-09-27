<?php

echo("<body bgcolor='blue'>");
$conn = mysqli_connect('localhost', 'root', '', 'hospital');
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}


extract($_POST);
$did=$_POST['id'];
$name=$_POST['name'];
$dept=$_POST['gender'];
$gender=$_POST['age'];
$salary=$_POST['card'];
$type=$_POST['prob'];
$typew=$_POST['weight'];


$sql="insert into patient values('$did','$name','$dept','$gender','$salary','$type','$typew')";
$results=mysqli_query($conn,$sql);
echo"<center>";
echo "<table border='1' id= results>
<tr>
<th>PATIENTID</th>
<th>PATIENTNAME</th>
<th>GENDER</th>
<th>AGE</th>
<th>HEALTHCARD</th>
<th>PROBLEM</th>
<th>WEIGHT</th>
</tr>";

$sql="SELECT * FROM patient";
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
	echo"<td>", $row[6] ,"</td>";
    
  echo "</tr>";
  }
echo "</table><br><br><br><br><br><br><br><br>";

echo"<button><a href='insertpat.php'>Insert Patient</a></button>";

echo"</center>";
?>