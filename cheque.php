<?php
session_start();
include "userlog.php";
include "dbconnect.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

//acess rules

if(!isset($_SESSION['emp_code']) )
{
	header("location:login.php");
}

if($_SESSION['flag'] != 5  || !isset($_SESSION['project_no']))
{
	header("location:home.php");
}


$cur_date=date("Y-m-d");
$projectno=$_SESSION['project_no'] ;





$q=mysql_fetch_array(mysql_query("select * from project_stages where project_no like '$proj_no'"));
$flag=$q['flag'];

if($flag>=11)
{
	header("location:home.php");
}






$q="select amount,service_tax from consultancy.project_bill_amount where project_no like '$projectno'";
$query=mysql_query($q) or die(mysql_error());
$array=mysql_fetch_array($query);
$amount=$array['amount']+$array['service_tax'];



 $err=0;
 $err1=0;
if(isset($_POST['submit']))
{  $projectno=$_SESSION['project_no'];
   $options=trim($_POST['option']);
   
	if($options=="cheque")
	{
 // Variables being initalized 
 $chequeno=trim($_POST['cheque_no']);
 $draweebank=trim($_POST['drawee_bank']);
 $paybleat=trim($_POST['payble_at']);
 $paybleto=trim($_POST['payble_to']);
 $accountno=trim($_POST['account_no']);
 $ramount=trim($_POST['amount']);
 
 $mm = trim($_POST['date_2_1']);
$dd = trim($_POST['date_2_2']);
$yyyy= trim($_POST['date_2_3']);
 $dated= $yyyy . '-' . $mm. '-' . $dd;
 $mm2 = trim($_POST['date_2_1']);
$dd2 = trim($_POST['date_2_2']);
$yyyy2= trim($_POST['date_2_3']);
 $submit_date= $yyyy2 . '-' . $mm2. '-' . $dd2;
 
	
  if($ramount != $amount)
  { $err1=2;
  } 
  if($dated>$cur_date)
  $err1=3;
  if($submit_date>$cur_date)
  $err1=3;
  
  if( $projectno == "" )
 	$err1=1;
	
 if( $chequeno ==  ""  || $draweebank == "" || $paybleat == ""  || $paybleto == "" || $accountno == "" || $ramount == "" || $dated == "" || $submit_date == "")
	{ $err1=1;
	 }
	  
if($err1==0)
	{

  $query1=mysql_query("INSERT INTO consultancy.project_cheque_detail (project_no,cheque_no,drawee_bank,payble_at,payble_to,payee_account_no,amount,dated,submit_date) VALUES('$projectno','$chequeno','$draweebank','$paybleat','$paybleto','$accountno','$ramount','$dated','$submit_date')");
 
 
 
  $cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_bill_amount SET hod_approval='1' , hod_time='$cur_time' WHERE project_no = '$projectno' ");// or die(mysql_error());

		mysql_query("UPDATE consultancy.project_stages SET flag='11' WHERE project_no = '$projectno' ");// or die(mysql_error());
		mysql_query("UPDATE consultancy.project_track_record SET 11_time='$cur_time', `11`='1'  WHERE project_no = '$projectno' ");// or die(mysql_error());


		$qq=mysql_fetch_array(mysql_query("select * from project_mark_to where project_no like '$projectno'"));
		$hod=$qq['hod_emp_code'];
		$msg="Cheque/Cash details are entered  for ".$project_no;
		mysql_query("insert into notify (project_no,emp_code,message) values('$projectno','$hod','$msg')"); 
 
 
 
 }
 }
 
 else if($options == "cash")
 {
 
 $num_1=trim($_POST['num1']);
 $num_2=trim($_POST['num2']);
 $num_3=trim($_POST['num3']);
 $num_4=trim($_POST['num4']);
 $num_5=trim($_POST['num5']);
 $num_6=trim($_POST['num6']);
 $num_7=trim($_POST['num7']);
 $num_8=trim($_POST['num8']);
 $num_9=trim($_POST['num9']);
  $mm3 = trim($_POST['date_3_1']);
$dd3 = trim($_POST['date_3_2']);
$yyyy3= trim($_POST['date_3_3']);
 $submit_date2= $yyyy3 . '-' . $mm3. '-' . $dd3;
 
  $cash_amount=trim($_POST['amount2']);
  
  if($cash_amount != $amount)
      $err=4;

  if($submit_date2>$cur_date)
  $err=5;
  
  //	if(isset($_POST['total']))
	//{
	$total_cash=($num_1*1000)+($num_2*500)+($num_3*100)+($num_4*50)+($num_5*20)+($num_6*10)+($num_7*5)+($num_8*2)+($num_9*1);	
    $cashtotal=trim($_POST['total']);
 
 //if($cashtotal!=$cash_amount)
 //$err=3;
 if($cashtotal != $total_cash)
  $err=2;
  
	//}
  
  if( $projectno == "" || $cash_amount == "" || $submit_date2 == "")
 	$err=1;
	
if($err==0)
	{
 $qu= "INSERT INTO consultancy.project_cash_detail (project_no,submit_date,cash_amount,no_1000,no_500,no_100,no_50,no_20,no_10,no_5,no_2,no_1) VALUES('$projectno','$submit_date2','$cash_amount','$num_1','$num_2','$num_3','$num_4','$num_5','$num_6','$num_7','$num_8','$num_9')" ;
  $query2=mysql_query($qu) or die(mysql_error());
  
  
   $cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_bill_amount SET hod_approval='1' , hod_time='$cur_time' WHERE project_no = '$projectno' ");// or die(mysql_error());

		mysql_query("UPDATE consultancy.project_stages SET flag='11' WHERE project_no = '$projectno' ");// or die(mysql_error());
		mysql_query("UPDATE consultancy.project_track_record SET 11_time='$cur_time', `11`='1'  WHERE project_no = '$projectno' ");// or die(mysql_error());


		$qq=mysql_fetch_array(mysql_query("select * from project_mark_to where project_no like '$projectno'"));
		$hod=$qq['hod_emp_code'];
		
		$msg="Cheque/Cash details are entered  for ".$project_no;
		 mysql_query("insert into notify (project_no,emp_code,message) values('$projectno','$hod','$msg')"); 
  
  
  
  
  
  
 }
} //else if
 
 $err2=0;
 if($options == "")
 $err2=1;
 if($err2==0 && ($err1==0 && $err==0))
	{
 $que= "update project_bill_amount set mode='$options' where project_no='$projectno'" ;
  $query3=mysql_query($que) or die(mysql_error());
  header("location:home.php");
 }
 
 /* 		 $cur_time=date("Y-m-d  g:i:s");
		mysql_query("UPDATE consultancy.project_bill_amount SET hod_approval='1' , hod_time='$cur_time' WHERE project_no = '$project_no' ");// or die(mysql_error());

		mysql_query("UPDATE consultancy.project_stages SET flag='11' WHERE project_no = '$project_no' ");// or die(mysql_error());
		mysql_query("UPDATE consultancy.project_track_record SET 11_time='$cur_time', `11`='1'  WHERE project_no = '$project_no' ");// or die(mysql_error());


		$qq=mysql_fetch_array(mysql_query("select * from project_mark_to where project_no like '$project_no'"));
		$hod=$qq['hod_emp_code'];
		
		$msg="Cheque/Cash details are entered  for ".$project_no;
		 mysql_query("insert into notify (project_no,emp_code,message) values('$project_no','$hod','$msg')"); 
  */
  mysql_close();

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CHEQUE/DRAFT/CASH</title>
<script>
	function check()
	{
        var a = document.getElementById('matchs');
		var x=document.getElementById("new").value;
		var y=document.getElementById("old").value;
		
		
		if (y.length==0) {
		a.innerHTML = '<span style="color:red"><img src=error.png></img><font size=-1></font></span>';}
		else if(y==x){
		a.innerHTML = '<span style="color:blue"><img src=images/check_good.gif></img></span>';}
		else {
		a.innerHTML = '<span style="color:red"><img src=error.png></img></span>';}
		
		
	}
	
function showUser(str)
{
if (str.length==0)
  {
  document.getElementById("email").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("email").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","email_check.php?q="+str,true);
xmlhttp.send();
}

function capLock(e){
 kc = e.keyCode?e.keyCode:e.which;
 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
  document.getElementById('divMayus').style.visibility = 'visible';
 else
  document.getElementById('divMayus').style.visibility = 'hidden';
}

function valueMap(num)
{
	switch(num)
	{
		case 1: return 1000 ;
		case 2: return 500 ;
		case 3: return 100 ;
		case 4: return 50 ;
		case 5: return 20 ;
		case 6: return 10 ;
		case 7: return 5 ;
		case 8: return 2 ;
		case 9: return 1 ;
		default: return 0;
	}
}

function calculate(num)
{
	var value = valueMap(num) ;
	var resultDiv = document.getElementById("result"+num) ;
	var txtDiv = document.getElementById("num"+num) ;
	var rowTotal =value*txtDiv.value ;
	resultDiv.innerHTML = rowTotal ;	
	calculateTotal();
}

function calculateTotal()
{
	var i =0  ;
	var Total = 0 ;
	for(i=1; i<10; i++)
		Total += parseInt(document.getElementById("result"+i).innerHTML) ; 
	document.getElementById("result10").innerHTML = Total ; 
	document.getElementById("input_total").value = Total ; 
}

function showCash(val)
{
	var cashDiv = document.getElementById("cashDetail") ;
	if(!val)
		cashDiv.style.visibility = "hidden" ;
		else
		cashDiv.style.visibility = "visible" ;
		
}

</script>


</head>

<body>
<link rel="stylesheet" type="text/css" href="style/calender/view.css" media="all">
<script type="text/javascript" src="style/calender/calendar.js"></script>
<script type="text/javascript" src="style/calender/view.js"></script>

<?php include "inctop.php" ?><br />
<br /><div align="centre">
<?php 
  if($err1==1)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! One or more Details are missing.</p>";
 if($err1==2)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Cheque/Draft amount is not equal to Bill amount</p>";
 if($err2==1)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Please first select the mode of payment.</p>";
 if($err==4)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Cash Total amount is not equal to Bill amount.</p>";
 if($err==2)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Cash Total amount error.</p>";
  if($err==1)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! One or more Details are missing.</p>";
  if($err==3)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Cash Amount is not equal to total amount through denominations table.</p>";
 if($err1==3)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Date entered exceeds the current date.</p>";
 if($err==5)
 echo "<p style=\"color:#FF0000; text-decoration:blink; \">ERROR!!! Date entered exceeds the current date.</p>";
 ?></div>
<form action="" method="post" name="register">

<div align="center">


<table align="center" cellpadding="0" cellspacing="2" bgcolor="#FFFFFF">
<tr>
<th align="center" colspan="2">Mode of Payment</th>
</tr>


<tr>
<td><strong>Payment Mode</strong>&nbsp;:</td>
<td>Cheque/Draft &nbsp;<input name="option" onclick="showCash(false);"  value="cheque" type="radio"/>&nbsp;Cash&nbsp;<input name="option" onclick="showCash(true);"  value="cash" type="radio"/></td>
</tr>

<tr>
<th align="center" colspan="2">CHEQUE/DRAFT DETIALS</th>
</tr>

<tr>
<td width="159"><strong>Cheque/Draft Number</strong>&nbsp;:</td>
<td width="270"><input name="cheque_no" type="text" value="<?php echo $chequeno; ?>" onclick="value=''"  maxlength="7" /></td>
</tr>

<tr>
<td><strong>Dated </strong>&nbsp;:</td>
<td>
<li id="1" >
		<label class="description" for="date_1"> </label>
		<span>
			<input id="date_1_1" name="date_1_1" class="element text" size="2" maxlength="2" value="<?php echo $mm; ?>" type="text"> /
			<label for="date_1_1">MM</label>
		</span>
		<span>
			<input id="date_1_2" name="date_1_2" class="element text" size="2" maxlength="2" value="<?php echo $dd; ?>" type="text"> /
			<label for="date_1_2">DD</label>
		</span>
		<span>
	 		<input id="date_1_3" name="date_1_3" class="element text" size="4" maxlength="4" value="<?php echo $yyyy; ?>" type="text">
			<label for="date_1_3">YYYY</label>
		</span>
	
		<span id="calendar_1">
			<img id="cal_img_1" class="datepicker" src="style/calender/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "date_1_3",
			baseField    : "date_1",
			displayArea  : "calendar_1",
			button		 : "cal_img_1",
			ifFormat	 : "%d/%m/%Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		
</td>
</tr>

<tr>
<td><strong>Drawee Bank</strong>&nbsp;:</td>
<td><input name="drawee_bank" type="text" value="<?php echo $draweebank; ?>" onclick="value=''"  maxlength="40" /></td>
</tr>

<tr>
<td><strong>Payble At</strong>&nbsp;:</td>
<td>
<text area><textarea name="payble_at" id="textarea" value="<?php echo $paybleat; ?>" cols="16" rows="3" onClick="value=''"  />
</textarea></text area></td></tr>

<tr>
<td><strong>Payble To</strong>&nbsp;:</td>
<td><input name="payble_to" type="text" value="" onclick="value='<?php echo $paybleto; ?>'"  maxlength="40" /></td>
</tr>

<tr>
<td><strong>Payee_account_no</strong>&nbsp;:</td>
<td><input name="account_no" type="text" value="<?php echo $accountno; ?>" onclick="value=''"  maxlength="20" /></td>
</tr>

<tr>
<td><strong>Amount</strong>&nbsp;:</td>
<td><input name="amount" type="text" value="<?php echo $ramount; ?>" onclick="value=''"  maxlength="10" /></td>
</tr>

<tr>
<td><strong>Cheque/Draft Submission Date</strong>&nbsp;:</td>
<td>
<li id="2" >
		<label class="description" for="date_2"> </label>
		<span>
			<input id="date_2_1" name="date_2_1" class="element text" size="2" maxlength="2" value="<?php echo $mm2; ?>" type="text"> /
			<label for="date_2_1">MM</label>
		</span>
		<span>
			<input id="date_2_2" name="date_2_2" class="element text" size="2" maxlength="2" value="<?php echo $dd2; ?>" type="text"> /
			<label for="date_2_2">DD</label>
		</span>
		<span>
	 		<input id="date_2_3" name="date_2_3" class="element text" size="4" maxlength="4" value="<?php echo $yyyy2; ?>" type="text">
			<label for="date_2_3">YYYY</label>
		</span>
	
		<span id="calendar_2">
			<img id="cal_img_2" class="datepicker" src="style/calender/calendar.gif" alt="Pick a date.">	
		</span>
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
		 
		</li>		
</td>
</tr>

<tr>
<td colspan="2" align="center"><div align="center">
  <input type="submit" name="submit" value="CONFIRM DETAILS" />
</div></td>
</tr>


<tr>

<th align="center" colspan="2"><div id="cashDetail"><table width="100%" border="1">
<tr>
  <th align="center" colspan="3">CASH DETIALS</th>
</tr>

<tr>
<td><strong>Cash Submission Date</strong>&nbsp;:</td>
<td colspan="2">
<li id="3" >
		<label class="description" for="date_3"> </label>
		<span>
			<input id="date_3_1" name="date_3_1" class="element text" size="2" maxlength="2" value="<?php echo $mm3; ?>" type="text"> /
			<label for="date_3_1">MM</label>
		</span>
		<span>
			<input id="date_3_2" name="date_3_2" class="element text" size="2" maxlength="2" value="<?php echo $dd3; ?>" type="text"> /
			<label for="date_3_2">DD</label>
		</span>
		<span>
	 		<input id="date_3_3" name="date_3_3" class="element text" size="4" maxlength="4" value="<?php echo $yyyy3; ?>" type="text">
			<label for="date_3_3">YYYY</label>
		</span>
	
		<span id="calendar_3">
			<img id="cal_img_3" class="datepicker" src="style/calender/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "date_3_3",
			baseField    : "date_3",
			displayArea  : "calendar_3",
			button		 : "cal_img_3",
			ifFormat	 : "%d/%m/%Y",
			onSelect	 : selectDate
			});
		</script>
		 
		</li>		
