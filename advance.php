<?php 
session_start();
include "dbconnect.php";
include "userlog.php";

// Page access rules
//print_r($POST);
if(!isset($_SESSION['emp_code']) )
{
	header("location:login.php");
}

if(($_SESSION['flag']!=5  && $_SESSION['flag']!=4 )|| !isset($_SESSION['project_no']))
{
	header("location:home.php");
}


$proj_no=$_SESSION['project_no'];
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);




$q=mysql_fetch_array(mysql_query("select * from project_stages where project_no like '$proj_no'"));
$flag=$q['flag'];

if($flag>=13)
{
	header("location:home.php");
}




// Page access rules


if(isset($_POST['print']))
{
	
	$q=mysql_fetch_array(mysql_query("select sum(amount) from project_advance_detail where project_no like '$proj_no'"));
	$advance_amount=$q['amount'];
	
	mysql_query("insert into consultancy.project_advance_detail (project_no,amount) values ('$proj_no','$advance_amount')");
	
	$cur_time=date("Y-m-d  g:i:s");
	mysql_query("UPDATE consultancy.project_stages SET flag='13' WHERE project_no = '$proj_no' ") or die(mysql_error());
	mysql_query("UPDATE consultancy.project_track_record SET 13_time='$cur_time', `13`='1'  WHERE project_no = '$proj_no' ") or die(mysql_error());
	echo "<script>window.location.href=\"advance_print.php\"</script>";	
	die("Turn on your javascript");	
}







$flag=0;


if(isset($_GET['ddel']))
{
	$time=$_GET['ddel'];
	include "dbconnect.php";
 mysql_query("delete from consultancy.project_advance_detail where time  like '$time' ") ;//or die(mysql_error());
  


	include "dbconnect.php";
	$q=mysql_query("select * from consultancy.project_bill_amount where project_no like '$proj_no'");
	$w=mysql_query("select sum(amount) from consultancy.project_advance_detail where project_no like '$proj_no'");
	
	if($q)
	$arr1=mysql_fetch_array($q);
	if($w)
	$arr2=mysql_fetch_array($w);
	 
	$advance_amount_permitted=($arr1['amount'])*25/100;
	$advance_amount_used=$arr2['sum(amount)'];
	 
	 	
	
	 	if(($t_cost+$advance_amount_used) < $advance_amount_permitted)
		{
			$_SESSION['navigator']=1;
		}
		else 
		{
			$_SESSION['navigator']=0;
		echo "<script>alert(\"You are exceeding the amount , the amount permitted is ".$advance_amount_permitted." \");</script>";
		}

}


if(isset($_POST['submit']))
{
	
	// Taking values from the imput form 
	$detail=trim($_POST['detail']);
	$t_cost=trim($_POST['cost']);
	$no_unit=trim($_POST['no_unit']);
	$cpu=trim($_POST['cpu']);
	
	//variable to be used in the error check
	$err=0;
	
	if(($t_cost=='' || $t_cost== 0 ) && (($no_unit=='' || $no_unit==0) || ($cpu=='' || $cpu==0)))
	{
	 $err=1; // error check 
	}
	
	
    if($t_cost=='' || $t_cost== 0 )
	$t_cost=$cpu*$no_unit;  // calculation of the total cost 
	
	
	if($detail=='' )
	{
	 $err=2; // Error Check 
	}
	if($err==0)
	{
		
		
	include "dbconnect.php";
	$q=mysql_query("select * from consultancy.project_bill_amount where project_no like '$proj_no'");
	$w=mysql_query("select sum(amount) from consultancy.project_advance_detail where project_no like '$proj_no'");
	
	if($q)
	$arr1=mysql_fetch_array($q);
	if($w)
	$arr2=mysql_fetch_array($w);
	 
	$advance_amount_permitted=($arr1['amount'])*25/100;
	$advance_amount_used=$arr2['sum(amount)'];
	 
	 	
	
	 	if(($t_cost+$advance_amount_used) < $advance_amount_permitted)
		{
			$_SESSION['navigator']=1;
		}
		else 
		{
			$_SESSION['navigator']=0;
		echo "<script>alert(\"You are exceeding the amount , the amount permitted is ".$advance_amount_permitted." \");</script>";
		}
		
		include "dbconnect.php";
		$e="insert into consultancy.project_advance_detail (project_no,advance_detail,amount,cost_per_unit,no_unit) values ('$proj_no','$detail','$t_cost','$cpu','$no_unit')";
		//echo $e;
		mysql_query($e);// ;or die(mysql_error());
		echo "<script>alert(\"The amount left to be used is ".($advance_amount_permitted-($t_cost+$advance_amount_used))." \");</script>";
		 
		
		
	
	}
	
}


