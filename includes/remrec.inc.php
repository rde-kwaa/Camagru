<?php
if (isset($_POST['pid'])) {

    require 'db.inc.php';

	$pid = $_POST['pid'];

	if ($pid != htmlspecialchars($_POST['pid'])) {
        header("Location: ../index.php?error=chooseYourHatWisely");
	    exit();
    }
	$sql = "DELETE tbl_picts
			FROM tbl_picts
			WHERE id_P = :pid";
    if (!($stmt = $conn->prepare($sql))) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    } else {
		$stmt->execute([':pid'=>$pid]);
		$sql = "DELETE
				FROM tbl_likes
				WHERE id_P = :pid";
    	if (!($stmt = $conn->prepare($sql))) {
    	   	header("Location: ../index.php?error=sqlerror");
    	    exit();
    	} else {
			$stmt->execute([':pid'=>$pid]);
			$sql = "DELETE
					FROM tbl_comms
					WHERE id_P = :pid";
    		if (!($stmt = $conn->prepare($sql))) {
    		   	header("Location: ../index.php?error=sqlerror");
    		    exit();
    		} else {
				$stmt->execute([':pid'=>$pid]);
				header("Location: ../index.php?remove=success".$pid);
				exit();
			}
		}
	}
	$stmt = null;
	$conn = null;
}