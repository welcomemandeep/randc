<?php

	
	$result=mysql_query("SELECT * FROM User ");
	 print "</br>";
	
	 Print "<table border cellpadding=3>";
	 print"<tr>";
	 print "<th>USER ID: </th>";
	 print "<th>LOGIN ID: </th>";
	 print "<th>PASSWORD: </th>";
	 print "<th>ROLE: </th>";
	 print "<th>ADDRESS: </th>";
	 print "<th>CONTACT NO: </th>";
	 print "<th>EMAIL ID: </th>";
	 print"</tr>";
		
	while($info=mysql_fetch_assoc($result))
	{	print "<tr>";
		print "<td>".$info['User_Id'] ."</td>";
		print "<td>".$info['Login_Id'] ."</td>";
		print "<td>".$info['Password'] ."</td>";
		print "<td>".$info['Role'] ."</td>";
	 	print "<td>".$info['Address'] ."</td>";
		print "<td>".$info['Contact_No'] ."</td>";
		print "<td>".$info['Email_Id'] ."</td>";
	}
	print "</table>";
	mysql_close($db);
	
?>
