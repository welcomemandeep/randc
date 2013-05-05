<?php 
session_start();
if(!isset($_SESSION['emp_code']) )
{
	header("location:login.php");
}

if($_SESSION['flag'] != 7 || !isset($_SESSION['project_no']))
{
	header("location:home.php");
}



$projectno=$_SESSION['project_no'] ;

//include "dbconnect.php";

if(isset($_POST['Submit']))
{
	$taxtype=trim($_POST['tax_type']);
	$chequeno=trim($_POST['cheque_no']);
	$mm = trim($_POST['date_2_1']);
	 $dd = trim($_POST['date_2_2']);
 	$yyyy= trim($_POST['date_2_3']);
 	$date1 = $yyyy . '-' . $mm. '-' . $dd;
	$amount=trim($_POST['amount']);
	$payto=trim($_POST['pay_to']);
	$onaccountof=trim($_POST['on_account_of']);
	$accountno=trim($_POST['account_no']);
	$err=0;
	$income=0;
	$service=0;
	$distribution=0;
	
	if($taxtype==""||$chequeno==""||$date1==""||$amount==""||$payto==""||$onaccountof==""||$accountno=="")
	{
		$err=1;		
	}
	if($taxtype=="income")
	{	$income=1;
	}
	else if($taxtype=="service")
	{	$service=1;
	}
	else
	{	$distribution=1;
	}
	if($err==0)
	{
		include "dbconnect.php";
		
		 $query1=mysql_query("INSERT INTO vouchers(
voucher_no ,
cheque_no ,
project_no,
date ,
income ,
service ,
distribution ,
pay_to ,
on_account_of ,
account_no ,
dated ,
amount
) values (NULL,'$chequeno','$projectno',CURRENT_TIMESTAMP,'$income','$service','$distribution','$payto','$onaccountof','$accountno','$date1','$amount')")or die(mysql_error());

$result=mysql_insert_id();
 		header("location:voucher_form_admin2.php?vn=$result");
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
<title>Payment Voucher</title>
<script type="text/javascript">
function other()
{
	alert('Hi');
}
</script>

</head>

<body>
<!-- include it for calender-->
<link rel="stylesheet" type="text/css" href="style/calender/view.css" media="all">
<script type="text/javascript" src="style/calender/calendar.js"></script>
<script type="text/javascript" src="style/calender/view.js"></script>

<?php 
  include "inctop.php";
  ?>
        
     <h2 align="center"><strong><u>R&C Payment Voucher</u></strong></h2>
     
<form action="" method="post" name="payment_voucher">
  <table width="500"  border="1" align="center"  id="payment_voucher" >
   
      <td height="27" bgcolor="#C3C3C3" class="style1">Tax type &nbsp;</td>
      <td align="center" bgcolor="#E8E8E8"> Income &nbsp;
        <input name="tax_type"  value="income" type="radio"/>
        &nbsp;Service&nbsp;
        <input name="tax_type"  value="service" type="radio" />&nbsp;Distribution
        <input name="tax_type"  value="distribution" type="radio" />
        </td>
    </tr>
    <tr>
      <td height="37" bgcolor="#C3C3C3" class="style1">Cheque No &nbsp;</td>
      <td align="center" bgcolor="#E8E8E8"><input type="text" value="" name="cheque_no" /></td>
    </tr>
    
    <tr>
      <td width="260" height="36" bgcolor="#C3C3C3"><span class="style1">Dated &nbsp;</span></td>
      <td width="502" align="center" bgcolor="#E8E8E8" ><li id="2" >
        <label class="description" for="date_2"> </label>
        <span>
          <input id="date_2_1" name="date_2_1" class="element text" size="2" maxlength="2" value="" type="text" />
          /
          <label for="date_2_1">MM</label>
          </span> <span>
            <input id="date_2_2" name="date_2_2" class="element text" size="2" maxlength="2" value="" type="text" />
            /
            <label for="date_2_2">DD</label>
            </span> <span>
              <input id="date_2_3" name="date_2_3" class="element text" size="4" maxlength="4" value="" type="text" />
              <label for="date_2_3">YYYY</label>
              </span> <span id="calendar_2"> <img id="cal_img_2" class="datepicker" src="style/calender/calendar.gif" alt="Pick a date." /> </span>
        <script type="text/javascript">
			Calendar.setup({
			inputField	 : "date_2_3",
			baseField    : "date_2",
			displayArea  : "calendar_2",
			button		 : "cal_img_2",
			ifFormat	 : "%d/%m/%Y",
			onSelect	 : selectDate
			});
		</script>
      </li></td>
    </tr>
  <tr>
      <td height="37" bgcolor="#C3C3C3" class="style1">Account no &nbsp;</td>
      <td align="center" bgcolor="#E8E8E8"><input type="text" value="" name="account_no" /></td>
    </tr>
   <tr>
      <td height="37" bgcolor="#C3C3C3" class="style1">Amount &nbsp;</td>
      <td align="center" bgcolor="#E8E8E8"><input type="text" value="" name="amount" /></td>
    </tr>
    <tr>
      <td height="37" bgcolor="#C3C3C3" class="style1">Pay to &nbsp;</td>
      <td align="center" bgcolor="#E8E8E8"><input type="text" value="" name="pay_to" /></td>
    </tr>
    <tr>
      <td height="37" bgcolor="#C3C3C3" class="style1">On Account of &nbsp;</td>
      <td align="center" bgcolor="#E8E8E8"><input type="text" value="" name="on_account_of" /></td>
    </tr>
    <tr>
<td colspan="2" align="center"><input type="submit" value="Submit Details"  name="Submit"/></td>
</tr>
  </table>
</form>     
    
     
 
 
 

<?php 
  include "incbottom.php";
  ?>

</body>
</html>