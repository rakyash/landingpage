<?php
	$name = $_POST["name_us"];
	$email = $_POST["email_us"];
	$phone = $_POST["phone"];
	$password = $_POST['pass_us'];
	/*
	  You can use this line of code if you want the password hashed:-
	      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	*/

	// Database connection
	$conn = new mysqli('localhost','root','','userdata');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		if ($conn) {
			$stmt = $conn->prepare("INSERT INTO `sign-up-data`(Name, Email, `Phone Number`, Password) VALUES(?, ?, ?, ?)");
			if($stmt) {
				$stmt->bind_param("ssss", $name , $email , $phone , $password);
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