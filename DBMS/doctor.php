<?php
session_start();
$name=$_SESSION['a'];
$id=$_SESSION['b'];
echo("<h1><center>Welcome {$name}</center></h1>");

$conn=mysqli_connect("localhost","root","","Hospital");
if(!$conn)
{
echo mysqli_error();
echo ("CONNECTION ERROR");
}
echo "<table border='1' id= results>
<tr>
<th>PATIENTID</th>
<th>PATIENTNAME</th>
<th>GENDER</th>
<th>AGE</th>
<th>HEALTH CARD</th>
<th>PROBLEM</th>
<th>WEIGHT</th>

</tr>";

$sql="SELECT * FROM patient where patient.pid=consults.pid and consult.did=doctor.'$id' ";
$result=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    echo"<td>". $row[1]."</td>";
    echo"<td>". $row[2]."</td>";
        echo"<td>". $row[3]."</td>";
    echo"<td>". $row[4]."</td>";
    echo"<td>". $row[5]."</td>";
    echo"<td>". $row[6]."</td>";

  echo "</tr>";
  }
echo "</table><br><br><br><br><br><br><br><br>";







?>