<?php
	session_start();
	
	if(!isset($_SESSION["logged_in"])) header("Location: index.php");
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
				<div class="jumbotron jumbotron-fluid jumbotron-yellow">
				  <div class="container">
				  <div class = "row">
					<div class = "col-lg-12">
						<h1 class="display-4">Add Post</h1>
						<p class="one">Please fill out all fields to add the post.</p>
						
						
						<?php
							if(isset($_GET["err"])) {
								echo "<p style = 'color:red; font-weight:'><strong>You have entered incorrect or unfilled data. Please make sure both fields are entered properly.</strong></p>";
							}
							else if(isset($_GET["success"])) {
								echo "<p style = 'color:green; font-weight:'><strong>You have successfully created a post. Redirecting to it in three seconds..</strong></p>";
								header( "refresh:3;url=account.php" );
							}
						?>
						
						<hr />
						
						<form action = "postAuth.php" method = "post">
							<div class = "form-group">
								<label for="inputTitle" style = "color: #F7F4F4">Title:</label>
								<input type="text" class="form-control" id="inputTitle" name = "title" placeholder="">
							</div>
							<div class = "form-group">
								<label for="inputDisplayText" style = "color: #F7F4F4">Post Description (keep it short):</label>
								<input type="text" class="form-control" id="inputDisplayText" name = "description" placeholder="">
							</div>
							<div class = "form-group">
								<label for="inputContents" style = "color: #F7F4F4">Contents:</label>
								<textarea class="form-control" rows="15" id="inputContents" name = "content"></textarea>
							</div>
							
							<div class = "form-group">
								<input id="submit" name="submit" type="submit" value="Add Post" class="btn btn-primary float-right">  
							</div>
						</form>
						
						
					</div>
				  </div>

				  </div>
				</div>
			</main>
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>