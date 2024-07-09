<?php

$serverName = "localhost";
$dBUserrname = "root";
$dBPassword = "";
$dBName = "custlogin";

$conn = mysqli_connect($serverName,$dBUserrname,$dBPassword,$dBName);

if (!$conn) {
	echo "Connection failed!";
}
//$sname, $uname, $password, $db_name