<?php
	echo('<h1>Forgot Password?</h1>
		<form action="includes/forgot.inc.php" method="POST">
		<input type="email" name="mailuid" placeholder="Enter Email...">');
		
	if (isset($_GET['reset'])) {
		if ($_GET['reset'] == 'emailnotfound') {
			echo ('<p class="signuperror">Email not found in our database.</p>');
		} else if ($_GET['reset'] == 'success') {
			echo ('<p class="signupsuccess">We have sent you the reset link.</p>');
		}
	}
?>
	<button type="submit" name="forgot-pwd">Reset</button>
</form>