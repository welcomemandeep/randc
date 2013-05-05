<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

include "dbconnect.php";
//access rules

if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if($_SESSION['flag']==1 || $_SESSION['flag']==3 ||$_SESSION['flag']==4 || $_SESSION['flag']==5 || !isset($_SESSION['project_no']))
{
	 echo "<script>alert(\"you are not allowed to enter this page !! \")</script>";
	 echo "<script>window.location.href=\"home.php\"</script>";	
	 die(" Error ,Turn On Your Javascript !!");	
}


//access rules







$project_no=$_SESSION['project_no'];




if(isset($_POST['confirm']))
{

 

      if($_POST['choice']=='approve')
{
		 $cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_bill_amount SET director_approval='1' , director_time='$cur_time' WHERE project_no = '$project_no' ");// or die(mysql_error());

		mysql_query("UPDATE consultancy.project_stages SET flag='7' WHERE project_no = '$project_no' ");// or die(mysql_error());
		mysql_query("UPDATE consultancy.project_track_record SET 7_time='$cur_time', `7`='1'  WHERE project_no = '$project_no' ");// or die(mysql_error());
		
		header("location:home.php");

}

}

?>

<!DOCTYPE HTML>
<html>

<head>

<title>APPROVE BILL</title>
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

 
 $q=mysql_query("select * from  project_bill_detail where  project_no like '$project_no' ");
 
 while($arr=mysql_fetch_array($q))
 {
	 echo "<tr><td align=\"center\">".$arr['detail']."</td>";
 	 echo "<td align=\"center\">".$arr['amount']."</td></tr>";
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
