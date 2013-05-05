<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

//access rules

if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if($_SESSION['flag']!=3  || !isset($_SESSION['project_no']))
{
	 echo "<script>alert(\"you are not allowed to enter this page !! \")</script>";
	 echo "<script>window.location.href=\"home.php\"</script>";	
	 die(" Error ,Turn On Your Javascript !!");	
}


//access rules

$project_no=$_SESSION['project_no'];


include "dbconnect.php";

$q=mysql_fetch_array(mysql_query("select * from project_stages where project_no like '$proj_no'"));
$flag=$q['flag'];

if($flag>=14)
{
	header("location:home.php");
}






if(isset($_POST['confirm']))
{

 

      if($_POST['choice']=='approve')
{
	
	include "dbconnect.php";
		 $cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_advance_amount SET hod_approval='1' , hod_time='$cur_time' WHERE project_no = '$project_no' ");// or die(mysql_error());

		mysql_query("UPDATE consultancy.project_stages SET flag='14' WHERE project_no = '$project_no' ");// or die(mysql_error());
		mysql_query("UPDATE consultancy.project_track_record SET 14_time='$cur_time', `14`='1'  WHERE project_no = '$project_no' ");// or die(mysql_error());

			$qq=mysql_fetch_array(mysql_query("select * from project_mark_to where project_no like '$project_no'"));
		$pi=$qq['pi_emp_code'];
		
		$msg="Your advance for project ".$project_no." has been approved by the HOD";
		  mysql_query("insert into notify (project_no,emp_code,message) values('$project_no','$pi','$msg')");



	 echo "<script>window.location.href=\"home.php\"</script>";	
	 die(" Error ,Turn On Your Javascript !!");	

}

}

?>

<!DOCTYPE HTML>
<html>

<head>

<title>APPROVE ADVANCE</title>
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
    <th width="525">DETAIL</th>
    <th width="50">AMOUNT</th>
  </tr>
 
 
 
 <?php 
 include "dbconnect.php";
 
 $q=mysql_query("select * from  project_advance_detail where  project_no like '$project_no' ");
 
 while($arr=mysql_fetch_array($q))
 {
	 echo "<tr><td align=\"center\">".$arr['advance_detail']."</td>";
 	 echo "<td align=\"center\">".$arr['amount']."</td></tr>";
//	 echo "<td align=\"center\">".$arr['']."</td>";
 }//while
 
  
  
  $q=mysql_query("select * from project_advance_extra where project_no like '$project_no'");
  
  if(mysql_num_rows($q)==1)
  {
	  echo "<tr><td align=\"center\" colspan=\"2\">".$q['reason']."</td></tr>";
  }
  
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
