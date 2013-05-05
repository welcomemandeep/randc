<?php session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

$projectno=100;
 
include "dbconnect.php";
$array1=mysql_fetch_array(mysql_query("SELECT * FROM project_letter_detail WHERE project_no=100"));
$array2=mysql_fetch_array(mysql_query("SELECT * FROM project_contact_detail WHERE project_no=100"));
$array3=mysql_fetch_array(mysql_query("SELECT * FROM project_track_record WHERE project_no='2011/06/3'"));

mysql_close();



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PROJECT STATUS</title>
<style type="text/css">

.style1 {
	font-size: large;
	font-weight: bold;
}
    .resize {
    width: 200px;
    height : auto;
    }

    .resize {
    width: auto;
    height : 500px;
    }
</style>
</head>

<body>
<div align="center"><h1>PROJECT TRACK RECORD </h1></div>
<br />
<br />
<table width="1105" height="500" border="0">
  <tr>
    <td width="413" height="408"><table width="256" border="0" align="center" cellpadding="1" cellspacing="1">
    
  <tr>
    <th width="198" align="left" scope="row"><font size="+2">Project No:</font></th>
    <td width="58"><font size="+1"><?php echo $array1['project_no'];?></font></td>
  </tr>
  <tr>
    <th scope="row" align="left"><font size="+2">Organization:</font></th>
    <td><font size="+1"><?php echo $array1['organization'];?></font></td>
  </tr>
  <tr>
    <th scope="row" align="left"><font size="+2">Letter no:</font></th>
    <td><font size="+1"><?php echo $array1['letter_no'];?></font></td>
  </tr>
  <tr>
    <th scope="row" align="left"><font size="+2">Date:</font></th>
    <td><font size="+1"><?php echo $array1['date'];?></font></td>
  </tr>
  <tr>
    <th scope="row" align="left"><font size="+2">Testing/Consultancy:</font></th>
    <td><font size="+1"><?php echo $array1['testing'];?></font></td>
  </tr>
  <tr>
    <th scope="row" align="left"><font size="+2">Contact Person Name:</font></th>
    <td><font size="+1"><?php echo $array2['c_first_name'];?></font></td>
  </tr>
  <tr>
    <th scope="row" align="left"><font size="+2">Contact No:</font></th>
    <td><font size="+1"><?php echo $array2['c_contact_no'];?></font></td>
  </tr>
</table>
</td>
    <td width="500"><img name="proj_image" src="<?php 
include "dbconnect.php";
$array=mysql_fetch_array(mysql_query("SELECT * FROM project_official_detail WHERE project_no=100"));
echo $array['address_of_scan_image'];
mysql_close();
?>"  alt="PROJ_IMAGE" class="resize" align="center" /></td>
<!-- third column-->
    <td width="178">
    <?php 
	include "dbconnect.php";
	print "<table width=200 border=0 cellpadding=1 cellspacing=1>";
$query=mysql_query("SELECT * FROM stage_description ");
$i=1;
 while($temp=mysql_fetch_array($query))
 {	print "<tr>";
 		
		if($array3["$i"]==1)
		{ print "<td bgcolor='#0066FF'>"." ".$temp['description'] ."</td>";
		print "<td bgcolor='#00FF00'>"."Yes"."</td>";}
		else
		{ print "<td bgcolor='#0066FF'>"." ".$temp['description'] ."</td>";
		print "<td bgcolor='#FF0000'>"."No"."</td>";}
		print"</tr>";
		$i++;
 }
print "</table>";
?>
</td>
  </tr>
</table>

</body>
</html>

