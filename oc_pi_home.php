<?php 
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

include "dbconnect.php";

unset($_SESSION['project_no']);
//PAGE ACCESS RULES

if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if($_SESSION['flag'] ==1 || $_SESSION['flag'] ==2  || $_SESSION['flag'] ==3 || $_SESSION['flag'] ==6 || $_SESSION['flag'] ==7  )
{
	 echo "<script>alert(\"you are not allowed to enter this page".$_SESSION['flag']." !! \")</script>";
	 echo "<script>window.location.href=\"home.php\"</script>";	
	 die(" Error ,Turn On Your Javascript !!");	
}

//PAGE ACCESS RULES


//$emp_code=$_SESSION['emp_code'];



// OC MARK TO 

		if(isset($_POST["mark_project_allotted"]) && $_POST['mark_proj']!="None")
		{
			$_SESSION['project_no']=$_POST['mark_proj'];
 echo "<script>window.location.href=\"oc_mark.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
			
		}



// PI FUNCTIONS START HERE 


		if(isset($_POST["sub_team"]) && $_POST['team']!="None")
		{
			$_SESSION['project_no']=$_POST['team'];
 echo "<script>window.location.href=\"team.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
			
		}
		if(isset($_POST["sub_bill"]) && $_POST['bill']!="None")
		{
			$_SESSION['project_no']=$_POST['bill'];
 echo "<script>window.location.href=\"bill.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
			
		}
		if(isset($_POST["sub_cheque"]) && $_POST['cheque']!="None")
		{
			$_SESSION['project_no']=$_POST['cheque'];
 echo "<script>window.location.href=\"cheque.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
			
		}
		if(isset($_POST["sub_advance"]) && $_POST['advance']!="None")
		{
			$_SESSION['project_no']=$_POST['advance'];
 echo "<script>window.location.href=\"advance.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
			
		}
		if(isset($_POST["sub_adjustment"]) && $_POST['adjustment']!="None")
		{
			$_SESSION['project_no']=$_POST['adjustment'];
 echo "<script>window.location.href=\"adjustment.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
			
		}
		if(isset($_POST["sub_report"]) && $_POST['report']!="None")
		{
			$_SESSION['project_no']=$_POST['report'];
 echo "<script>window.location.href=\"sub_report.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
	
		}


		if(isset($_POST["sub_dist"]) && $_POST['dist']!="None")
		{
			$_SESSION['project_no']=$_POST['dist'];
 echo "<script>window.location.href=\"distribution.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
	
		}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
</head>

<body>
<?php 
include "inctop.php"
?>
<div id="center" align="center">
		     
	<form action="" method="post">
    <table align="center"  border="0" width="400">
 
     
    <tr>
    <th align="center" width="30%">PROJECT NO:</th>
    <th align="center">FUNCTION</th>
    </tr>
    
<!--
OC FUNCTIONS START FROM HERE 
-->

<?php 

if($_SESSION['flag']==4)
{
?>



    <tr>
    <td align="center">
    <select name="mark_proj">
<?php


$o="select project_stages.project_no from project_track_record,project_stages,project_mark_to where `4` like '0' and `3` like '0' and flag like '2' and oc_emp_code like '$emp_code' and project_stages.project_no like project_mark_to.project_no and project_stages.project_no like project_track_record.project_no and project_track_record.project_no like project_mark_to.project_no order by time asc";

$ea_query=mysql_query($o) or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}
?>    
<option value="None">None</option>
    </select>
    </td>
    <td  align="center"><input name="mark_project_allotted" type="submit" value="MARK PROJECT ALLOTED" /></td>
    </tr>


<?php 

}
// OC PORTION OVER NOW THERE IS SAME CODE FOR BOTH OF THEM 

?>




<!--
PI FUNCTIONS START FROM HERE 
-->

    <tr>
    <td align="center">
    <select name="bill">
<?php
include "dbconnect.php";

$p="select project_stages.project_no
 from project_track_record,project_stages,project_mark_to 
 where `5` like '0' and
  flag like '4' or flag like '3'
  and pi_emp_code like '$emp_code'
   and project_stages.project_no like project_mark_to.project_no
    and project_stages.project_no like project_track_record.project_no 
	and project_track_record.project_no like project_mark_to.project_no
	 order by time asc";
$ea_query=mysql_query($p) or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}
?>    
<option value="None">None</option>
    </select>
    </td>
    <td  align="center" ><input  name="sub_bill" type="submit" value="SUBMISSION OF BILL" /></td>
    </tr>


    
    <tr>
    <td align="center">
    <select name="team">
  <?php
include "dbconnect.php";

$a=mysql_fetch_array(mysql_query("select * from standard_rates where name like 'bill_limit_director'"));
$am=$a['rate'];
$u="select project_stages.project_no 
from project_track_record,project_stages ,project_mark_to ,project_bill_amount 
where `8` like '0' and 
flag like '6'  and
amount <= '$am' and
 pi_emp_code like '$emp_code' and
  project_stages.project_no like project_mark_to.project_no and 
  project_stages.project_no like project_track_record.project_no and 
  project_track_record.project_no like project_mark_to.project_no
  and project_bill_amount.project_no like project_mark_to.project_no
  order by time asc";
  //echo $u;
