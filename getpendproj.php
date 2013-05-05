<?php
session_start();

// emp_code in $q
$q=$_GET["q"];
$_SESSION['project_no']=$q;
include "dbconnect.php";
//project status details
$sql="SELECT * FROM project_stages WHERE project_no = '".$q."'";
$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th bgcolor=\"#C3C3C3\">Project No</th>
<th bgcolor=\"#C3C3C3\">Status</th>
</tr>";



while($row = mysql_fetch_array($result))
  {
  
  //$projectno=$row['project_no'];
  $flag=$row['flag'];
  $row1=mysql_fetch_array(mysql_query("select description from stage_description where flag like '$flag'"));
  echo "<tr>";
  echo "<td bgcolor=\"#E8E8E8\">" . $row['project_no'] . "</td>";
  echo "<td bgcolor=\"#E8E8E8\">" . $row1['description']. "</td>";
  
  echo "</tr>";
  }
  
echo "</table>";

mysql_close();
?> 