<?php
	require "header.php";
?>
	<section id="login">
		<div class="container">
			<?php
				if (isset($_SESSION['uid'])) {
					$cam = file_get_contents('./view/webcam.view.html');
					echo($cam);
				} else {
					$login = file_get_contents('./view/login.view.html');
					echo($login);
				}
			?>
		</div>
	</section>
	
	<section id="forgot">
		<div id="photocap">
			<?php
				if (isset($_SESSION['uid'])) {
					$capt = file_get_contents('./view/capture.view.html');
					echo($capt);
				} else {
					require "./view/forgot.view.php";
				}
			?>
		</div>
	</section>

	<section id="options">
		<div class="centerwrapper">
			<?php
				if (isset($_SESSION['uid'])) {
					$filter = file_get_contents('./view/filter.view.html');
					echo($filter);
					require "./view/recent.view.php";
				} else {
					$info = file_get_contents('./view/info.view.html');
					echo($info);
				}
			?>
		</div>
	</section>
<?php
	require "footer.php";
?>