<?php 
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../sessions'));
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: loginp.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: loginp.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM VISITORS WHERE Email='$uname' AND Password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['email'] = $row['Email'];
			header("Location: visitor.php");
		    exit();
		}
		else if(str_contains($uname,"@mfah.org")){
			$manquery = "SELECT * FROM MANAGER WHERE Email='$uname' AND Password='$pass'";
			$manresult = mysqli_query($conn,$manquery);
			if(mysqli_num_rows($manresult)===1){//manager@mfah.org qsxcgy$45
				$row = mysqli_fetch_assoc($manresult);
				$_SESSION['email'] = $row['Email'];
				header("Location: manager.php");
				exit();
			}
			else{
				header("Location: loginp.php?error=Incorect manager User name or password");
				exit();
			}
		}
		else{
			header("Location: loginp.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: loginp.php");
	exit();
}