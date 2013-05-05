<?php 
session_start();
include "userlog.php";
include "dbconnect.php";
$emp_code=$_SESSION['emp_code'];
userLog($emp_code, 1);

if(!isset($_SESSION['emp_code']) )
{
	header("location:login.php");
}

if(($_SESSION['flag']!=5 && $_SESSION['flag']!=4) || !isset($_SESSION['project_no']))
{
	header("location:home.php");
}


$project_no=$_SESSION['project_no'];
//$emp_code=$_SESSION['emp_code'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Advance Form</title>
</head>

<body onload="window.print(); window.close();">
<h2 align="center">RESEARCH &amp; CONSULTANCY </h2>
<h2 align="center">MotiLal Nehru National Institute of Technology, Allahabad</h2>
<h2 align="center"><u>Application for Advance</u></h2>
<h3 align="center">( To be filled in duplicate )</h3>

<?php 

include "numbers-words.php";


$sql="SELECT * FROM personalinfo WHERE emp_code =\"".$emp_code."\"";
$result1 = mysql_query($sql);
$array1 = mysql_fetch_array($result1);

$sq2="SELECT * FROM project_advance_detail WHERE project_no = \"".$project_no."\"";
$result2 = mysql_query($sq2);
$array2=mysql_fetch_array($result2);

$sq3="SELECT * FROM project_bill_detail  WHERE project_no =\"".$project_no."\"";
$result3 = mysql_query($sq3);
$array3=mysql_fetch_array($result3);

$sq4="SELECT * FROM project_cheque_detail WHERE project_no =\"".$project_no."\"";
$result4 = mysql_query($sq4);
$array4=mysql_fetch_array($result4);

$sq5="SELECT * FROM project_bill_amount WHERE project_no =\"".$project_no."\"";
$result5 = mysql_query($sq5);
$array5=mysql_fetch_array($result5);


?>


