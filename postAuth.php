
<?php
	include_once 'includes/db.inc.php';
	session_start();
	
	$enteredTitle = $con->real_escape_string($_POST["title"]);
	$enteredDescription = $con->real_escape_string($_POST['description']);
	$enteredContent = $con->real_escape_string($_POST['content']);
	
	if(!($enteredTitle && $enteredDescription && $enteredContent)) 
	{
		header("Location: addpost.php?err=missingdata");
	}
	else 
	{
		$uid = $_SESSION['uid'];
		$query_addPost = "INSERT INTO posts (uer_id, title, content, short_desc) VALUES ($uid, '$enteredTitle', '$enteredContent', '$enteredDescription');";
		$result = $con->query($query_addPost);
		
		if($result) {
			$lastId = $con->insert_id;
			
			header("Location: viewpost.php?postid=$lastId");
		}
	
	}

?>