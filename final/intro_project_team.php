<?php session_start();
include "dbconnect.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fee Received</title>
</head>

<body>
<?php include "inctop.php";
?>

   <table width="600" border="1" cellspacing="0" cellpadding="0" align="center" id="project_received">
  <tr>
    <th scope="col" align="center">Project Subject</th>
    <th scope="col" align="center">Organization</th>
    <th scope="col" align="center">Members</th>
    <!--<th scope="col" align="center">Designation</th>-->
    <th scope="col"  align="center">Options</th>
  </tr>

<?php 
$result=mysql_query("select project_no from project_track_record where `10` like 1")or die(mysql_error());
while($array=mysql_fetch_array($result))
{	$project_no=$array['project_no'];
	
	$result2=mysql_query("select * from project_letter_detail where project_no like '$project_no'")or die(mysql_error());
	$array2=mysql_fetch_array($result2);
	
	$result3=mysql_query("select * from project_team_detail where project_no like '$project_no'")or die(mysql_error());
	while($array3=mysql_fetch_array($result3))
	{
	$empcode=$array3['emp_code'];
	
	$result4=mysql_query("select * from personalinfo where emp_code like '$empcode'")or die(mysql_error());
	$array4=mysql_fetch_array($result4);
		
	echo "<tr>";
	echo "<td align=\"center\">".$array2['subject']."</td>";
	echo "<td align=\"center\">".$array2['organization']."</td>";
	echo "<td align=\"center\">".$array4['name']."</td>";
	echo "<td align=\"center\"><a href=\"?view=".$array['project_no']."\">View</a></td>";				
	echo "</tr>";
	}
	
}

?>
</table>
<br />
<br />
   <div align="center"><input id="backForm" class="button_text" style="height:1.5em; width:5em;" type="button" name="Back" value="Back" onclick="history.go(-1);return true;"></div>
   <?php include"incbottom.php";?>	
</body>
</html>