</td>
</tr>

<tr>
<td><strong>Cash Amount</strong>&nbsp;:</td>
<td colspan="2"><input name="amount2" type="text" value="<?php echo $cash_amount; ?>" onclick="value=''"  maxlength="10" /></td>
</tr>

  <tr>
    <td width="93"><div align="center">Denomination</div></td>
    <td width="77"><div align="center"> Number</div></td>
    <td width="174"><div align="center">Total</div></td>
  </tr>
  
  <tr>
    <td>Rs 1000 X </td>
    <td><input id="num1" name="num1" type="" value="<?php echo $num_1; ?>" onkeyup="calculate(1);"  maxlength="8" /></td>
    <td><div id="result1">0</div></td>
  </tr>
  <tr>
    <td>Rs 500 X </td>
    <td><input id="num2" name="num2" type="" value="<?php echo $num_2; ?>" onkeyup="calculate(2);"  maxlength="8" /></td>
    <td><div id="result2">0</div></td>
  </tr>
  <tr>
    <td>Rs 100 X </td>
    <td><input id="num3" name="num3" type="" value="<?php echo $num_3; ?>" onkeyup="calculate(3);"  maxlength="8" /></td>
    <td><div id="result3">0</div></td>
  </tr>
  <tr>
    <td>Rs 50 X </td>
    <td><input id="num4" name="num4" type="" value="<?php echo $num_4; ?>" onkeyup="calculate(4);"  maxlength="8" /></td>
    <td><div id="result4">0</div></td>
  </tr>
  <tr>
    <td>Rs 20 X </td>
    <td><input id="num5" name="num5" type="" value="<?php echo $num_5; ?>" onkeyup="calculate(5);"  maxlength="8" /></td>
    <td><div id="result5">0</div></td>
  </tr>
  <tr>
    <td>Rs 10 X </td>
     <td><input id="num6" name="num6" type="" value="<?php echo $num_6; ?>" onkeyup="calculate(6);"  maxlength="8" /></td>
    <td><div id="result6">0</div></td>
  </tr>
  <tr>
    <td>Rs 5 X </td>
 <td><input id="num7" name="num7" type="" value="<?php echo $num_7; ?>" onkeyup="calculate(7);"  maxlength="8" /></td>
    <td><div id="result7">0</div></td>
  </tr>
  <tr>
    <td>Rs 2 X </td>
    <td><input id="num8" name="num8" type="" value="<?php echo $num_8; ?>" onkeyup="calculate(8);"  maxlength="8" /></td>
    <td><div id="result8">0</div></td>
  </tr>
  <tr>
    <td>Rs 1 X </td>
     <td><input id="num9" name="num9" type="" value="<?php echo $num_9; ?>" onkeyup="calculate(9); "  maxlength="8" /></td>
    <td><div id="result9">0</div></td>
  </tr>
  <tr>
    <td colspan="2">Total</td>
    <td><input name="total" type="hidden" value="0" id="input_total" /><div id="result10">0</div></td>
  </tr>
  
  <tr>
<td colspan="3" align="center"><div align="center">
  <input type="submit" name="submit" value="CONFIRM CASH DETAILS" />
</div> </td>
</tr>

</table>
</div>
</th>
</tr
></table>
</div>
</form>

<?php include "incbottom.php"?>
</body>
</html>