<?php
session_start();
include "userlog.php";
include "dbconnect.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);
//PAGE ACCESS RULES

if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if(!isset($_SESSION['project_no'])  || $_SESSION['flag']!=3)
{
	 echo "<script>alert(\"you are not allowed to enter this page !! \")</script>";
	 echo "<script>window.location.href=\"hod_home.php\"</script>";	
	 die(" Error ,Turn On Your Javascript !!");	
}

//PAGE ACCESS RULES



//$emp_code=$_SESSION['emp_code'];
$project_no=$_SESSION['project_no'];


$query=mysql_query("select * from personalinfo where emp_code like '$emp_code'");
$arr=mysql_fetch_array($query);
$department=$arr['department'];



if(isset($_POST['markto']))
{
	$mark=$_POST['mark'];
	
	if($mark=="oc")
	{
		$ocmark=$_POST['ocmark'];
		
		
	 	$cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_track_record SET `2`='1' , `2_time`='$cur_time' WHERE project_no = '$project_no' "); // Stage Track Record
		mysql_query("UPDATE consultancy.project_stages SET `flag`='2'  WHERE project_no = '$project_no' "); // Stage Track Record

		mysql_query("UPDATE consultancy.project_mark_to SET oc_emp_code='$ocmark'  WHERE project_no = '$project_no' "); // Stage Track Record

		
		$msg="You have been marked for the project numbered ".$project_no;
		mysql_query("insert into notify (project_no,emp_code,message) values('$project_no','$ocmark','$msg')");

	}
	
	else if($mark=="pi")
	{
		$pimark=$_POST['pimark'];

	 	$cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_track_record SET `3`='1' , `3_time`='$cur_time' WHERE project_no = '$project_no' "); // Stage Track Record
		mysql_query("UPDATE consultancy.project_stages SET `flag`='3'  WHERE project_no = '$project_no' "); // Stage Track Record
		mysql_query("UPDATE consultancy.project_mark_to SET pi_emp_code='$pimark'  WHERE project_no = '$project_no' ");
		
		$msg="You have been marked for the project numbered ".$project_no;
		mysql_query("insert into notify (project_no,emp_code,message) values('$project_no','$pimark','$msg')");
		
	}
	
	echo "<script>window.location.href=\"hod_home.php\"</script>";	
	die("Turn On Your Javascript and then proceed !");

}



mysql_close();







?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hod Mark page</title>
<script type="text/javascript">
var showRow = (navigator.appName.indexOf("Internet Explorer") != -1) ? "block" : "table-row";

function piclick(){
	document.getElementById("pimark").style.display=showRow;
	document.getElementById("ocmark").style.display="none";	
}
function occlick(){
	document.getElementById("ocmark").style.display=showRow;
	document.getElementById("pimark").style.display="none";	
}

</script>

</head>

<body>
<?php
include "inctop.php";
?>
<div id="center" align="center">
<form method="post">
<table align="center">

<tr>
<th align="center">Please choose one of the options</th>
</tr>

<tr>
<td> <input type="radio" name="mark" value="oc" onclick="javascript:occlick()" />Mark to OC &nbsp; <input type="radio" name="mark" value="pi"  onclick="javascript:piclick()"/> &nbsp;Mark to PI </td>
</tr>



<tr id="ocmark">
<td>OC : 
<select name="ocmark" >
<?php 
include "dbconnect.php";
$t="select logintable.emp_code ,name from logintable,personalinfo where flag like '4' and department like '$department' and logintable.emp_code like personalinfo.emp_code";
//echo $t;
$r=mysql_query($t);
while($ar=mysql_fetch_array($r))
{
	echo "<option value=\"".$ar['emp_code']."\">".$ar['name']."</option>";
}
?>
<option value="none">none</option>
</select>
</td>
</tr>


<tr  style="display:none" id="pimark">
<td>PI : 
<select name="pimark" >
<?php 
include "dbconnect.php";
$r=mysql_query("select logintable.emp_code ,name from logintable,personalinfo where flag like '5' and department like '$department' and logintable.emp_code like personalinfo.emp_code");
while($ar=mysql_fetch_array($r))
{
	echo "<option value=\"".$ar['emp_code']."\">".$ar['name']."</option>";
}
?>
<option value="none">none</option>
</select>
</td>
</tr>


<tr>
<td><input type="submit" name="markto" value="SUBMIT" /></td>
</tr>


</table>
</form>
</div>

<?php
include "incbottom.php";
?>
</body>
</html>