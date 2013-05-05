<?php session_start();
include "dbconnect.php";
if(isset($_GET['view']))
{
	$_SESSION['report_project_no']=$_GET['view'];
    echo "<script>window.location.href=\"project_report.php\"</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include "inctop.php";
?>

   <table width="600" border="1" cellspacing="0" cellpadding="0" align="center" id="project_received">
  <tr>
    <th scope="col" align="center">Project Subject</th>
    <th scope="col" align="center">Organization</th>
    <th scope="col"  align="center">Options</th>
  </tr>

<?php 
$query= "select * from consultancy.project_track_record where `18` like 1";
$query_result=mysql_query($query) or die(mysql_error());

if($query_result)
while($array=mysql_fetch_array($query_result))
{
	$project_no=$array['project_no'];
	$wq= mysql_query("select * from consultancy.project_letter_detail where project_no like '$project_no' ");
	$awq=mysql_fetch_array($wq);
	
	echo "<tr>";
	echo "<td align=\"center\">".$awq['subject']."</td>";
	echo "<td align=\"center\">".$awq['organization']."</td>";
	echo "<td align=\"center\"><a href=\"?view=".$project_no."\">View Report</a></td>";				
	echo "</tr>";
}
?>
</table>
<br />
<br />
   <div align="center"><input id="backForm" class="button_text" style="height:1.5em; width:5em;" type="button" name="Back" value="Back" onclick="history.go(-1);return true;"></div>
   <?php include"incbottom.php";?>	
</body>
</html>