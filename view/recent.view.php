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
			echo('<br>');
			while ($row = $stmt->fetch()) {
				echo('<div class="recent">');
				echo('<img src='.$row['photo_P'].' class="center"/><br>');
				echo('<input type="hidden" id="pidiot" name="pid" value='.$row['id_P'].'>');
    	        echo('<button class="delete" type="submit" onclick="ajaxPOST();" name="remv-pic"></button>');
				echo('</div>');
			}
		}
    	$stmt = null;
		$conn = null;
	} else {
		header("Location: ../index.php?error=notloggedin");
		exit();
	}
?>