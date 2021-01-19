<?php 
session_start(); 

include "db_conn.php";



  $username = trim($_POST['uname']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "select * from `users` where `user_name`=:username and `password`=:password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('user_name', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
      header("location: test.php");
       
      } else {
        $msg = "Invalid username and password!";
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
}
?>