<form action="" method="post" name="login" style="width:400px;" >
 <table width="1089" height="1037" align="center" cellspacing="10px" style="width:inherit">
     <tr>
       <td width="128">Voucher No.:</td>
       <td width="151">36</td>
       <td width="81">&nbsp;</td>
       <td width="124">&nbsp;</td>
       <td width="85">Cheque No.: </td>
       <td width="114"><?php echo $array4['cheque_no']?></td>
       <td colspan="2" >Amount : (Rs.)</td>
       <td width="88"><?php echo $array4['amount']?></td>
     </tr>
     <tr>
       <td width="128">Date : </td>
       <td width="151"><?php echo $array4['time']?></td>
       <td width="81">&nbsp;</td>
       <td>&nbsp;</td>
       <td width="85">Date : </td>
       <td><?php echo $array4['dated']?></td>
     </tr>
     <tr>
       <td colspan="11"><hr/></td>
     </tr>
     <tr>
       <td width="128" height="22">1. Employee Code :</td>
       <td width="151"><?php echo $array1['emp_code']?></td>
       
      
       <td width="81">Name :</td>
       <td width="124"><?php echo $array1['name']?></td>
       <td width="85">Design :</td>
       <td width="114"><?php echo $array1['designation']?></td>
       <td width="41">&nbsp;</td>
       <td width="55">Deptt :</td>
       <td width="88"><?php echo $array1['department']?></td>
     </tr>
     <tr>
       <td colspan="4">2. Project No. & Date : <?php echo $array2['project_no']?></td>
       <td colspan="2">Project Amount Recieved : (Rs.)</td>
       <td colspan="3"><?php echo $array2['advance_detail']?></td>
       <td width="90" colspan="2">&nbsp;</td>
     </tr>
     <tr>
       <td colspan="6">3. Purpose for which is needed :</td>
     </tr>
     <tr>
       <td colspan="6">&nbsp;</td>
     </tr>
     <tr>
       <td colspan="6">4. Justification for release of Advance :</td>
     </tr>
     <tr>
       <td colspan="2">5. Estimate for the amount required :  </td>
       <td colspan="2"><?php echo $array2['amount']?> </td>
       <td colspan="2">&nbsp;</td>
     </tr>
     <tr>
       <td colspan="2">6. Head of Account :</td>
       <td colspan="2">Consultancy</td>
       <td colspan="2">Head of Account Code :</td>
       <td colspan="3">12345</td>
       <td colspan="2">&nbsp;</td>
     </tr>
     <tr>
       <td colspan="11">7. Particulars of advance for which the employee yet to settle :</td>
     </tr>
     <tr>
       <td height="114" colspan="11"><table width="936" border="1">
         <tr>
           <td width="134"><div align="center">Adv. Trans No.</div></td>
           <td width="98"><div align="center">Date</div></td>
           <td width="235"><div align="center">Head of account Code/Name</div></td>
           <td width="298"><div align="center">Purpose for which adv. drown</div></td>
           <td width="137"><div align="center">Amount (Rs.)</div></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
       </table></td>
     </tr>
     <tr>
       <td colspan="11">&nbsp;</td>
     </tr>
     <tr>
       <td height="22" colspan="11"><table width="930" border="0">
         <tr>
           <td colspan="2"><strong>Comment/Recommendation</strong></td>
           <td colspan="2"><strong>Signature of Employee </strong></td>
           <td width="12">&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><strong>H.O.D.</strong></td>
           <td colspan="2"><strong>Date :</strong> 26/05/11</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td width="56">&nbsp;</td>
           <td width="647">&nbsp;</td>
           <td width="39">&nbsp;</td>
           <td width="154"><strong>Approved</strong></td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td colspan="2"><strong>Signature of the Dean (R &amp; C) </strong></td>
           <td colspan="2"><strong>Signature of Director</strong> </td>
           <td>&nbsp;</td>
         </tr>
       </table></td>
     </tr>
     
     <tr>
       <td height="26" colspan="11">8. Processing by the Account Section ( To be used by the Account Section )</td>
     </tr>
     <tr>
       <td height="125" colspan="11"><table width="929" border="1">
         <tr>
           <td width="144"><div align="center">Amount of Advance</div></td>
           <td width="222"><div align="center">Head of account Code/Name</div></td>
           <td width="169"><div align="center">Allotted Amount (Rs.)</div></td>
           <td width="180"><div align="center">Expended Amount (Rs.)</div></td>
           <td width="180"><div align="center">Adv. Trans. No.</div></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
       </table>
         <table width="997" border="0">
           <tr>
             <td colspan="3">&nbsp;</td>
           </tr>
           <tr>
             <td colspan="3">&nbsp;</td>
           </tr>
           
           <tr>
             <td width="382"><strong>Asstt. Accountant </strong></td>
             <td width="324"><strong>Dean (R &amp; C) </strong></td>
             <td width="277"><strong>Director</strong></td>
           </tr>
         </table>
         <table width="980" border="0">
           
           <tr>
             <td colspan="3">9. Received the amount of<u> Rs 54,000 </u>  (in words <u>fifty thousand only</u>) as an advance for the purpose mentioned above and I am aware of the fact  </td>
           </tr>
           <tr>
             <td colspan="3"> that I am required to settle the advance within a month from the date of receipt advance drawn. I have also noted the Advance Transaction No<u> 98770 </u>for  </td>
           </tr>
           <tr>
             <td colspan="2"> giving reference at the time of refund or submitting the adjustment account. </td>
             <td width="259">&nbsp;</td>
           </tr>
           <tr>
             <td width="60">&nbsp;</td>
             <td width="647">&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           
           <tr>
             <td><strong>Date:</strong> </td>
             <td>&nbsp;</td>
             <td><strong>Signature of the Employee </strong></td>
           </tr>
         </table></td>
     </tr>
     
     <tr><td height="26" colspan="11" align="center"><input name="submit" type="submit" value="Print the Application" />
     </td></tr>
  </table>
</form>
            

</body>
</html>