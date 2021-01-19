
<?php

$sname= "tcp:117380531fyp.database.windows.net,1433";
$unmae= "fyp117380531";
$password = "FYP2021"

$db_name = "FYP117380531";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
