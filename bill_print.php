<?php
session_start();
include "dbconnect.php";
include "userlog.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

//Access Rules 


if(!isset($_SESSION['emp_code']))
{
 echo "<script>alert(\"Please login first !! \")</script>";
 echo "<script>window.location.href=\"login.php\"</script>";	
 die(" Error ,Turn On Your Javascript !!");
}

if(($_SESSION['flag'] !=5 && $_SESSION['flag'] !=4) || !isset($_SESSION['project_no']) )
{
	 echo "<script>alert(\"you are not allowed to enter this page".$_SESSION['flag']." !! \")</script>";
	 echo "<script>window.location.href=\"home_hod.php\"</script>";	
	 die(" Error ,Turn On Your Javascript !!");	
}


//Access Rules 


include "numbers-words.php";
$proj=$_SESSION['project_no'];

 $billd="SELECT * FROM project_bill_detail where project_no='$proj'";
 $bd="SELECT * FROM project_bill_amount where project_no='$proj'";
		   $billd_r=mysql_query($billd);
		   $bd_r=mysql_query($bd);
		   $sno=1;
  
	$bd_arr=mysql_fetch_array($bd_r);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BILL</title>
</head>

<body>
<h2 align="center"><u>DEPARTMENT OF APPLIED MECHANICS</u></h2>
<h2 align="center"><u>Moti Lal Nehru National Institute of Technology</u></h2>
<h2 align="center"><u> Allahabad- 211004</u></h2>
<table width="400" border="0" align="right">
  <tr>
    <td width="78" height="42"><strong>Bill No.</strong></td>
    <td width="109"><?php echo $bd_arr['bill_no'];?></td>
    <td width="41"><strong>Date</strong></td>
    <td width="154"><p><?php echo date("F j, Y g:i a ", strtotime($bd_arr['bill_time'])) ?></p></td>
  </tr>
  <tr>
    <td height="34"><p><strong>Letter No.</strong></p></td>
    <?php 
	
		  $letter="SELECT * FROM project_letter_detail WHERE project_no='$proj'";
		   $letter_r=mysql_query($letter);
$letter_arr=mysql_fetch_array($letter_r);
	?>
    <td> <?php   echo $letter_arr['letter_no'];?></td>
    <td><strong>Date</strong></td>
    <td><?php echo date("F j, Y g:i a ", strtotime($letter_arr['time'])) ?>&nbsp;</td>
  </tr>
</table>
<blockquote>
  <blockquote>
    <blockquote>
      <table width="200" height="60" border="0">
        <tr>
          <td><p>
          <b>
            <?php
		  $addr_org="SELECT * FROM project_letter_detail WHERE project_no='$proj'";
		   $addr_org_r=mysql_query($addr_org);
		   //echo $addr_org_r;
  while($addr_org_arr=mysql_fetch_array($addr_org_r))
	{		//print_r($addr_org_arr);
		echo $addr_org_arr['organization']."<br />".$addr_org_arr['street']."<br />".$addr_org_arr['city']."<br />".$addr_org_arr['state']."<br />".$addr_org_arr['pin_code'];}
		  ?>
        </b>
          </p></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </blockquote>
  </blockquote>
  <blockquote>
    <blockquote>&nbsp;</blockquote>
  </blockquote>
</blockquote>
<table width="1014" border="1" align="center">

  <tr bgcolor="#FFFFFF">
    <th width="53"  scope="col"><strong>Sno</strong></th>
    <th width="398" scope="col"><strong>Particulars</strong></th>
    <th width="150" scope="col"><strong>Quantity</strong></th>
    <th width="196" scope="col"><p><strong>Rate</strong></p>
    <p><strong>Rs.      P</strong></p></th>
   <th width="183" scope="col"><p><strong>Amount</strong></p>
   <p><strong>Rs.    P</strong></p></th>
 
  </tr>
 <?php
  while($billd_name=mysql_fetch_array($billd_r))
	{
 echo '<tr bgcolor="#FFFFFF">';
  echo  '<th height="59" scope="col">'  . $sno++ . '</th>';
   echo '<th scope="col"><strong>'.  $billd_name['detail'] . '</strong></th>';
   echo '<th align="center" valign="middle" scope="col">' .  $billd_name['quantity'] .'</th>';
   echo '<th scope="col">' .  $billd_name['cost_per_unit'] .'</th>';
  echo  '<th scope="col">' .  $billd_name['amount'] . '</th>';
 echo '</tr>';
	}
  ?>

<blockquote>
  <blockquote>
    
      <tr>
      <?php
	  $amt="SELECT * FROM project_bill_amount WHERE project_no='$proj'";
	  $amt_r=mysql_query($amt);
	  $amt_arr=mysql_fetch_array($amt_r);
	  ?>
      <td></td>
      <td></td>
      <td></td>
        <td width="196"  align="right"><strong>Total</strong></p></td>
        <td width="183"><?php  echo $amt_arr['amount'];?> </td>
     
  </tr>
      <tr>
       <?php
	  $query=mysql_query("select * from consultancy.standard_rates where name like \"service_tax\"");
$array_st=mysql_fetch_array($query);
$st=$array_st['rate'];
?>
 <td></td>
      <td></td>
      <td></td>
        <td><p><strong>Add Servive tax @ <?php echo $st;?>%</strong></p></td>
        <td><?php echo $amt_arr['service_tax']; ?></td>
      
      </tr>
      <tr>
       <td></td>
      <td></td>
      <td></td>
        <td><p><strong>Grand Total</strong></p></td>
        <td><strong><?php echo ($a=($amt_arr['service_tax']+$amt_arr['amount']));?></strong></td>
        
      </tr>
</table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>--------------------------------------------------------------------------------------------------------------------------------------------------------</p>
    <p>Amount in words :<strong> <?php echo (number_to_words($a));?></strong></p>
    <pre></pre>
    <?php
	if($a>500000)
	{
		echo ' <table width="200" border="0" align="right">
      <tr>
        <td><strong>Director</strong></td>
      </tr>
    </table>';
	}
	?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="200" border="0" align="right">
      <tr>
        <td><strong>Head Of the Department</strong></td>
      </tr>
    </table>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <blockquote>
                  <h3>&nbsp;</h3>
</blockquote>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
    <pre>Please Pay crossed local cheque or draft on favour of </u><strong><u>Dean Research and Consultancy, </u></strong><strong><u>Motilal Nehru National Institute of Technology,

</u></strong><strong><u>Allahabad</u> </strong>and forward it to Head, Department of Applied Mechanics.</pre>
<pre>Please quote our bill no while making payments.</pre>
    <pre>&nbsp;</pre>
  </blockquote>
</blockquote>

<div align="center">
<form action="home.php" method="post">
<input type="submit" name="print" value="PRINT" onclick="window.print()" />
</form>
</div>

</body>
</html>
