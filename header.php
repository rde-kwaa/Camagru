<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Camagru</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Ryan de Kwaadsteniet">
	<link rel="stylesheet" type="text/css" media="screen" href="./css/style.css">

</head>
<body>
	<header>
		<div class="container">
			<div id="logo">
				<img src="./img/42.gif">
			</div>
			<div id="logo">
					<h2>Camagru</h2>
				</div>
			<nav>
				<?php
					if (isset($_SESSION['uid'])) {
						echo('<ul>
							<li class="current"><a href="index.php">Home</a></li>
							<li><a href="gallery.php?page=1">Gallery</a></li>
							<li><a href="mygallery.php">My Gallery</a></li>
							<li><a href="account.php">Account</a></li>
							</ul>');
						echo('<p class="logmsg" align="center">Welcome, '.$_SESSION['uid'].'</p>');
						echo('<form action="includes/logout.inc.php" method="post">
							<div class="wrap">
							<button class="logout" type="submit" name="logout-submit">Logout</button>
							</div>
							</form>'); 
					} else {
						echo('<ul>
							<li class="current"><a href="index.php">Home</a></li>
							<li><a href="index.php">Login</a></li>
							<li><a href="signup.php">Sign Up</a></li>
							<li><a href="gallery.php">Gallery</a></li>
							</ul>');
						echo('<p class="logmsg" align="center">Welcome, you are logged out.</p>');
					}
				?>
			</nav>
		</div>	
	</header>