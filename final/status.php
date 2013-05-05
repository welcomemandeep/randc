<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

include "dbconnect.php";
$q=mysql_query("select * from consultancy.project_letter_detail where 1 like 1 order by time desc");
if(mysql_num_rows($q)==0)
 {
     echo "<script>window.location.href=\"login.php\"</script>";
	 
 }
 
 

if(isset($_GET['view']))
{
	$_SESSION['status_project_no']=$_GET['view'];
    echo "<script>window.location.href=\"project_status.php\"</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Project List</title>

</head>
<body>
  <?php 
  include "inctop1.php";
  ?>
        <!-- insert the page content here -->



<table width="840" border="1" cellspacing="0" cellpadding="0" align="left">
  <tr>
    <th scope="col" align="center">Project Subject</th>
    <th scope="col" align="center">Organization</th>
    <th scope="col" align="center">Dated</th>
    <th scope="col"  align="center">Department</th>
    <th scope="col"  align="center">Options</th>
  </tr>
  
  
<?php 
include "dbconnect.php";

$query= "select * from consultancy.project_letter_detail where 1 like 1 order by time desc";
$query_result=mysql_query($query) or die(mysql_error());

if($query_result)
while($array=mysql_fetch_array($query_result))
{
	$project_no=$array['project_no'];
	$wq= mysql_query("select * from consultancy.project_official_detail where project_no like '$project_no' ");
	$awq=mysql_fetch_array($wq);
	
	echo "<tr>";
	echo "<td align=\"center\">".$array['subject']."</td>";
	echo "<td align=\"center\">".$array['organization']."</td>";
	echo "<td align=\"center\">".$array['date']."</td>";
	echo "<td align=\"center\">".$awq['mark_to']."</td>";
	echo "<td align=\"center\"><a href=\"?view=".$array['project_no']."\">View</a></td>";				
	echo "</tr>";
}

?>

</table>


    
    <?php 
  include "incbottom.php";
  ?>
  </body>
</html>
