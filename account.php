<?php
	require "header.php";
?>
<main>
	<div class="container">
		<section>
			<script>
				function ajaxPOST() {
        		    var xhr = new XMLHttpRequest();
					var url = "includes/notif.inc.php";
					var uid = "<?php echo($_SESSION['uid']) ?>";
					var vars = 'uid='+uid+'';
					xhr.open("POST", url, true);
					xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhr.send(vars);
					location.reload();
				}
			</script>

			<form action="./includes/username.inc.php" method="POST">
				<h1>Change Username</h1>
				<input type="text" name="chng-uid" placeholder="New Username...">
				<input type="hidden" name="uid" value="<?php echo($_SESSION['uid']) ?>">
				<button type="submit" name="chng-usrn">Change Username</button>
			</form>

			<form action="./includes/email.inc.php" method="POST">
				<h1>Change Email</h1>
				<input class="sharedl" type="text" name="new-mail" placeholder="New Email...">
				<input class="sharedr" type="password" name="cur-pwd" placeholder="Current Password...">
				<input type="hidden" name="uid" value="<?php echo($_SESSION['uid']) ?>">
				<button type="submit" name="chng-mail">Change Email</button>
			</form>

				<h3 class="conh">Comment Notifications?</h3>
				<input type="checkbox" id="notif" onclick="ajaxPOST();">
				<label for="notif"></label>

			<form action="./includes/pwd.inc.php" method="POST">
				<h1>Change Password</h1>
				<input type="password" name="pwd" placeholder="New Password...">
				<input type="password" name="pwd-repeat" placeholder="Repeat New Password...">
				<input type="hidden" name="uid" value="<?php echo($_SESSION['uid']) ?>">
				<h1>Current Password</h1>
				<input type="password" name="cur-pwd" placeholder="Password...">
				<button type="submit" name="chng-pwd">Change Password</button>
			</form>

			<?php
				require './includes/db.inc.php';

				$id = $_SESSION['id'];

				$sql = "SELECT * FROM `tbl_users` WHERE id_U = :id AND notf_U = :notf";
   				if (!($stmt = $conn->prepare($sql))) {
    			    header("Location: ../index.php?error=sqlerror");
    			    exit();
    			} else {
					$stmt->execute([':id'=>$id, ':notf'=>'Y']);
					$res = $stmt->fetchAll();
					if (sizeof($res) >= 1) {
						echo('<script>document.addEventListener("DOMContentLoaded",function(){
							document.getElementById("notif").checked = true;});</script>');
					} else {
						echo('<script>document.addEventListener("DOMContentLoaded",function(){
							document.getElementById("notif").checked = false;});</script>');
					}
				}
			?>
		</section>
	</div>
</main>

<?php
	require "footer.php";
?>