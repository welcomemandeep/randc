<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

unset($_SESSION['project_no']);


//PAGE ACCESS RULES

if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if($_SESSION['flag']!=3)
{
	 echo "<script>alert(\"you are not allowed to enter this page !! \")</script>";
	 echo "<script>window.location.href=\"home.php\"</script>";	
	 die(" Error ,Turn On Your Javascript !!");	
}

//PAGE ACCESS RULES END

//$emp_code=$_SESSION['emp_code'];

		if(isset($_POST["hod_mark"]) && $_POST['hod_mark_to']!="None")
		{
			$_SESSION['project_no']=$_POST['hod_mark_to'];
 echo "<script>window.location.href=\"hod_mark.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
			
		}
		
		
		if(isset($_POST["app_bill"]) && $_POST['hod_bill']!="None")
		{
			$_SESSION['project_no']=$_POST['hod_bill'];
 echo "<script>window.location.href=\"bill_approve.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");

    	}
		
				if(isset($_POST["app_advance"]) && $_POST['advance']!="None")
		{
			$_SESSION['project_no']=$_POST['advance'];
 echo "<script>window.location.href=\"advance_approve.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");

    	}
		
						if(isset($_POST["app_team"]) && $_POST['team']!="None")
		{
			$_SESSION['project_no']=$_POST['team'];
 echo "<script>window.location.href=\"team_approve.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");

    	}
		
		

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>HOME PAGE</title>
<body>
  <?php 
  include "inctop.php";
  ?>
        <!-- insert the page content here -->



<div id="center" align="center">
		<p>
        
	<form action="" method="post">
    <table align="center"  border="0" width="400">
    
    <tr>
    <th align="center" width="30%">PROJECT NO:</th>
    <th align="center">FUNCTION</th>
    </tr>
    
    <tr>
    <td align="center">
    <select name="hod_mark_to">
<?php
include "dbconnect.php";

$y="select project_stages.project_no 
from project_track_record,project_stages,project_mark_to 
where `2` like '0' and 
`3` like '0' and 
flag like '1' and
 hod_emp_code like '$emp_code' and
  project_stages.project_no like project_mark_to.project_no and
   project_stages.project_no like project_track_record.project_no and
    project_track_record.project_no like project_mark_to.project_no 
	order by time asc";


/*

Will this query produce the same effect ???
 $y="select project_no from project_stages,project_mark_to where flag like '1'  and hod_emp_code like '$emp_code' and   project_stages.project_no like project_mark_to.project_no order by time asc "

*/

//echo $y;
$ea_query=mysql_query($y) or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}

?>    
<option value="None">None</option>
    </select>
    </td>
    <td  align="center"><input name="hod_mark" type="submit" value="MARK TO" /></td>
    </tr>


    <tr>
    <td align="center">
    <select name="hod_bill">
<?php
include "dbconnect.php";

$y="select project_stages.project_no 
from project_track_record,project_stages,project_mark_to 
where `6` like '0' and 
flag like '5' and
 hod_emp_code like '$emp_code' and 
 project_stages.project_no like project_mark_to.project_no and 
 project_stages.project_no like project_track_record.project_no and
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc";

//echo $y;
$ea_query=mysql_query($y) or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}
mysql_close();
?>    
<option value="None">None</option>
    </select>
    </td>
    <td  align="center"><input name="app_bill" type="submit" value="APPROVE BILL" /></td>
    </tr>




   <tr>
    <td align="center">
    <select name="team">
<?php
include "dbconnect.php";

$y="select project_stages.project_no 
from project_track_record,project_stages,project_mark_to 
where `9` like '0' and 
flag like '8' and
 hod_emp_code like '$emp_code' and 
 project_stages.project_no like project_mark_to.project_no and 
 project_stages.project_no like project_track_record.project_no and
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc";

//echo $y;
$ea_query=mysql_query($y) or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}

?>    
<option value="None">None</option>
    </select>
    </td>
    <td  align="center"><input name="app_team" type="submit" value="APPROVE TEAM" /></td>
    </tr>






   <tr>
    <td align="center">
    <select name="advance">
<?php
include "dbconnect.php";

$y="select project_stages.project_no 
from project_track_record,project_stages,project_mark_to 
where `14` like '0' and 
flag like '13' and
 hod_emp_code like '$emp_code' and 
 project_stages.project_no like project_mark_to.project_no and 
 project_stages.project_no like project_track_record.project_no and
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc";

//echo $y;
$ea_query=mysql_query($y) or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}
mysql_close();
?>    
<option value="None">None</option>
    </select>
    </td>
    <td  align="center"><input name="app_advance" type="submit" value="APPROVE ADVANCE" /></td>
    </tr>







</table></form>


    </p>
</div>
    <?php 
  include "incbottom.php";
  ?>
  
  </body>
</html>
