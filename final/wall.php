<?php
session_start();
include "dbconnect.php";
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

//access rules 

//access rules 


//$emp_code=$_SESSION['emp_code'];

 
 mysql_query("Update consultancy.notify set flag=\"1\" where emp_code like '$emp_code' and flag like '0'");


?>

<!DOCTYPE HTML>
<html>

<head>

<title>Wall page</title>
</head>
<body>
  <?php 
  include "inctop.php";
  ?>
        <!-- insert the page content here -->
  <p align="left">
      <table width="625" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <th colspan="3" align="left">Your Notifications......</th>
  </tr>
  <?php 
  
  
  $wall_query=mysql_query("Select * from notify where emp_code like '$emp_code' order by time desc");
  if($wall_query)
  while($wall_array=mysql_fetch_array($wall_query))
  {
	  if($wall_array['flag'])
	  	{	echo "<tr id='redtext' >
    		<td width=\"79\">".$wall_array['project_no']."</td>
    		<td width=\"494\"><strong>".$wall_array['message']."</strong></td>
    		<td width=\"42\">".$wall_array['time']."</td>
    	    </tr>";
		}
		else
		{
			echo "<tr>
    		<td width=\"79\">".$wall_array['project_no']."</td>
    		<td width=\"494\"><strong>".$wall_array['message']."</strong></td>
    		<td width=\"42\">".$wall_array['time']."</td>
    	    </tr>";
		}
  
  }
  
    
  ?>
  
   
 </table>

     </p>
    <?php 
  include "incbottom.php";
  ?>
</html>
