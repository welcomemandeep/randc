<?php
session_start();
// emp_code in $q
$q=$_GET["q"];
$_SESSION['empcode_admin']=$q;
include "dbconnect.php";
//edit user 
$sql="SELECT * FROM personalinfo WHERE emp_code = '".$q."'";
$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th bgcolor=\"#C3C3C3\">Name</th>
<th bgcolor=\"#C3C3C3\">Gender</th>
<th bgcolor=\"#C3C3C3\">Department</th>
<th bgcolor=\"#C3C3C3\">Emp code</th>
<th bgcolor=\"#C3C3C3\">Designation</th>
<th bgcolor=\"#C3C3C3\">Email Id</em></th>
<th bgcolor=\"#C3C3C3\">Password</em></th>
<th bgcolor=\"#C3C3C3\">Flag</em></th>
<th bgcolor=\"#C3C3C3\">Administrator</th>
</tr>";



while($row = mysql_fetch_array($result))
  {
  
  $empcode=$row['emp_code'];
  $row1=mysql_fetch_array(mysql_query("select * from logintable where emp_code like '$empcode'"));
  echo "<tr>";
  echo "<td bgcolor=\"#E8E8E8\">" . $row['name'] . "</td>";
  echo "<td bgcolor=\"#E8E8E8\">" . $row['gender'] . "</td>";
  echo "<td bgcolor=\"#E8E8E8\">" . $row['department'] . "</td>";
  echo "<td bgcolor=\"#E8E8E8\">" . $row['emp_code'] . "</td>";
  echo "<td bgcolor=\"#E8E8E8\">" . $row['designation'] . "</td>";
  echo "<td bgcolor=\"#E8E8E8\">" . $row['email'] . "</td>";
  
  echo "<td bgcolor=\"#E8E8E8\">" . $row1['password'] . "</td>";
  echo "<td bgcolor=\"#E8E8E8\">" . $row1['flag'] . "</td>";
  if($row1['flag']==1)
    echo "<td bgcolor=\"#E8E8E8\">Yes</td>";
  else 
    echo "<td bgcolor=\"#E8E8E8\">No</td>";
  echo "</tr>";
  }
  
echo "</table>";

mysql_close();
?> 