<?php
include "dbconnect.php";
include "url.php";
function userLog($username, $flag){  //the log of the login process is saved by this function
        $agent = $_SERVER ['HTTP_USER_AGENT'];
        $ip = $_SERVER ['REMOTE_ADDR'];
        if (getenv ( 'HTTP_X_FORWARDED_FOR' ))
                $ip2 = getenv ( 'HTTP_X_FORWARDED_FOR' );
        else
                $ip2 = getenv ( 'REMOTE_ADDR' );
		$rurl=selfURL();
		$rurl=basename($rurl,"");

        $query = mysql_query("INSERT INTO res_userlog (emp_id, local_ip, global_ip, success, browser, url) values ( '$username' , '$ip2' ,'$ip' , '$flag', '$agent', '$rurl')") ;
        //$process_query($query);
    }
	
	// for success of login
	//userLog($username, 1)
	// for failure
	//userLog($username, 0)
?>