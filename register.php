<?php
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);


include "dbconnect.php";

if(isset($_SESSION['emp_code']))
{
header("location:home.php");
}





if(isset($_POST['submit']))
{
 // Variables being initalized 
 $rname=trim($_POST['name']);
 $rempcode=trim($_POST['emp_code']);
 $rdesig=trim($_POST['designation']);
 $rdept=trim($_POST['department']);
 $remail=trim($_POST['email']);
 $rclg=trim($_POST['college']);
 $rgender=trim($_POST['gender']);
 $rpass=$_POST['pass'];
 $rrepass=$_POST['rpass'];

 $err=0;
 //check the validity of the email 
 include "email.php";
 if( checkmail($remail) == 0 )
  $err=3;
  
 $q="select * from consultancy.personalinfo where emp_code like '$rempcode'";
$query=mysql_query($q) or die(mysql_error());
$array=mysql_fetch_array($query);	 
 $empcodecheck=$array['emp_code'];
 if($empcodecheck != "")
 $err=4;
  
  if( $rname == "" || $rname == "Name" )
 	$err=1;
	
 if( $remail ==  ""  || $rpass == "" || $rrepass == ""  || $rgender == "" || $rempcode == "" || $rdept == "" || $rdesig == "" )
	{ $err=1;
	 }
 if($rpass != $rrepass )
	 $err=2;
	
	if($err==0)
	{
 include "dbconnect.php";
  mysql_query("INSERT INTO consultancy.logintable (emp_code,password,flag) VALUES('$rempcode','$rpass','6')") or die(mysql_error());
  mysql_query("INSERT INTO consultancy.personalinfo (name,gender,emp_code,designation,department,email) VALUES('$rname','$rgender','$rempcode','$rdesig','$rdept','$remail')") or die(mysql_error());
  
  
  $msg="Welcome to Research and consultancy , thanks for registering";
  mysql_query("insert into notify (emp_code,message) values('$rempcode','$msg')");
  
  
  mysql_close(); 
  $_SESSION['emp_code']=$rempcode;
  $_SESSION['flag']=6;
  echo "<script>window.location.href=\"home.php\"</script>";	
  die(" Error ,Turn On Your Javascript !!");
  
  }
 }
 
 



include "dbconnect.php"; // Connect to database
$x=mysql_query("select count(emp_code) from logintable where 1");
$num_user=mysql_fetch_array($x);
mysql_close();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIGN UP</title>
<script>
	function check()
	{
        var a = document.getElementById('matchs');
		var x=document.getElementById("new").value;
		var y=document.getElementById("old").value;
		
		
		if (y.length==0) {
		a.innerHTML = '<span style="color:red"><img src=error.png></img><font size=-1></font></span>';}
		else if(y==x){
		a.innerHTML = '<span style="color:blue"><img src="style/Y.png"></img></span>';}
		else {
		a.innerHTML = '<span style="color:red"><img src="style/N.png"></img></span>';}
		
		
	}
	


function capLock(e){
 kc = e.keyCode?e.keyCode:e.which;
 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
  document.getElementById('divMayus').style.visibility = 'visible';
 else
  document.getElementById('divMayus').style.visibility = 'hidden';
}
</script>


</head>

<body>
<?php include "inctop.php" ?>
<div align="centre">
<?php 
if($err==1)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! One or more Details are missing.</p>";
if($err==2)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Passwords donnt match.</p>"; 
if($err==3)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Email is not correct.</p>";
if($err==4)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Employee code already exists in database.</p>";  
 ?>
<form action="" method="post" name="register">
<table align="center" cellpadding="0" cellspacing="2">

<tr>
<th align="center" colspan="2">REGISTER YOURSELF</th>
</tr>


<tr>
<td><strong>Name</strong>&nbsp;:</td>
<td><input name="name" type="text" value="<?php echo $rname; ?>" onclick="value=''"  maxlength="20" /></td>
</tr>

<tr>
<td><strong>Employee_Code</strong>&nbsp;:</td>
<td><input name="emp_code" type="text" value="<?php echo $rempcode; ?>" onclick="value=''"  maxlength="20" /></td>
</tr>

<tr>
<td><strong>Gender</strong>&nbsp;:</td>
<td>Male &nbsp;<input name="gender"  value="male" type="radio"/>&nbsp;Female&nbsp;<input name="gender"  value="female" type="radio"/></td>
</tr>

<tr>
<td><strong>Designation</strong>&nbsp;:</td>
<td><select name="designation">
          <option value="Director">Director</option>
		  <option value="Head of Department">Head of Department</option>
          <option value="Professor">Professor</option>
          <option value="Associate Professor">Associate Professor</option>
          <option value="Assistant Professor">Assistant Professor</option>
          <option value="Lecturer">Lecturer</option>
		  <option value="OC">OC</option>
          <option value="Others/Students">Others/Students</option>
		  </select>
</td>
</tr>

<tr>
<td><strong>Department</strong>&nbsp;:</td>
<td><select name="department">
	  
		  <?php 
		  include "dbconnect.php";
		  $query=mysql_query("select * from state_department where flag like '1'");
		   while($array=mysql_fetch_array($query))
		   {
		    echo "<option value=\"".$array['name']."\">".$array['name']."</option>";
		   }
		  ?>
		  
		  
        </select>
</td>
</tr>


<tr>
<td><strong>College</strong>&nbsp;:</td>
<td><input type="text" value="MNNIT"  name="college" disabled="disabled"/></td>
</tr>


<tr>
<td><font color="#FF0000">*</font><strong>Email ID</strong>&nbsp;:</td>
<td><input name="email" type="text" value="<?php echo $remail; ?>" onclick="value=''"  maxlength="30" onkeyup="showUser(this.value)" /></td>
</tr>


<tr>
<td><font color="#FF0000">*</font><strong>Password</strong>&nbsp;:</td>
<td><input name="pass" type="password" onclick="value=''" value="<?php echo $rpass; ?>" maxlength="10" id="new"  onkeypress="capLock(event)"/><SPAN><div id="divMayus" style="visibility:hidden"><font color="#FF0000">Caps Lock is on.</font></div></td>
</tr>

<tr>
<td><strong>Re-Type Password</strong>&nbsp;:</td>
<td><input name="rpass" type="password" onclick="value=''" value="<?php echo $rrepass; ?>" maxlength="10" id="old" onkeyup="return  check();"  /><span id="matchs">&nbsp;</span></td>
</tr>



<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Register" /> &nbsp;&nbsp;<a href="login.php">LOGIN</a></td>
</tr>




<tr><td colspan="2"><font style="elevation:higher">No of users  registered :- &nbsp;
<?php 
include "dbconnect.php"; // Connect to database
$x=mysql_query("select count(emp_code) from logintable where 1");
$num_user=mysql_fetch_array($x);
mysql_close();
echo $num_user['count(emp_code)'] ; 
?></font></td></tr>


</table>
</form>

<?php include "incbottom.php"?>
</body>
</html>
