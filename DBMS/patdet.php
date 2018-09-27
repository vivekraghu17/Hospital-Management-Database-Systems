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

echo("<h3> Query to display the detials of all inpatients</h3>");

$sq="select PName,PAge,PGender from patient inner join inpatient on patient.PId=inpatient.IPId";
$res=mysqli_query($conn,$sq);


echo"";
echo "<table border='1' id= results>
<tr>
<th>PATIENTNAME</th>
<th>GENDER</th>
<th>AGE</th>
</tr>";

while($ro = mysqli_fetch_array($res))
  {


  echo "<tr>"; 

    echo "<td>" . $ro[0] . "</td>";
    echo"<td>". $ro[1]."</td>";
    echo"<td>". $ro[2]."</td>";
    
    
  echo "</tr>";
  }
echo "</table>";


echo("<h3> Query to display the no of labreports </h3>");

$s="select patient.pname,count(labreport.rid) as numberofreports from labreport left join patient on labreport.pid=patient.pid
group by pname";

$res=mysqli_query($conn,$s);


echo"";
echo "<table border='1'>
<tr>
<th>PATIENTNAME</th>
<th>Number of Reports</th>
</tr>";

while($ro = mysqli_fetch_array($res))
  {


  echo "<tr>"; 

    echo "<td>" . $ro[0] . "</td>";
    echo"<td>". $ro[1]."</td>";
    
  echo "</tr>";
  }
echo "</table>";


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