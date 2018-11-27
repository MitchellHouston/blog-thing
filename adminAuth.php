
<?php
	include_once 'includes/db.inc.php';
	session_start();
	$enteredEmail = $con->real_escape_string($_POST["email"]);
	$enteredPwd = hash("sha256", $con->real_escape_string($_POST['pwd']));
	
	if(!($enteredEmail && $enteredPwd)) 
	{
		header("Location: login.php?err=missingdata");
	}
	else 
	{
		$query_findUsr_stmt = "SELECT * FROM users WHERE uer_email = '$enteredEmail' AND uer_pwd = '$enteredPwd';";
		$query_findUsr_result = $con->query($query_findUsr_stmt);
		
		if($query_findUsr_result->num_rows == 1) {
			while($row = $query_findUsr_result->fetch_assoc()) {
				$_SESSION['username'] = $row['uer_name'];
				$_SESSION['uid'] = $row['uer_id'];
				$_SESSION['timestamp'] = $row['uer_register_timestamp'];
				if($row['adminlvl'] > 0) {
					$_SESSION['Admin'] = "Server Admin";
				} else $_SESSION['Admin'] = "Regular User";
				$_SESSION["logged_in"] = "true";
				header("Location: login.php?success=true");
				
				$time = date("Y-m-d H:i:s", time());
				$uid = $_SESSION['uid'];
			}
		}
	
	}

?>