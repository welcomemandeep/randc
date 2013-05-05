<?php 
session_start();
//Access rules 
if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if($_SESSION['flag'] !=1)
{
 echo "<script>alert(\"You are not allowed to enter in this page!! \")</script>";
 echo "<script>window.location.href=\"home.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

$proj_no=100;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adjustment of advance</title>

</head>

<body>
<?php 
include "inctop1.php";
?>

<table width="800" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <th scope="col" align="center"  width="10%"><u>S. No.</u></th>
    <th scope="col" align="center" width="40%"><u>Details of Work</u></th>
    <th scope="col" align="center" width="10%"><u>Units</u></th>
    <th scope="col" align="center" width="20%"><u>Cost Per Unit <br />(Rs.)</u></th>
    <th scope="col" align="center" width="20%"><u>Total Cost<br />(Rs.)</u></th>
    <th scope="col" align="center">Options</th>
  </tr>
    
  <?php 
  include "dbconnect.php";
  
  $q="select * from consultancy.project_advance_detail where project_no like '$proj_no'";
  $query_table=mysql_query($q) or die(mysql_error());
  $s_no=1;
 
  if($query_table)
 { 
  while($array=mysql_fetch_array($query_table))
  {
   echo "<tr>
   <td align=\"center\">".$s_no."</td>
   <td align=\"center\">".$array['advance_detail']."</td>
   <td align=\"center\"><input type=\"text\" value=\"".$array['no_unit']."\"/></td>
   <td align=\"center\">".$array['cost_per_unit']."</td>
   <td align=\"center\">".$array['amount']."</td>
   <td align=\"center\"><a href=\"?ddel=".$array['time']."\">Delete</a>&nbsp;<a href=\"\">Edit</a></td>
   </tr>";
   $flag=1;
  $s_no++;
  }
   
 
 }
  
  ?>
  
  
  </table>


<?php 
include "incbottom.php";
?>
</body>
</html>