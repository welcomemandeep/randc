<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

include "dbconnect.php";

//$emp_code=$_SESSION['emp_code'];
$cur_time=date("Y-m-d  g:i:s");
$up1="UPDATE consultancy.logintable SET time=\"$cur_time\" WHERE emp_code = '$usrlogin' ";
$up=mysql_query($up1) or die(mysql_error());
mysql_close();



session_unset();
session_destroy();

echo "<script>window.location.href=\"login.php\"</script>";	
die("Turn On Your Javascript and then proceed !");
?>