<?php
	require "header.php";
?>
	<div class="container">
		<section class="gallery">
			<h2>Gallery</h2>
			<?php
			require './includes/db.inc.php';

			$sql = "SELECT *, `uid_U` FROM tbl_picts INNER JOIN `tbl_users` ON `idu_P` = `id_U` ORDER BY id_P DESC";
   			if (!($stmt = $conn->prepare($sql))) {
    		    header("Location: ../index.php?error=sqlerror");
    		    exit();
    		} else {
				$stmt->execute();
				$res = $stmt->fetchAll();
				$quan = sizeof($res);
				$num = ceil($quan / 6);
				if (!isset($_GET['page'])) {
					$cur = 1;
				} else {
					$cur = $_GET['page'];
				}
			}
			$sql = "SELECT *, `uid_U` FROM tbl_picts INNER JOIN `tbl_users` ON `idu_P` = `id_U` ORDER BY id_P DESC LIMIT ".(($cur - 1) * 6).", 5";
   			if (!($stmt = $conn->prepare($sql))) {
    		    header("Location: ../index.php?error=sqlerror");
    		    exit();
    		} else {
				$stmt->execute();
				while ($row = $stmt->fetch()) {
					echo('<div class="wrap">');
                    echo($row['uid_U']);
					echo('</div>');
					echo('<div class="wrap">');
					echo('<a href="photo.php?pid='.$row['id_P'].'">');
					echo('<img src='.$row['photo_P'].' class="potato"/>');
					echo('</a>');
					echo('</div>');
					echo('<div class="wrap">');
                    echo('Likes: '.$row['likes_P']);
                    echo('</div><br>');
				}
				echo('<div class="pagination">');
				for ($cur = 1; $cur <= $num; $cur++) {
					echo('<a href="gallery.php?page='.$cur.'">'.$cur.' </a>');
				}
				echo('</div>');
			}
    		$stmt = null;
			$conn = null;
			?>
			
		</section>
	</div>
<?php
	require "footer.php";
?>