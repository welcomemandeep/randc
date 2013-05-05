<?php 
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);
// Page access rules


if(!isset($_SESSION['emp_code']) )
{
	header("location:login.php");
}

if($_SESSION['flag'] != 4 && $_SESSION['flag'] != 5 || !isset($_SESSION['project_no']))
{
	header("location:home.php");
}

//Acess Rules


$proj_no=$_SESSION['project_no'];
//$emp_code=$_SESSION['emp_code'];


include "dbconnect.php";
$q=mysql_fetch_array(mysql_query("select * from project_stages where project_no like '$proj_no'"));
$flag=$q['flag'];

if($flag>=8)
{
	header("location:home.php");
}







$r=mysql_fetch_array(mysql_query("select * from standard_rates where name like 'bill_limit_director'"));
$bl=$r['rate'];

$r=mysql_fetch_array(mysql_query("select * from project_bill_amount where project_no like '$proj_no'"));
$am=$r['amount'];

if($am<=$bl)
$r="select * from project_stages where project_no like '$proj_no' and flag like '6'";

else 
$r="select * from project_stages where project_no like '$proj_no' and flag like '7'";


$ea=mysql_query($r) or die(mysql_error());


if(mysql_num_rows($ea)==0)
{
 echo "<script>alert(\"Please make the bill before entering this page \")</script>";
 echo "<script>window.location.href=\"bill.php\"</script>";	
}



//PAGE ACCESS RULES



if(isset($_POST['print']))
{
	include "dbconnect.php";
	$cur_time=date("Y-m-d  g:i:s");
	mysql_query("UPDATE consultancy.project_stages SET flag='8' WHERE project_no = '$proj_no' ") or die(mysql_error());
	mysql_query("UPDATE consultancy.project_track_record SET 8_time='$cur_time', `8`='1'  WHERE project_no = '$proj_no' ") or die(mysql_error());
	
	$ar=mysql_fetch_array(mysql_query("select * from project_mark_to where project_no like '$proj_no'"));
	$hod_empcode=$ar['hod_emp_code'];
	$msg="Team has been sent for your approval,for the project ".$proj_no;
    mysql_query("insert into notify (project_no,emp_code,message) values('$proj_no','$hod_empcode','$msg')");

	
	echo "<script>window.location.href=\"home.php\"</script>";		
}


include "dbconnect.php";
mysql_query("insert into consultancy.project_team_detail (project_no,emp_code) values ('$proj_no','$emp_code')");
mysql_close();

if(isset($_GET['ddel']))
{
	$time=$_GET['ddel'];
	include "dbconnect.php";
 mysql_query("delete from consultancy.project_team_detail where time  like '$time' ") ;//or die(mysql_error());
 mysql_close();

}



if(isset($_POST['submit']))
{
	include "dbconnect.php";
	$ec=$_POST['member'];
	if($ec != "")
	mysql_query("insert into consultancy.project_team_detail (project_no,emp_code) values ('$proj_no','$ec')");
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Team Details</title>
<style type="text/css">

.textbox1 {
	width:330px;
}
</style>
</head>

<body>

 <?php 
  include "inctop.php";
  ?>
       <h2 align="center"><u>TEAM DETAILS</u></h2>
       
<table width="600" border="1" cellspacing="0" cellpadding="0" align="left">
  <tr>
    <th scope="col" width="9%" align="center">S No:</th>
    <th scope="col" align="center" width="80%">Team Member's Name</th>
    <th scope="col" align="center">Options</th>
  </tr>

  <?php 
  include "dbconnect.php";
  
  $q="select * from consultancy.project_team_detail where project_no like '$proj_no' order by time desc";
  $query_table=mysql_query($q) or die(mysql_error());
  $s_no=1;
  if($query_table)
 { 
  while($array=mysql_fetch_array($query_table))
  {
	  
	$emp_code_member=$array['emp_code'];
	$e=mysql_query("select * from consultancy.personalinfo where emp_code like '$emp_code_member' ");
	$name_array=mysql_fetch_array($e);
	
   echo "<tr>
   <td align=\"center\">".$s_no."</td>
   <td align=\"center\">".$name_array['name']."</td>
   <td align=\"center\">";
   
   if($_SESSION['em_code']!=$emp_code_member)
   echo "<a href=\"?ddel=".$array['time']."\">Delete</a>&nbsp;<a href=\"\">Edit</a>";
   echo "</td></tr>";
  $s_no++;
  }
 }
  
  ?>




    <form name="" action="" method="post">    
  <tr>
    <td align="center"><?php echo $s_no; ?></td>
    <td align="center"><select name="member" class="textbox1">
    <?php 
	$query=mysql_query("select * from personalinfo where emp_code like '$emp_code'") or die(mysql_error());
	$arr=mysql_fetch_array($query);
	$department=$arr['department'];

	$e=mysql_query("select logintable.emp_code ,name from logintable,personalinfo where department like '$department' and logintable.emp_code like personalinfo.emp_code");
	if($e)
	 while($name_array=mysql_fetch_array($e))
	 {
		 echo "<option value=\"".$name_array['emp_code']."\">".$name_array['name']."</option>";
	 }
	?>
    </select></td>
    <td align="center"><input type="submit" name="submit" value="CHOOSE" /></td>
  </tr>
  
  <tr>
  <td colspan="3" align="right"><input type="submit" value="CONFIRM AND PRINT" name="print" /></td>
  </tr>
</form>

</table>






    
    <?php 
  include "incbottom.php";
  ?>

</body>
</html>