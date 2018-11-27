<?php
	include_once 'includes/db.inc.php';
	session_start();
	
	//$enteredEmail = $con->real_escape_string($_POST["email"]);
	//$enteredName = $con->real_escape_string($_POST['name']);
	//$enteredPw =  hash("sha256", $con->real_escape_string($_POST['pwd']));
	//$targetDir = "img/";
	
	 if(isset($_POST['submit'])){
		$email 		= $_POST["email"];
		$username 	= $_POST["name"];
		$pwd		= hash("sha256", $_POST["pwd"]);
		$file_name       = $_FILES['fileToUpload']['name'];  
		$file_temp_name  = $_FILES['fileToUpload']['tmp_name'];  
		if(isset($file_name) && isset($username) && isset($email) && isset($pwd)) {
			if(!empty($file_name)){   
				$file_location = "img/";   
				list($width, $height) = getimagesize($file_location.$file_name);				
				if(move_uploaded_file($file_temp_name, $file_location.$file_name) && $width == 32 && $height == 32){
					 echo 'File uploaded successfully';
					 rename($file_location.$file_name, $file_location.$username . "." . pathinfo($file_name, PATHINFO_EXTENSION));
					 
					 
					 $time = date("Y-m-d H:i:s", time());
					 
					 $sql = "INSERT INTO users (uer_name, uer_email, uer_pwd, uer_register_timestamp, uer_dob, verified) VALUES ('$username', '$email', '$pwd', '$time', '2009-10-10', 0)";
					 $result = $con->query($sql);
					 
					 if($result) {
						header("Location: register.php?success=true");
					 }
				} else echo "Error uploading file. Possibly not the right size.";
			}       
		}  else {
			echo 'You should select a file to upload !!';
		}
	}
?>