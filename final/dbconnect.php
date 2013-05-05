<?php 

$connection=mysql_connect("localhost","root","segfault");
mysql_select_db('consultancy',$connection) or die(mysql_error());
?>