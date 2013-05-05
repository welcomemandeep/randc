<?php
session_start();
include "userlog.php";

if(isset($_SESSION['emp_code']))
{
 echo "<script>window.location.href=\"home.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}


if(isset($_POST['submit']))
{
 $usrlogin=trim($_POST['emp_code']);  		// Variable for username
 $passwrdlogin=trim($_POST['password']);	//Variable for password
 $err=0;									//Variable for error check

 if($usrlogin == "" || $usrlogin == "emp_code" || strlen($usrlogin) <3)
 	$err=1;
 if($passwrdlogin == "" || $passwrdlogin == "password"  || strlen($passwrdlogin) <3)
 	$err=1;
 
 if($err==0)
 {
  include "dbconnect.php";
  
		$w=mysql_query("select * from consultancy.logintable where emp_code like '$usrlogin' and password like '$passwrdlogin'");
		$array=mysql_fetch_array($w);
		if(mysql_num_rows($w)==1)
		{
			userLog($usrlogin, 1);
			$_SESSION['emp_code']="$usrlogin";
			$_SESSION['flag']=$array['flag'];
			echo "<script>window.location.href=\"home.php\"</script>";	
			 die(" Error ,Turn On Your Javascript !!");
			
		}
		else 
		{
			userLog($usrlogin, 0);
		echo "<script>alert(\"Authentication failure !! \")</script>";
		}	
 }	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>
<style>
.sb_btn{
font:17px Verdana, Helvetica, sans-serif;
height:25px;
font-weight:bold;
}
a:link {
	color: #242424;
}
</style>
</head>

<body>

<?php include "inctop.php"; 
if($err==1)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! One or more Details are missing.</p>";
 ?>
</div>
	<div id="center" align="center">
		<p>
		<form name="login" action="" method="post">
<table align="center" cellpadding="1" cellspacing="1"  bgcolor="#CCCCCC" width="303">
<tr>
<th align="center" colspan="2">LOGIN</th>
</tr>
<tr>
<td width="127" align="center"> <b>EMPLOYEE CODE &nbsp;</b></td>
<td width="144" ><input type= "text" name="emp_code"  value="<?php echo $usrlogin; ?>" onclick="value=''" /></td>
</tr>

<tr>
<td width="127" align="center"> <b>PASSWORD</b></td>
<td width="144"><input type= "password" name="password"  value="" onclick="value=''" /></td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="LOGIN" class="sb_btn" /> &nbsp; &nbsp; <a href="register.php">SIGN UP</a></td>
</tr>

</table>
</form>
</p>
		
	</div>
</div>

</div>
<?php 

include "incbottom.php";
?>
</body>
</html>
