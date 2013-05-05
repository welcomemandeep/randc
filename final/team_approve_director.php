<?php
session_start();
include "userlog.php";
include "dbconnect.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);


//access rules

if(!isset($_SESSION['emp_code']))
{
	header("location:login.php");
}

if($_SESSION['flag']!=2 || !isset($_SESSION['project_no']))
{
	header("location:home.php");
}


//access rules

$project_no=$_SESSION['project_no'];


$q=mysql_fetch_array(mysql_query("select * from project_stages where project_no like '$proj_no'"));
$flag=$q['flag'];

if($flag>=10)
{
	header("location:home.php");
}




if(isset($_POST['confirm']))
{

 

      if($_POST['choice']=='approve')
{
	
	include "dbconnect.php";
		 $cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_team_detail SET director_approval='1'  WHERE project_no = '$project_no' ");// or die(mysql_error());

		mysql_query("UPDATE consultancy.project_stages SET flag='10' WHERE project_no = '$project_no' ");// or die(mysql_error());
		mysql_query("UPDATE consultancy.project_track_record SET 10_time='$cur_time', `10`='1'  WHERE project_no = '$project_no' ");// or die(mysql_error());

			$qq=mysql_fetch_array(mysql_query("select * from project_mark_to where project_no like '$project_no'"));
		$pi=$qq['pi_emp_code'];
		
		$msg="Your team for project ".$project_no." has been approved by the Director";
		  mysql_query("insert into notify (project_no,emp_code,message) values('$project_no','$pi','$msg')");

		mysql_close();

	 echo "<script>window.location.href=\"home.php\"</script>";	
	 die(" Error ,Turn On Your Javascript !!");	

}

}

?>

<!DOCTYPE HTML>
<html>

<head>

<title>APPROVE TEAM</title>
</head>
<body>
  <?php 
  include "inctop.php";
  ?>
        <!-- insert the page content here -->
<div id="center" align="center">
 <form action="" method="post" >
  
      <table width="581" border="0" cellspacing="0" cellpadding="0">
 
 
  <tr>
    <th width="525">TEAM MEMBER'S NAME</th>
   </tr>
 
 
 
 <?php 
 include "dbconnect.php";
 
 $q=mysql_query("select personalinfo.name from  personalinfo,project_team_detail where  project_no like '$project_no'  and personalinfo.emp_code like project_team_detail.emp_code ");
 
 while($arr=mysql_fetch_array($q))
 {
	 echo "<tr><td align=\"center\">".$arr['name']."</td>";
 	 echo "</tr>";
//	 echo "<td align=\"center\">".$arr['']."</td>";
 }//while
 
  
 ?>
 
 
  <tr>
    <td align="center" colspan="2">APPROVE<input type="radio" value="approve" name="choice"/>&nbsp;&nbsp;
    DIS-APPROVE<input type="radio" value="disapprove" name="choice"/></td>
  </tr>
  
  <tr>
  <td align="center" colspan="2"><input type="submit" value="CONFIRM" name="confirm"/></td>
  
  
 </table>
</form>
    </div>
    <?php 
  include "incbottom.php";
  ?>
</html>
