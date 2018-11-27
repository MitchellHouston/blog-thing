<?php
	include_once 'includes/db.inc.php';
	session_start();

	$id = $_GET["postid"];
	$sql = "DELETE FROM posts WHERE pst_id = $id";
	$query = $con->query($sql);
	
	if($query) header("Location: index.php?deleted=true");
?>