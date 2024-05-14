<?php

session_start();
////mysql datbase connection
include '../dbconn.php';

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$myaname = $_POST['myaname'];
$engname = $_POST['engname'];
	
		    $sql = "INSERT into specialists (mya_name,name)
			        VALUES('$myaname','$engname')";
			$result = $conn->query($sql);
			
		    if($result) {
				$_SESSION['status']='<div class="alert alert-warning" role="alert">
										New Departmment is successfully Created.
										</div>';
				header('location: ../views/viewDepartment.php');
	 }


