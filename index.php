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
			<?php include 'includes/nav.inc.php'; ?>
			<main role = "main" style = "padding-top: 15px;">
			
			<?php
				if(isset($_GET['deleted'])) {
					echo "<p style = 'color:green; font-weight:'><strong>You have successfully deleted that post. It's not coming back.</strong></p>";
					header( "refresh:3;url=index.php" );
				}
			?>
				<?php
					$query_getPosts_stmt = "SELECT * FROM posts ORDER BY pst_id DESC;";
					$query_getPosts_result = $con->query($query_getPosts_stmt);
							
					if($query_getPosts_result->num_rows > 0) {
						while($row = $query_getPosts_result->fetch_assoc()) {
							$user = $row['uer_id'];
							$id = $row['pst_id'];
							$title = $row['title'];
							$desc = $row['short_desc'];
									
							$query_getUsr_stmt = "SELECT * FROM users WHERE uer_id = $user ORDER BY uer_id DESC";
							$query_getUsr_result = $con->query($query_getUsr_stmt);
							
							
							
							if($query_getUsr_result->num_rows > 0) 
							{
								while($usrRow = $query_getUsr_result->fetch_assoc()) {
									$userName = $usrRow['uer_name'];
											
									echo "<div class='jumbotron jumbotron-fluid'>
											<div class='container'>
												<div class = 'row'>
													<div class = 'col-lg-12'>
														<h1 class='display-4'><a class = 'post-title' href = 'viewpost.php?postid=$id'>$title</a></h1>
														<p class = 'post-author'><img src='img/$userName.jpg' class='img-author img-fluid' alt='Responsive image'>  <a class = 'link-post-author' href = '#'>$userName</a></p>  <hr />
														<p class='one'>$desc</p>
														<button class='btn btn-read-more float-right' onclick='showPost($id);'>Read</button>";
														if($_SESSION["uid"] == $user) echo "<form action = 'deletepost.php?postid=$id' method = 'post'><input id='submit' name='submit' type='submit' value='Delete Post' class='btn btn-primary float-right'></form>";
														echo "</div></div></div></div>";
								}
							}
		
						}
					}
					else {
						echo "<div class='jumbotron jumbotron-fluid'>
											<div class='container'>
												<div class = 'row'>
													<div class = 'col-lg-12'>
														<h1 class='display-4'><a class = 'post-title' href = '#'>Oh no, there's no posts!</a></h1>
														<p class='one'>I've deleted my posts. You'll need to come back another time. :(</p>>
													</div>
												</div>

											</div>
										</div>";
					}
					
				?>
			</main>
		</div>
		<script>
			function showPost(id) 
			{
				window.location.href = "viewpost.php?postid=" + id;
			}
		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>