<?php
if (isset($_POST['uid'])) {

    require 'db.inc.php';

	$uid = $_POST['uid'];
	$pid = $_POST['pid'];
	
	if ($uid != htmlspecialchars($_POST['uid']) || $pid != htmlspecialchars($_POST['pid'])) {
        header("Location: ../gallery.php?error=chooseYourHatWisely");
	    exit();
    }
	$sql = "SELECT * FROM tbl_likes WHERE id_P = :pid AND idu_L = :uid";
		if (!($stmt = $conn->prepare($sql))) {
			header("Location: ../gallery.php?error=sqlerror");
			exit();
		} else {
			$stmt->execute([':pid'=>$pid, ':uid'=>$uid]);
			$res = $stmt->fetchAll();
			if (sizeof($res) == 0) {
				$sql = "INSERT INTO tbl_likes (idu_L, id_P) VALUES (:uid, :pid)";
    			if (!($stmt = $conn->prepare($sql))) {
    			    header("Location: ../gallery.php?error=sqlerror");
    			    exit();
    			} else {
					$stmt->execute([':uid'=>$uid, ':pid'=>$pid]);
					$sql = "UPDATE tbl_picts SET likes_P = likes_P + :like WHERE id_P = :pid";
    					if (!($stmt = $conn->prepare($sql))) {
    						header("Location: ../gallery.php?error=sqlerror");
    						exit();
    					} else {
							$stmt->execute([':like'=>1, ':pid'=>$pid]);
						}
				}
            } else {
				$sql = "DELETE FROM tbl_likes WHERE idu_L = :uid";
    			if (!($stmt = $conn->prepare($sql))) {
    			    header("Location: ../gallery.php?error=sqlerror");
    			    exit();
    			} else {
					$stmt->execute([':uid'=>$uid]);
					$sql = "UPDATE tbl_picts SET likes_P = likes_P - :like WHERE id_P = :pid";
    					if (!($stmt = $conn->prepare($sql))) {
    					    header("Location: ../gallery.php?error=sqlerror");
    					    exit();
    					} else {
							$stmt->execute([':like'=>1, ':pid'=>$pid]);
						}
				}
			}
        }

    $stmt = null;
	$conn = null;
	
} else {
	header("Location: ../index.php");
	exit();
}