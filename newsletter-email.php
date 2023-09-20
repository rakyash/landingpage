<?php
	
	$email = $_POST["email"];

	// Database connection
	$conn = new mysqli('localhost','root','','email-list');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		if ($conn) {
			$stmt = $conn->prepare("INSERT INTO `email-newsletter`(Email) VALUES(?)");
			if($stmt) {
				$stmt->bind_param("s", $email);
				$execval = $stmt->execute();
				echo $execval;
				echo "Registered successfully...";
				$stmt->close();
			} else {
				echo "Couldn't prepare statement due to error: " . $conn->error;
			}
			$conn->close();
		} else {
    		echo "Connection not found!";
		}
	}
?>