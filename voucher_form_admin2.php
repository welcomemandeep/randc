<?php session_start();
$voucherno=$_GET['vn'];
include "dbconnect.php";
$query=mysql_query("select * from voucher_detail where voucher_no like '$voucherno'");

if(mysql_num_rows($query)==0)
$_SESSION['navigator']=0;
mysql_close();


if(isset($_POST['confirm']))
{
	
	include "dbconnect.php";
	$query=mysql_query("select sum(amount) from voucher_detail where voucher_no like '$voucherno'");
	$am_array=mysql_fetch_array($query);
	$amount=$am_array['sum(amount)'];
	$query2=mysql_query("select amount from vouchers where voucher_no like '$voucherno'");
	$am_array2=mysql_fetch_array($query2);
	$amount2=$am_array2['amount'];
	mysql_close();
	if($amount==$amount2)
	{
		echo "<script>alert(\"Total Amount : Rs ".$amount." \")</script>";
   echo "<script>window.location.href=\"voucher_print.php\"</script>";
   	die(" Error ,Turn On Your Javascript !!");
	}
	else
	{	echo "<script>alert(\" Amount entered here and cheque's amount is not same \")</script>";
	}

	
	
}
if(isset($_GET['ddel']))
{
	$time=$_GET['ddel'];
	include "dbconnect.php";
 mysql_query("delete from voucher_detail where time  like '$time' ") ;//or die(mysql_error());
 mysql_close();
 $_SESSION['navigator']=0;
}

if(isset($_POST['submit']))
{
	$rob=trim($_POST['reference_of_bill']);
	$amount=trim($_POST['amount']);
	$hoa=trim($_POST['head_of_account']);
	$budget=trim($_POST['budget']);
	$eipb=trim($_POST['expenditure_including_present_bill']);
	$err=0;
	
	
	if($amount=="")
	{$err=1;}
	
	if($err==0)
	{
		include "dbconnect.php";
		$e="insert into  voucher_detail (voucher_no,reference_of_bill,amount,head_of_account,budget,expenditure_including_present_bill,time) values ('$voucherno','$rob','$amount','$hoa','$budget','$eipb
		',CURRENT_TIMESTAMP)";
		
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
<title>Untitled Document</title>
</head>

<body>
 <h2 align="center"><strong><u>R&C Payment Voucher</u></strong></h2>
<table width="738" border="1">
  <tr>
   <th width="90" scope="col"> Sr.no&nbsp;</th>
    <th width="168" scope="col">Reference Of Bill &nbsp;</th>
    <th width="90" scope="col"> Amount&nbsp;</th>
    <th width="95" scope="col">Head Of Account&nbsp;</th>
    <th width="119" scope="col">Budget&nbsp;</th>
    <th width="92" scope="col">Expenditure&nbsp;</th>
  	<th width="134" scope="col">options&nbsp;</th>
 
  </tr>
   <?php 
  include "dbconnect.php";
  
  $q="select * from voucher_detail where voucher_no like '$voucherno'";
  $query_table=mysql_query($q) or die(mysql_error());
  $s_no=1;
  if($query_table)
 { 
  while($array=mysql_fetch_array($query_table))
  {
   echo "<tr>
   <td align=\"center\">".$s_no."</td>
   <td align=\"center\">".$array['reference_of_bill']."</td>
   <td align=\"center\">".$array['amount']."</td>
   <td align=\"center\">".$array['head_of_account']."</td>
   <td align=\"center\">".$array['budget']."</td>
  
   <td align=\"center\">".
   $array['expenditure_including_present_bill']."</td>
   <td align=\"center\"><a href=\"?ddel=".$array['time']."&vn=".$voucherno."\">Delete</a></td>
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
    <input type="text" name="reference_of_bill" value="" />
    </td>
    <td align="center">
    <input type="text" name="amount" value="" />
    </td>
    <td align="center">
    <input type="text" name="head_of_account" value="" />
    </td>
    <td align="center"><input type="text" name="budget" value="" />
    </td>
    <td align="center"><input type="text" name="expenditure_including_present_bill" value="" /></td>
    <td align="center"><input type="submit" name="submit" value="SUBMIT" width="100%" /></td>
  </tr>
  
  <tr  align="center">
  <td align="left" colspan="5"></td>
  <td><input type="submit"  value="CONFIRM AND PRINT" name="confirm" <?php  if($_SESSION['navigator']==0) echo "disabled=\"disabled\""; ?> /></td>
  </tr>
  </form>
  
</table>
 
</body>
</html>