$ea_query=mysql_query($u) ;//or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"a".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}

$t="select project_stages.project_no 
from project_track_record,project_stages ,project_mark_to 
where `8` like '0' and 
flag like '7'  and
 pi_emp_code like '$emp_code' and
  project_stages.project_no like project_mark_to.project_no and 
  project_stages.project_no like project_track_record.project_no and 
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc";
  //echo $t;
$ea_query=mysql_query($t) ;//or die(mysql_error());
if($ea_query)
while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}

?>  
<option value="None">None</option>
    </select>
    </td>
    <td align="center"><input type="submit" value="TEAM FORMATION" name="sub_team" /></td>
    </tr>


    
    <tr>
        <td align="center">
    <select name="cheque">
<?php
include "dbconnect.php";

// Apply the conodition for the bill

$ea_query=mysql_query("select project_stages.project_no 
from project_track_record,project_stages,project_mark_to 
where `11` like '0' and
 flag like '9'  and 
 pi_emp_code like '$emp_code' and
  project_stages.project_no like project_mark_to.project_no and
   project_stages.project_no like project_track_record.project_no and
    project_track_record.project_no like project_mark_to.project_no
	 order by time asc") or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}
?>    
<option value="None">None</option>
    </select>
    </td>
    <td  align="center"><input type="submit" value="ENTER CHEQUE/CASH DETAILS" name="sub_cheque" /></td>
    </tr>

    <tr>
        <td align="center">
    <select name="advance">
<?php
include "dbconnect.php";

$ea_query=mysql_query("select project_stages.project_no
 from project_track_record,project_stages,project_mark_to 
 where `13` like '0' and 
 flag like '12'  and 
 pi_emp_code like '$emp_code' and 
 project_stages.project_no like project_mark_to.project_no and
  project_stages.project_no like project_track_record.project_no and 
  project_track_record.project_no like project_mark_to.project_no
   order by time asc") or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}
?>    
<option value="None">None</option>
    </select>
    </td>
    <td  align="center"><input type="submit" value="REQUEST FOR ADVANCE" name="sub_advance" /></td>
    </tr>
    
 
 
 
    <tr>
        <td align="center">
    <select name="adjustment">
<?php
include "dbconnect.php";

$ea_query=mysql_query("select project_stages.project_no
 from project_track_record,project_stages,project_mark_to
  where `17` like '0' and 
  flag like '16'  and
   pi_emp_code like '$emp_code' and
    project_stages.project_no like project_mark_to.project_no and
	 project_stages.project_no like project_track_record.project_no and 
	 project_track_record.project_no like project_mark_to.project_no 
	 order by time asc") or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}


?>    
 <option value="None">None</option>

    </select>
    </td>
    <td  align="center"><input type="submit" value="ADJUSTMENT OF ADVANCE" name="sub_adjustment" /></td>
    </tr>
         
    <tr>
        <td align="center">
    <select name="report">
<?php
include "dbconnect.php";

$ea_query=mysql_query("select project_stages.project_no
 from project_track_record,project_stages,project_mark_to 
 where `18` like '0' and 
 flag like '17'  and 
 pi_emp_code like '$emp_code' and
  project_stages.project_no like project_mark_to.project_no and 
  project_stages.project_no like project_track_record.project_no and 
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc") or die(mysql_error());
while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}

$ea_query=mysql_query("select project_stages.project_no
 from project_track_record,project_stages,project_mark_to 
 where `18` like '0' and 
 flag like '12'  and 
 pi_emp_code like '$emp_code' and
  project_stages.project_no like project_mark_to.project_no and 
  project_stages.project_no like project_track_record.project_no and 
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc") or die(mysql_error());
while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}




?> 
<option value="None">None</option>
   
    </select>
    </td>
    <td  align="center"><input type="submit" value="SUBMISSION OF REPORT" name="sub_report" /></td>
    </tr>
    



    <tr>
        <td align="center">
    <select name="dist">
<?php
include "dbconnect.php";

$ea_query=mysql_query("select project_stages.project_no
 from project_track_record,project_stages,project_mark_to 
 where `19` like '0' and 
 flag like '18'  and 
 pi_emp_code like '$emp_code' and
  project_stages.project_no like project_mark_to.project_no and 
  project_stages.project_no like project_track_record.project_no and 
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc") or die(mysql_error());
while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}
?> 
<option value="None">None</option>
   
    </select>
    </td>
    <td  align="center"><input type="submit" value="SUBMISSION OF DISTRIBUTION" name="sub_dist" /></td>
    </tr>



    
    </table>
    </form>

</div>

<?php 
include "incbottom.php"
?>
</body>
</html>