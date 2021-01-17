<?php 
session_start(); 


include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
// validate user input in fields
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
        

// if field empty
	if (empty($uname)) {
		header("Location: index.php?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
              
              
// take user to page based on user type
              switch($row['User_Type']) {
      case 'Approver':
        header("location: Approver.php");
        break;
      case 'User':
        header("location: Home.php");
        break;
      default:
              }
		        exit();
            }else{
				header("Location: index.php?error=Incorect Username or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect Username or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
