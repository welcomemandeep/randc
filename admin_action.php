<?php
session_start();
include "userlog.php";
//userLog($usrlogin, 1);

// edit user
if(isset($_POST['admin_edit']))
{
 $empcode=$_SESSION['empcode_admin'];
 $name=trim($_POST['name']);
 $gender=trim($_POST['gender']);
 $department=trim($_POST['department']);
 $newempcode=trim($_POST['emp_code']);
 $designation=trim($_POST['designation']);
 $email=trim($_POST['email']);
 $psswd=trim($_POST['password']);
 $rpsswd=trim($_POST['rpassword']);
 $deleteuser=trim($_POST['deluser']);
 //$flag=$_POST['flag'];
 $makeadmin=$_POST['makeadmin']; 
 // 4 is for OC not implemented here
 if ($makeadmin!=1)
 {	if($designation=="Director")
 	{	$makeadmin=2;
	}
	if($designation=="Head of Department")
 	{	$makeadmin=3;
	}
	if($designation=="Professor")
 	{	$makeadmin=5;
	}
	if($designation=="Associate Professor")
 	{	$makeadmin=5;
	}
	if($designation=="Assistant Professor")
 	{	$makeadmin=5;
	}
	if($designation=="Lecturer")
 	{	$makeadmin=5;
	}
 }
 
  if($deleteuser==1)
  {
  	include "dbconnect.php";
   $Sql="delete from logintable where emp_code like '$empcode'";
   mysql_query($Sql) or die(mysql_error());
   $sql="delete from personalinfo where emp_code like '$empcode'";
   mysql_query($sql) or die(mysql_error());
   mysql_close();
  }  
 $err=0;
 
 
 if($name == "" ||$psswd == "" || $gender == ""||$newempcode==""||$email==""||$rpsswd=="" )
 $err=1;
 
 if($psswd != $rpsswd)
 $err=2;
 
 if(strlen($psswd) < 3 )
 $err=3;
  

 if($err == 0)
 {
 include "dbconnect.php";
 $q="UPDATE personalinfo SET name = '$name' , gender='$gender',department='$department',emp_code='$newempcode',designation='$designation',email='$email' WHERE emp_code = '$empcode' ";
 mysql_query($q) or die(mysql_error());

 $q="UPDATE logintable SET password = '$psswd',emp_code='$newempcode',flag = '$makeadmin' WHERE emp_code = '$empcode' ";
 mysql_query($q) or die(mysql_error());
 mysql_close();
 unset($_SESSION['empcode_admin']);
 echo "<script>alert(\"".$name."'s profile updated\")</script>";
 echo "<script>window.location.href=\"admin_home.php\"</script>";	
 die("Error , Please turn on your javascript");

  }
}




?>