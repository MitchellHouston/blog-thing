<?php
	include_once 'includes/db.inc.php';
	session_start();
	
	if(isset($_POST['submit'])){
		$id = $_GET['id'];
		$stmt = "UPDATE users SET verified = 1 WHERE uer_id = $id;";
		
		$result = $con->query($stmt);
		
		if($result)
		{
			header("Location: account.php?verifiedid=$id");
		}
	}
?>