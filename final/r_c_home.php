<?php 
session_start();
include "userlog.php";
userLog($usrlogin, 1);
unset($_SESSION['project_no']);
//PAGE ACCESS RULES

if(!isset($_SESSION['emp_code']))
{
	header("location:login.php");
}

if($_SESSION['flag']!=7)
{
/*	 echo "<script>alert(\"you are not allowed to enter this page".$_SESSION['flag']." !! \")</script>";*/
header("location:home.php");
}

//PAGE ACCESS RULES


$emp_code=$_SESSION['emp_code'];




		if(isset($_POST["ir"]) && $_POST['receipt']!="None")
		{
			$_SESSION['project_no']=$_POST['receipt'];
			//header("receipt_print.php");
		 echo "<script>window.location.href=\"receipt_print.php\"</script>";	
		 die(" Error ,Turn On Your Javascript !!");
	
			
		}

		if(isset($_POST["proj_complete"]) && $_POST['complete']!="None")
		{
			echo "ask sir what to do ";
			//$_SESSION['project_no']=$_POST['complete'];
			//header("receipt_print.php");	
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
    
    <tr>
    <td align="center">
    <select name="receipt">
<?php
include "dbconnect.php";

$o="select project_stages.project_no
 from project_track_record,project_stages,project_mark_to 
 where `12` like '0' and
  flag like '11' and
   project_stages.project_no like project_mark_to.project_no and 
   project_stages.project_no like project_track_record.project_no and 
   project_track_record.project_no like project_mark_to.project_no 
   order by time asc";

$ea_query=mysql_query($o) or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}
?>    
<option value="None">None</option>
    </select>
    </td>
    <td  align="center"><input name="ir" type="submit" value="ISSUE RECEIPT" /></td>
    </tr>



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
    <td  align="center"><input name="sub_st" type="submit" value="SUBMISSION OF SERVICE TAX" /></td>
    </tr>


    
    <tr>
    <td align="center">
    <select name="team">
  <?php
include "dbconnect.php";

$a=mysql_fetch_array(mysql_query("select * from standard_rates where name like 'bill_limit_director'"));
$am=$a['rate'];
$ea_query=mysql_query("select project_stages.project_no 
from project_track_record,project_stages ,project_mark_to ,project_bill_amount 
where `8` like '0' and 
flag like '6'  and
amount <= '$am' and
 pi_emp_code like '$emp_code' and
  project_stages.project_no like project_mark_to.project_no and 
  project_stages.project_no like project_track_record.project_no and 
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc") ;//or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}


$ea_query=mysql_query("select project_stages.project_no 
from project_track_record,project_stages ,project_mark_to 
where `8` like '0' and 
flag like '7'  and
 pi_emp_code like '$emp_code' and
  project_stages.project_no like project_mark_to.project_no and 
  project_stages.project_no like project_track_record.project_no and 
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc") ;//or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}

?>  
<option value="None">None</option>
    </select>
    </td>
    <td align="center"><input type="submit" value="SUBMISSION OF TDS" name="sub_tds" /></td>
    </tr>
 
 
 <tr>
    <td align="center">
    <select name="complete">
  <?php
include "dbconnect.php";
$ea_query=mysql_query("select project_stages.project_no 
from project_track_record,project_stages ,project_mark_to 
where `21` like '0' and 
flag like '20'  and
  project_stages.project_no like project_mark_to.project_no and 
  project_stages.project_no like project_track_record.project_no and 
  project_track_record.project_no like project_mark_to.project_no 
  order by time asc") ;//or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}

?>  
<option value="None">None</option>
    </select>
    </td>
    <td align="center"><input type="submit" value="MARK PROJECT AS COMPLETE" name="proj_complete" /></td>
    </tr>


   


    
    </table>
    </form>

</div>

<?php 
include "incbottom.php"
?>
</body>
</html>