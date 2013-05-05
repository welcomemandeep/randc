<?php 
session_start();
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

if(!isset($_SESSION['emp_code']) )
{
	header("location:login.php");
}


if($_SESSION['flag']!=5 && $_SESSION['flag']!=4 || !isset($_SESSION['project_no']))
{
	header("location:home.php");
}



$proj_no=$_SESSION['project_no'];
//$emp_code=$_SESSION['emp_code'];
include "dbconnect.php";



$q=mysql_fetch_array(mysql_query("select * from project_stages where project_no like '$proj_no'"));
$flag=$q['flag'];

if($flag>=5)
{
	header("location:home.php");
}

$query=mysql_query("select * from consultancy.standard_rates where name like \"service_tax\"");
$array_st=mysql_fetch_array($query);
$st=$array_st['rate'];


$query=mysql_query("select * from consultancy.project_letter_detail where project_no like '$proj_no'");
$array=mysql_fetch_array($query);
$org_name=$array['organization'];



$query=mysql_query("select * from consultancy.project_bill_detail where project_no like '$proj_no'");

if(mysql_num_rows($query)==0)
$_SESSION['navigator']=0;

mysql_close();


if($_POST['confirm'])
{
	
	include "dbconnect.php";
	$query=mysql_query("select sum(amount) from consultancy.project_bill_detail where project_no like '$proj_no'");
	$am_array=mysql_fetch_array($query);
	$amount=$am_array['sum(amount)'];
	$s_amount=$amount*$st/100;
	mysql_query("insert into consultancy.project_bill_amount (project_no,amount,service_tax) values ('$proj_no','$amount','$s_amount')");
	
	
	$cur_time=date("Y-m-d  g:i:s");
	mysql_query("UPDATE consultancy.project_stages SET flag='5' WHERE project_no = '$proj_no' ") or die(mysql_error());
	mysql_query("UPDATE consultancy.project_track_record SET 5_time='$cur_time', `5`='1'  WHERE project_no = '$proj_no' ") or die(mysql_error());
	
	
	$ar=mysql_fetch_array(mysql_query("select * from project_mark_to where project_no like '$proj_no'"));
	$hod_empcode=$ar['hod_emp_code'];
	
	$msg="Bill has been sent for your approval for the project ".$proj_no;
  mysql_query("insert into notify (project_no,emp_code,message) values('$proj_no','$hod_empcode','$msg')");

	
	
	mysql_close();
	echo "<script>alert(\"Total Amount : Rs ".$amount." , Service Tax : Rs ".$s_amount." \")</script>";
   echo "<script>window.location.href=\"bill_print.php\"</script>";	
   die(" Error ,Turn On Your Javascript !!");

	
	
}




if(isset($_GET['ddel']))
{
	$time=$_GET['ddel'];
	include "dbconnect.php";
 mysql_query("delete from consultancy.project_bill_detail where time  like '$time' ") ;//or die(mysql_error());
 mysql_close();
 $_SESSION['navigator']=0;
}





