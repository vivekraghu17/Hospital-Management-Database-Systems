<?php
SESSION_START();

$conn=mysqli_connect("localhost","root","","hospital");
if(!$conn)
{
echo mysqli_error();
echo ("CONNECTION ERROR");
}
echo"<center>";
echo "<table border='1' id= results>
<tr>
<th>NURSEID</th>
<th>NURSENAME</th>
<th>SALARY</th>
</tr>";

$sql="SELECT * FROM room";
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

echo"<button><a href='insertroom.php'>Insert New Rooms </a></button>";

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