if(isset($_POST['j_submit']))
{
	$reason=trim($_POST['justi']);
	
	if($reason == ''  || $reason == "Reasons....")
	{
		echo "<script>alert(\"Please enter the reason !!\")</script>";
	}
	else 
	{
		include "dbconnect.php";
		$_SESSION['navigator']=1;
		$z="insert into consultancy.project_advance_extra (project_no,reason) values ('$proj_no','$reason') ";
		mysql_query($z);//	 or die(mysql_error());
		 
	}
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Advance</title>
<style type="text/css">

.textbox1 {
	width:330px;
}
.textbox2 {
	width:100px;
}
.textbox3 {
	width:100px;
}
.textbox4 {
	width:500px;
	text-shadow:#999;
}
</style>
<script type="text/javascript">
var showRow = (navigator.appName.indexOf("Internet Explorer") != -1) ? "block" : "table-row";

function justification(){
	document.getElementById("justif").style.display=showRow;
	document.getElementById("normal").style.display="none";	
}

</script>
</head>
  <?php 
  include "inctop1.php";
  ?><body class="textbox">
  
  <h2 align="center"><u>ADVANCES - DETAILS</u></h2>
 
 <p align="center">
 <font size="+1" color="#009999">Project Number : <?php  echo $proj_no;?></font><br />
 </p>
 
 
  <table width="800" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <th scope="col" align="center"  width="10%"><u>S. No.</u></th>
    <th scope="col" align="center" width="40%"><u>Details of Work</u></th>
    <th scope="col" align="center" width="10%"><u>Units</u></th>
    <th scope="col" align="center" width="20%"><u>Cost Per Unit <br />(Rs.)</u></th>
    <th scope="col" align="center" width="20%"><u>Total Cost<br />(Rs.)</u></th>
    <th scope="col" align="center">Options</th>
  </tr>
    
  <?php 
  include "dbconnect.php";
  
  $q="select * from consultancy.project_advance_detail where project_no like '$proj_no' order by time asc";
  $query_table=mysql_query($q) or die(mysql_error());
  $s_no=1;
  if($query_table)
 { 
  while($array=mysql_fetch_array($query_table))
  {
   echo "<tr>
   <td align=\"center\">".$s_no."</td>
   <td align=\"center\">".$array['advance_detail']."</td>
   <td align=\"center\">".$array['no_unit']."</td>
   <td align=\"center\">".$array['cost_per_unit']."</td>
   <td align=\"center\">".$array['amount']."</td>
   <td align=\"center\"><a href=\"?ddel=".$array['time']."\">Delete</a>&nbsp;<a href=\"\">Edit</a></td>
   </tr>";
   $flag=1;
  $s_no++;
  }
   
   if($flag==1)
   {
   $q="select sum(amount) from consultancy.project_advance_detail where project_no like '$proj_no'";
   $query=mysql_fetch_array(mysql_query($q)); //or die(mysql_error());
  echo "<tr>
 <td align=\"right\" colspan=\"6\"><font color=\"";
 if($_SESSION['navigator']==1)
 echo "blue";
  else if($_SESSION['navigator']==0)
   echo "red";
 echo "\">Total of all the advances taken :&nbsp;Rs ".$query['sum(amount)']."</font>";
 if($_SESSION['navigator']==0)
 {
 echo "&nbsp;&nbsp;&nbsp;<a href=\"javascript:justification()\">JUSTIFICATION</a>";
 }
 echo "</td></tr>";
   }
 }
  
  ?>


  <form name="" action="" method="post">    
	<tr style="display:none" id="justif">
	<td colspan="5" align="left">Justification : <input type="text" value="Reasons...." name="justi" onclick="value=''"  class="textbox4"/></td>
	<td align="center"><input type="submit" name="j_submit" value="ENTER" width="100%" /></td>
	</tr>

 	<tr id="normal">
    <td align="center"><?php echo $s_no;?></td>
    <td align="center"><input name="detail" type="text" class="textbox1" value=""  width="100%"/></td>
    <td align="center"><select name="no_unit">
    <?php
	$i=0;
	while($i<=100)
	{
    echo "<option value=\"".$i."\">".$i."</option>";
	$i++;
	}
    ?>
	</select></td>
    <td align="center"><input type="text" name="cpu" value=""  class="textbox2"/></td>
    <td align="center"><input type="text" name="cost" value=""  class="textbox3"/></td>
    <td align="center"><input type="submit" name="submit" value="SUBMIT" width="100%" /></td>
  </tr>




<tr>
<td align="right" colspan="6"><input type="submit"  name="print" value="CONFIRM AND PRINT"   <?php  if($_SESSION['navigator']==0) echo "disabled=\"disabled\""; ?> />
</td>
</tr>




</form>  
</table>

<br />
<br />

    <?php 
  include "incbottom.php";
  ?>
</html>
