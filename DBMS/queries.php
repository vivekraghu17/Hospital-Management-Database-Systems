<?php

$conn = mysqli_connect('localhost', 'root', '', 'hospital');
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql="SELECT Patient.PName, COUNT(LabReport.RId) AS NumberOfReports FROM LabReport
LEFT JOIN Patient ON LabReport.PId = Patient.PId
GROUP BY PName";
$result=mysqli_query($conn,$sql);
echo "<h3>1.Query to perform left join on Patient and lab reports</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>Pname</th>
<th>No of Reports</th>

</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    echo"<td>". $row[1]."</td>";

  echo "</tr>";
  }
echo "</table>";


$sql="SELECT PName,PAge,PGender FROM Patient INNER JOIN Inpatient ON Patient.PId = Inpatient.IPId";
$result=mysqli_query($conn,$sql);
echo "<h3>2.Query to perform inner join on Patient and Inpatient</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>Pname</th>
<th>Page</th>
<th>PGender</th>
</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    echo"<td>". $row[1]."</td>";
    echo"<td>". $row[2]."</td>";
  echo "</tr>";
  }
echo "</table>";

$sql="SELECT RoomNo from Room 
where RoomNo NOT IN (SELECT RoomNo FROM Inpatient)";
$result=mysqli_query($conn,$sql);
echo "<h3>3.List of rooms that are not allocated by inpatients</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>Room No</th>

</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    
  echo "</tr>";
  }
echo "</table>";





$sql="SELECT A.IPId AS IPId1, B.IPId AS IPId2, A.DateOfAdm
FROM Inpatient A, Inpatient B
WHERE A.IPId <> B.IPId
AND A.DateOfAdm = B.DateOfAdm 
ORDER BY A.DateOfAdm";
$result=mysqli_query($conn,$sql);
echo "<h3>4.InPatients joining on same day</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>IPId</th>
<th>DateOfAdm</th>
</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    echo"<td>". $row[2]."</td>";
    echo "</tr>";
  }
echo "</table>";






$sql="SELECT P.PName AS 'Patient',
       D.DName AS 'Doctor',
       B.TotalCharge AS 'TotalCharge'
FROM Patient P
JOIN Consults C ON C.PId=P.PId
JOIN Doctor D ON C.DId=D.DId
JOIN Bill B ON B.PId=P.PId
WHERE B.TotalCharge>50000";
$result=mysqli_query($conn,$sql);
echo "<h3>5.List the patient details who had total charge more than 50,000 and the name of associated doctor</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>Patient</th>
<th>Doctor</th>
<th>TotalCharge</th>

</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    echo"<td>". $row[1]."</td>";
	    echo"<td>". $row[2]."</td>";

    echo "</tr>";
  }
echo "</table>";



$sql="SELECT NId ,NName
FROM Nurse 
WHERE NId NOT IN (SELECT NId FROM Assigned WHERE RoomNo='R2A')";
$result=mysqli_query($conn,$sql);
echo "<h3>6. List Nurses who have never been assigned to room R2A</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>Nid</th>
<th>Nurse Name</th>

</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
    echo"<td>". $row[1]."</td>";
	    
    echo "</tr>";
  }
echo "</table>";


$sql="SELECT DId from CheckedBy , LabReport WHERE CheckedBy.RId = LabReport.RId and LabReport.PId='p3'";
$result=mysqli_query($conn,$sql);
echo "<h3>7.Returs Doctor id from lab report where patient id=p3</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>Did</th>

</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
      
    echo "</tr>";
  }
echo "</table>";


$sql="select Dname from Doctor where DId in(select DId from Consults where PId in (select PId from Patient where PAge>40) );
";
$result=mysqli_query($conn,$sql);
echo "<h3>8.Doctors eho treat patient above 40 years of age</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>Dname</th>

</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
      
    echo "</tr>";
  }
echo "</table>";


$sql="select Pname from Patient where PId in(select PId from labreport where Ptype='BloodTest' and RAmount>1000)";
$result=mysqli_query($conn,$sql);
echo "<h3>9.Patients who fot bloodtest and as lab amount above 1000</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>Pname</th>

</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
      
    echo "</tr>";
  }
echo "</table>";


$sql="select * from Nurse JOIN Assigned where Nurse.NId=Assigned.NId";
$result=mysqli_query($conn,$sql);
echo "<h3>10.Join operation on Nurse and Assigned</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>NId</th>
<th>Name</th>
<th>Salary</th>
<th>Room number</th>
<th>Adate</th>
<th>Shift</th>

</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[5] . "</td>";
    echo "<td>" . $row[6] . "</td>";
  
    echo "</tr>";
  }
echo "</table>";


$sql="select * from Nurse JOIN Assigned where Nurse.NId=Assigned.NId";
$result=mysqli_query($conn,$sql);
echo "<h3>10.Join operation on Nurse and Assigned</h3><br>";
echo "<table border='1' id= results>
<tr>
<th>NId</th>
<th>Name</th>
<th>Salary</th>
<th>Room number</th>
<th>Adate</th>
<th>Shift</th>

</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[5] . "</td>";
    echo "<td>" . $row[6] . "</td>";
  
    echo "</tr>";
  }
echo "</table>";

$sql="select Quantity from MedicinesPrescribed where PId in (
select PId from Consults where Consults.DId in (
select DId from Doctor where Dname ='Ned'))";
$result=mysqli_query($conn,$sql);
echo "<h3>11.Quantity of Medicines given by a doctor named Ned to all the patients </h3><br>";
echo "<table border='1' id= results>
<tr>
<th>Quantity</th>


</tr>";



while($row = mysqli_fetch_array($result))
  {


  echo "<tr>"; 

    echo "<td>" . $row[0] . "</td>";
        
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