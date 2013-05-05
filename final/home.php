<?php 
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

 if(!isset($_SESSION['emp_code']))
{
	header("location:login.php");
}

unset($_SESSION['project_no']);
if($_SESSION['flag']==1)
{
	header("location:admin_home.php");
}
else if($_SESSION['flag']==2)
{
	header("location:director_home.php");
}
else if($_SESSION['flag']==3)
{
	header("location:hod_home.php");
}
else if($_SESSION['flag']==4 || $_SESSION['flag']==5)
{
header("location:oc_pi_home.php");
}
else if($_SESSION['flag']==6)
{
header("location:general_home.php");
}
else if($_SESSION['flag']==7)
{
header("location:r_c_home.php");
}
?>