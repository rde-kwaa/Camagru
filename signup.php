<?php
	require "header.php";
?>
<main>
	<div class="container">
		<section>
			<h1>Sign Up</h1>
			<form action="includes/signup.inc.php" method="POST">
				<input type="text" name="uid" placeholder="Username...">
				<input type="text" name="mail" placeholder="Email...">
				<input type="password" name="pwd" placeholder="Password...">
				<input type="password" name="pwd-repeat" placeholder="Repeat password...">
				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == "emptyfields") {
						echo '<p class="signuperror">Fill in all fields!</p>';
					} else if ($_GET['error'] == "invaliduidmail") {
						echo '<p class="signuperror">Invalid username and email!</p>';
					} else if ($_GET['error'] == "invalidmail") {
						echo '<p class="signuperror">Invalid email!</p>';
					} else if ($_GET['error'] == "invaliduid") {
						echo '<p class="signuperror">Invalid username!</p>';
					} else if ($_GET['error'] == "passwordmismatch") {
						echo '<p class="signuperror">Your passwords do not match!</p>';
					} else if ($_GET['error'] == "weakasspwd") {
						echo '<p class="signuperror">Min 8 characters.<br>Max 64 characters.<br>
						At least 1 uppercase letter.<br>At least 1 lowercase letter.
						<br>At least 1 number.<br>At least 1 special character.</p>';
					} else if ($_GET['error'] == "usernameinuse") {
						echo '<p class="signuperror">Username already taken!</p>';
					} else if ($_GET['error'] == "emailexists") {
						echo '<p class="signuperror">Email already in use!</p>';
					}
				} else if (isset($_GET['signup'])) {
					if ($_GET['signup'] == "success") {
						echo '<p class="signupsuccess">Signup Successful!<br>
						Please verify your account with the link we\'ve sent you.</p>';
					}
				}
				?>
				<button type="submit" name="signup-submit">Signup</button>
			</form>
		</section>
	</div>
</main>

<?php
	require "footer.php";
?>