<?php
	session_start();
	include_once 'includes/db.inc.php';
	if(!isset($_SESSION['logged_in'])) header("Location: index.php");
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
						<h1 class="display-4">
							<?php
								if(isset($_SESSION["username"]) && isset($_SESSION['uid'])) {
									echo $_SESSION["username"] . " - " . $_SESSION['Admin'];
									echo "<hr />";
								}
							?>
						</h1>
						
						
						
						
						<?php
						if(isset($_SESSION['Admin'])) 
						{
							if($_SESSION['Admin'] == "Server Admin") 
							{
								echo "<p class='one'>Pending Applications:</p>";
								$stmt = "SELECT * FROM users WHERE verified = 0";
								$result = $con->query($stmt);
							
								if($result->num_rows > 0) 
								{
									while($usrRow = $result->fetch_assoc()) 
									{
										$user = $usrRow['uer_id'];
										$name = $usrRow["uer_name"];
										$email = $usrRow["uer_email"];
										echo $name . ", " . $email . "<form action = 'verifyuser.php?id=$user' method = 'post'><input id='submit' name='submit' type='submit' value='Verify' class='btn btn-primary'></form>" . "<br />";
									}
								}	
							}
						}

						?>
						<?php
							if(isset($_GET['verifiedid']) && $_GET['verifiedid'] != -1) {
								echo '<br /> User verified! <br />';
								header("refresh:1 url=account.php");
							}
						?>
						
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