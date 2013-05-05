<?php
session_start();
include "userlog.php";
include "dbconnect.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

unset($_SESSION['project_no']);
//PAGE ACCESS RULES
if(!isset($_SESSION['emp_code']))
{
	header("location:login.php");
}

if($_SESSION['flag'] != 2)
{
	header("location:home.php");
}

//PAGE ACCESS RULES

// Project That are incomplete 
/*

$p=mysql_query("select project_letter_detail.project_no from project_letter_detail, project_contact_detail where project_letter_detail.flag like '1' and project_contact_detail.flag  like '0' and project_letter_detail.project_no like project_contact_detail.project_no order by project_letter_detail.time desc ") or die(mysql_error());

if(mysql_num_rows($p)==1)
{
	$_SESSION['test_info_loaded']=1;
	$pa=mysql_fetch_array($p);
	$_SESSION['project_no']=$pa['project_no'];
	header("location:consultant_detail.php");
}

*/





// New Project
if(isset($_POST['newproject']))
{
	header("location:test_detail.php");
}


//Extra Advance approval
if(isset($_POST['app_exad']) && $_POST['extra_advance']!="None")
{
 $_SESSION['project_no']=$_POST['extra_advance'];
 header("location:advance_approve_director.php");
}

// Approval of team 
if(isset($_POST['app_team']) && $_POST['team']!="None" )
{
 $_SESSION['project_no']=$_POST['team_approval'];
 header("location:team_approve_director.php");
}

//Approve Bill
if(isset($_POST['app_bill']) && $_POST['bill_approval']!="None")
{
 $_SESSION['project_no']=$_POST['bill_approval'];
 header("location:bill_approve_director.php");
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
 
        <!-- insert the page content here -->

<title>HOME PAGE</title>
</head>
<body>
 <?php 
  include "inctop.php";
  ?>
<div align="center" id="center">
<form name="" method="post" action="">
<table align="center">

<tr>
<td align="center" colspan="2"><input type="submit" value="NEW PROJECT / TESTING" name="newproject" /></td>
</tr>

    <tr>
    <th align="center" >PROJECT NO:</th>
    <th width="431" align="center">FUNCTION</th>
    </tr>



<tr>
<td width="144" align="center">


<select name="bill_approval">
<?php
include "dbconnect.php";

$q=mysql_fetch_array(mysql_query("select * from standard_rates where name like 'bill_limit_director'"));
$bd=$q['rate'];

$ta_query=mysql_query("select project_stages.project_no 
from project_stages,project_bill_amount
where flag like '6' and 
amount > '$bd' and 
director_approval like '0' and 
project_stages.project_no like project_bill_amount.project_no
order by time asc ")  or die(mysql_error());

while($ta_query_arr=mysql_fetch_array($ta_query))
{
	echo "<option value=\"".$ta_query_arr['project_no']."\">".$ta_query_arr['project_no']."</option>";
}
?>
<option value="None">None</option>
</select>
</td>
<td align="center"><input type="submit" name="app_bill"  value="BILL APPROVAL"/></td>
</tr>



<tr>
<td width="144" align="center">
<select name="team">
<?php
include "dbconnect.php";

$q=mysql_fetch_array(mysql_query("select * from standard_rates where name like 'team_limit_director'"));
$bd=$q['rate'];

$ta_query=mysql_query("select project_stages.project_no 
from project_stages,project_bill_amount
where flag like '9' and 
amount > '$bd' and 
director_approval like '0' and 
project_stages.project_no like project_bill_amount.project_no
order by time asc ")  or die(mysql_error());

while($ta_query_arr=mysql_fetch_array($ta_query))
{
	echo "<option value=\"".$ta_query_arr['project_no']."\">".$ta_query_arr['project_no']."</option>";
}
?>
<option value="None">None</option>
</select>
</td>
<td align="center"><input type="submit" name="app_team"  value="APPROVAL OF TEAM"/></td>
</tr>





<tr>
<td width="144" align="center">
<select name="extra_advance">
<?php
include "dbconnect.php";

$ea_query=mysql_query("select project_stages.project_no 
from project_stages,project_advance_extra
where flag like '14' and 
director_approval like '0' and 
project_stages.project_no like project_advance_extra.project_no
order by project_stages.time asc ") or die(mysql_error());

while($ea_query_arr=mysql_fetch_array($ea_query))
{
	echo "<option value=\"".$ea_query_arr['project_no']."\">".$ea_query_arr['project_no']."</option>";
}
?>
<option value="None">None</option>
</select>
</td>
<td align="center"><input type="submit" name="app_exad"  value="APPROVAL OF EXTRA ADVANCE"/></td>
</tr>





</table>
</form>

</div>
<?php 
include "incbottom.php";
?>
 </body>
</html>
