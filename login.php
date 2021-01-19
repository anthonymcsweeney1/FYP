<?php 
session_start(); 


include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {


	$uname = trim($_POST['uname']);
	$pass = trim($_POST['password']);


// if field empty
	if (empty($uname)) {
		header("Location: index.php?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$query = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
                $stmt = $conn->prepare($query);
		
	$stmt->bindParam('user_name', $uname, PDO::PARAM_STR);
      $stmt->bindValue('password', $pass, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) 
                // get session values


// take user to page based on user type
       switch($row['User_Type']) {
      case 'OfferOwner':
        header("location: test.php");
        break;
      case 'Processor':
        header("location: test.php");
        break;
    case 'BFM':
        header("location: test.php");
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
