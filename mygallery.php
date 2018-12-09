<?php
	require "header.php";
?>

	<div class="container">
		<section class="gallery">
			<h2>Gallery</h2>
			<?php
			if (isset($_SESSION['uid'])) {

				require './includes/db.inc.php';

				$sql = "SELECT *, `uid_U` FROM tbl_picts INNER JOIN `tbl_users` ON `idu_P` = `id_U` 
				WHERE uid_U = :uid ORDER BY id_P DESC";
   				if (!($stmt = $conn->prepare($sql))) {
    			    header("Location: ../index.php?error=sqlerror");
    			    exit();
    			} else {
					$stmt->execute([':uid'=>$_SESSION['uid']]);
					$res = $stmt->fetchAll();
					$quan = sizeof($res);
					$num = ceil($quan / 6);
					if (!isset($_GET['page'])) {
						$cur = 1;
					} else {
						$cur = $_GET['page'];
					}
				}
				$sql = "SELECT *, `uid_U` FROM tbl_picts INNER JOIN `tbl_users` ON `idu_P` = `id_U` 
				WHERE uid_U = :uid ORDER BY id_P DESC LIMIT ".(($cur - 1) * 6).", 5";
   				if (!($stmt = $conn->prepare($sql))) {
    			    header("Location: ../index.php?error=sqlerror");
    			    exit();
    			} else {
					$stmt->execute([':uid'=>$_SESSION['uid']]);
					while ($row = $stmt->fetch()) {
						echo('<div class="wrap">');
						echo('<img src='.$row['photo_P'].' class="potato"/>');
						echo('</div>');
						echo('<div class="wrap">');
						echo('<form action="includes/remove.inc.php" method="POST">');
						echo('<input type="hidden" name="pid" value='.$row['id_P'].'>');
            	        echo('<button class="delete" type="submit" name="remv-pic"></button></form>');
            	        echo('</div><br>');
					}
					echo('<div class="pagination">');
					for ($cur = 1; $cur <= $num; $cur++) {
						echo('<a href="mygallery.php?page='.$cur.'">'.$cur.' </a>');
					}
					echo('</div>');
				}
    			$stmt = null;
				$conn = null;
			} else {
				header("Location: ../index.php?error=notloggedin");
				exit();
			}
			?>
			
		</section>
	</div>
<?php
	require "footer.php";
?>