if($_POST['submit'])
{
	$cpu=$_POST['cpu'];
	$no_unit=$_POST['no_unit'];
	$cost=$_POST['cost'];
	$detail=$_POST['detail'];
	$other_detail=$_POST['other_detail'];
	
	$err=0;
	
	
	if($detail == "other" && $other_detail=="")
	 $err=1;
	
	if($detail == "other" && $other_detail != "")
	{
		$detail=$other_detail;
	}
	
	
	if(($cost=='' || $cost== 0 ) && (($no_unit=='' || $no_unit==0) || ($cpu=='' || $cpu==0)))
	{
	 $err=2; // error check 
	}
	
	
    if($cost=='' || $cost== 0 )
	$cost=$cpu*$no_unit;  // calculation of the total cost 
	
	
	if($err==0)
	{
		include "dbconnect.php";
		$e="insert into  consultancy.project_bill_detail (project_no,cost_per_unit,amount,detail,quantity) values ('$proj_no','$cpu','$cost','$detail','$no_unit')";
		//echo $e;
		mysql_query($e);// or die(mysql_error());	
		$_SESSION['navigator']=1;
	}
	else 
	{
			echo "<script>alert(\"Please enter the info correctly !\")</script>";

	}
	
	
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bill Details</title>
<script type="text/javascript">
function other()
{
	alert('Hi');
}
</script>
<style type="text/css">

.textbox1 {
	width:200px;
}
.textbox2 {
	width:100px;
}
.textbox3 {
	width:100px;
}
.textbox4 {
	width:400px;
	text-shadow:#999;
}
</style>
</head>

<body>
<?php 
  include "inctop1.php";
  ?>
        
     <h2 align="center"><strong><u>BILL DETAILS</u></strong></h2>
     
     
     
      <p align="Left">
 <font size="+1" color="#009999">Project Number : <strong><?php  echo $proj_no;?></strong><br />
Oragnization : <strong><?php echo $org_name;?></strong><br />
Service Tax Charged at :<strong> <?php echo $st;?> </strong></font>
 </p>
 
 
 
 
   <table width="800" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <th scope="col" align="center"  width="10%"><u>S. No.</u></th>
    <th scope="col" align="center" width="40%"><u>Details of Work</u></th>
    <th scope="col" align="center" width="10%"><u>No. Units</u></th>
    <th scope="col" align="center" width="20%"><u>Rate<br />(Rs.)</u></th>
    <th scope="col" align="center" width="20%"><u>Amount<br />(Rs.)</u></th>
    <th scope="col" align="center">Options</th>
  </tr>
  
    <?php 
  include "dbconnect.php";
  
  $q="select * from consultancy.project_bill_detail where project_no like '$proj_no'";
  $query_table=mysql_query($q) or die(mysql_error());
  $s_no=1;
  if($query_table)
 { 
  while($array=mysql_fetch_array($query_table))
  {
   echo "<tr>
   <td align=\"center\">".$s_no."</td>
   <td align=\"center\">".$array['detail']."</td>
   <td align=\"center\">".$array['quantity']."</td>
   <td align=\"center\">".$array['cost_per_unit']."</td>
   <td align=\"center\">".$array['amount']."</td>
   <td align=\"center\"><a href=\"?ddel=".$array['time']."\">Delete</a>&nbsp;<a href=\"\">Edit</a></td>
   </tr>";
   $flag=1;
  $s_no++;
  }
 }
  ?>
  
  
  
  
   <form name="" action="" method="post">    

 	<tr >
    <td align="center"><?php echo $s_no;?></td>
    <td align="center">
    <select name="detail"  class="textbox1">
    <?php 
	 include "dbconnect.php" ;
	 $q="select * from consultancy.standard_rates where flag like '2' and department like '$department' order by time asc";
	 $query_table=mysql_query($q);
	 
	 if($query)
	 while($array=mysql_fetch_array($query))
	 {
		 echo "<option value=\"".$array['name']."\">".$array['name']."</option>";
	 }
	
	?>
    <option value="other">Other</option>
    </select></td>
    
    <td align="center">
    <select name="no_unit">
    <?php
	$i=0;
	while($i<=100)
	{
    echo "<option value=\"".$i."\">".$i."</option>";
	$i++;
	}
    ?>
	</select>
    </td>
    <td align="center"><input type="text" name="cpu" value=""  class="textbox2"/></td>
    <td align="center"><input type="text" name="cost" value=""  class="textbox3"/></td>
    <td align="center"><input type="submit" name="submit" value="SUBMIT" width="100%" /></td>
  </tr>
  
  <tr  align="center">
  <td align="left" colspan="5"><strong>Details for the other testing:</strong><input  name="other_detail" type="text" class="textbox4"/></td>
  <td><input type="submit"  value="CONFIRM AND PRINT" name="confirm" <?php  if($_SESSION['navigator']==0) echo "disabled=\"disabled\""; ?> /></td>
  </tr>
  </form>
  
  </table>
    
    
    
    
    <?php 
  include "incbottom.php";
  ?>

</body>
</html>