<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

if(!isset($_SESSION['emp_code']))
{
	header("location:login.php");
}
?>

<!DOCTYPE HTML>
<html>

<head>

<title>HOME PAGE</title>
</head>
<body>
  <?php 
  include "inctop.php";
  ?>
        <!-- insert the page content here -->
<div id="center" align="center">
  <p align="center">
      <h3 align="center" style="text-decoration:blink">Please wait till the adiministrator allows you the proper  user level <br>
Please check after sometime !!</h3>
          </p>
    </div>
    <?php 
  include "incbottom.php";
  ?>
  </body>
  
</html>
