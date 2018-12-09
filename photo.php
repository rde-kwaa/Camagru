<?php
	require "header.php";
?>
	<div class="container">
	<script>
    	function ajaxPOST(targ) {
            var xhr = new XMLHttpRequest();
			var url = "includes/"+targ+".inc.php";
			var uid = document.getElementById("uidiot").value;
			var pid = document.getElementById("pidiot").value;
			var com = document.getElementById("comedy").value;
			var vars = 'uid='+uid+'&pid='+pid+'&com='+com+'';
			xhr.open("POST", url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send(vars);
			location.reload();
		}
    </script>
		<section class="gallery">
			<h2>Gallery</h2>
			<?php
				require './includes/db.inc.php';

				$id = $_SESSION['id'];

				$sql = "SELECT * FROM `tbl_likes` WHERE `idu_L` = :uid AND `id_P` = :pid";
   				if (!($stmt = $conn->prepare($sql))) {
    			    header("Location: ../index.php?error=sqlerror");
    			    exit();
    			} else {
					$stmt->execute([':uid'=>$id, ':pid'=>$_GET['pid']]);
					if ($res = $stmt->fetch()) {
						echo('<script>document.addEventListener("DOMContentLoaded",function(){
							document.getElementById("likebox").checked = true;});</script>');
					} else {
						echo('<script>document.addEventListener("DOMContentLoaded",function(){
							document.getElementById("likebox").checked = false;});</script>');
					}
				}

            	$sql = "SELECT *, `uid_U` FROM tbl_picts INNER JOIN `tbl_users` ON `idu_P` = `id_U` WHERE id_P = :pid";
   				if (!($stmt = $conn->prepare($sql))) {
    			    header("Location: ../index.php?error=sqlerror");
    			    exit();
    			} else {
					$stmt->execute([':pid'=>$_GET['pid']]);
					$row = $stmt->fetch();
            	    if (isset($_SESSION['uid'])) {
						require "view/photo.view.php";
					} else {
						header("Location: ../gallery.php?error=notloggedin");
						exit();
					}
				}
			
    			$stmt = null;
				$conn = null;
			?>
		</section>
	</div>
<?php
	require "footer.php";
?>