<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uid']) && isset($_POST['pwd'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['uid']);
	$pwd = validate($_POST['pwd']);

	if (empty($username)) {
		header("Location: index.html?error=UserNameisrequired");
	    exit();
	}else if(empty($pwd)){
        header("Location: index.html?error=passwordisrequired");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE usersUid='$username' AND usersPwd='$pwd'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['usersUid'] === $username && $row['usersPwd'] === $pwd) {
            	$_SESSION['usersUid'] = $row['usersUid'];
            	$_SESSION['usersName'] = $row['usersName'];
            	$_SESSION['usersId'] = $row['usersId'];
            	header("Location: http://localhost/Ansh%20Pardeshi%20ITGS%20IA/Product/Product%20List/Grid/custHomepage.html");
		        exit();
            }else{
				header("Location: index.html?error=Incorectpassword");
		        exit();
			}
		}else{
			header("Location: index.html?error=IncorectUsernameorpassword");
	        exit();
		}
	}
	
}else{
	header("Location: index.html");
	exit();
}