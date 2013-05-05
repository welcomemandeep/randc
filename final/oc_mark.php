<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

//PAGE ACCESS RULES

if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if(!isset($_SESSION['project_no']) || $_SESSION['flag']!=4)
{
	 echo "<script>alert(\"you are not allowed to enter this page !! \")</script>";
	 echo "<script>window.location.href=\"home.php\"</script>";	
	 die(" Error ,Turn On Your Javascript !!");	
}

//PAGE ACCESS RULES



//$emp_code=$_SESSION['emp_code'];
$project_no=$_SESSION['project_no'];
include "dbconnect.php";
$query=mysql_query("select * from personalinfo where emp_code like '$emp_code'");
$arr=mysql_fetch_array($query);
$department=$arr['department'];



if(isset($_POST['markto']))
{
	
		$ocmark=$_POST['ocmark'];
		
		mysql_query("UPDATE consultancy.project_mark_to SET pi_emp_code=\"$ocmark\" WHERE project_no = '$project_no' ");

	 	$cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_track_record SET `4`='1' , `4_time`='$cur_time' WHERE project_no = '$project_no' "); // Stage Track Record
		mysql_query("UPDATE consultancy.project_stages SET `flag`='4'  WHERE project_no = '$project_no' "); // Stage Track Record


		
		$msg="You have been marked for the project numbered ";$project_no;
		mysql_query("insert into notify (project_no,emp_code,message) values('$project_no','$ocmark','$msg')");

			 echo "<script>window.location.href=\"home.php\"</script>";	
		 die(" Error ,Turn On Your Javascript !!");	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OC Mark page</title>
</head>

<body>
<?php
include "inctop.php";
?>
<div id="center" align="center">
<form method="post">
<table align="center">

<tr id="ocmark">
<td>
<select name="ocmark" >
<?php 

include "dbconnect.php";
$r=mysql_query("select logintable.emp_code ,name
 from logintable,personalinfo 
 where flag like '4' and department like '$department'
 and logintable.emp_code like personalinfo.emp_code");
while($ar=mysql_fetch_array($r))
{
	echo "<option value=\"".$ar['emp_code']."\">".$ar['name']."</option>";
}

$r=mysql_query("select logintable.emp_code ,name from logintable,personalinfo where flag like '5' and department like '$department' and logintable.emp_code like personalinfo.emp_code");
while($ar=mysql_fetch_array($r))
{
	echo "<option value=\"".$ar['emp_code']."\">".$ar['name']."</option>";
}
?>
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