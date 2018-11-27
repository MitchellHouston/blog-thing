<?php
	session_start();
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
				<div class="jumbotron jumbotron-fluid">
				  <div class="container">
				  <div class = "row">
					<div class = "col-lg-12">
						<h1 class="display-4">Register Account</h1>
						<p class="one">Please fill out all fields. An existing admin will review your application and accept or deny it.</p>
						
						
						<?php
							if(isset($_GET["err"])) {
								echo "<p style = 'color:red; font-weight:'><strong>You have entered incorrect or unfilled data. Please make sure all fields are entered properly and that you've selected a file.</strong></p>";
							}
							else if(isset($_GET["success"])) {
								echo "<p style = 'color:green; font-weight:'><strong>You have successfully submitted an application.. The admins will be on it A.S.A.P.</strong></p>";
								header( "refresh:3;url=account.php" );
							}
						?>
						
						<hr />
						
						<form action = "registerAuth.php" method = "post" enctype="multipart/form-data">
							<div class = "form-group">
								<label for="inputAdminEmail" style = "color: #F7F4F4">Email Address:</label>
								<input type="email" class="form-control" id="inputAdminEmail" name = "email" placeholder="">
							</div>
							<div class = "form-group">
								<label for="inputName" style = "color: #F7F4F4">Name:</label>
								<input type="text" class="form-control" id="inputName" name = "name" placeholder="">
							</div>
							<div class = "form-group">
								<label for="inputAdminPwd" style = "color: #F7F4F4">Password (something you'll remember!):</label>
								<input type="password" class="form-control" id="inputAdminPwd" name = "pwd" placeholder="">
							</div>
							<div class = "form-group">
								<label for="uploadFile" style = "color: #F7F4F4">Photo</label>
								<input type="file" class="form-control-file" id="uploadFile" name = "fileToUpload">
							</div>
							
							<div class = "form-group">
								<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary float-right">  
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