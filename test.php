<?php
$servername = "tcp:117380531fyp.database.windows.net,1433";
$username = "fyp117380531";
$password = "FYP2021!";
$dbname = "FYP117380531";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["user_name"]. " " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
