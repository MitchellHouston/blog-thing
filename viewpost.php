<?php
	session_start();
	
	include_once 'includes/db.inc.php';
	
?>
<!DOCTYPE html>

<html lang = "en">
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="css/custom_sheet.css">
	</head>
	
	<body>
		
		<div class = "container">
			<?php
				include 'includes/nav.inc.php';
			?>
			
			<main role = "main" style = "padding-top: 15px;">
			
			<?php
				if(isset($_GET["postid"])) {
				$id = $_GET["postid"];
				$query_getPosts_stmt = "SELECT * FROM posts WHERE pst_id = $id";
				$query_getPosts = mysqli_query($con, $query_getPosts_stmt);
				$query_getPosts_results = mysqli_num_rows($query_getPosts);
						
				if($query_getPosts_results > 0) {
					while($row = mysqli_fetch_assoc($query_getPosts)) {
						$user = $row['uer_id'];
						$id = $row["pst_id"];
						$title = $row['title'];
						$desc = $row['content'];
								
						$query_getUsr_stmt = "SELECT * FROM users WHERE uer_id = $user";
						$query_getUsr = mysqli_query($con, $query_getUsr_stmt);
						$query_getUsr_results = mysqli_num_rows($query_getUsr);
								
						if($query_getUsr_results > 0) 
						{
							while($usrRow = mysqli_fetch_assoc($query_getUsr)) {
								$userName = $usrRow['uer_name'];
										
								echo "<div class='jumbotron jumbotron-fluid'>
										<div class='container'>
											<div class = 'row'>
												<div class = 'col-lg-12'>
													<h1 class='display-4'>$title</h1>
													<p class = 'post-author'><img src='img/$userName.jpg' class='img-author img-fluid' alt='Responsive image'>  <a class = 'link-post-author' href = '#'>$userName</a></p>
													<p class='one'>$desc</p>";
								if($_SESSION["uid"] == $user) echo "<form action = 'deletepost.php?postid=$id' method = 'post'><input id='submit' name='submit' type='submit' value='Delete Post' class='btn btn-primary float-right'></form>";
									echo "</div></div></div></div>";
							}
						}
					}
				}
				}

			?>
			</main>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>