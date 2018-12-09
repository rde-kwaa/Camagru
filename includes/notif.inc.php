<?php
if (isset($_POST['uid'])) {

    require 'db.inc.php';

	$uid = $_POST['uid'];

	if ($uid != htmlspecialchars($_POST['uid'])) {
        header("Location: ../account.php?error=chooseYourHatWisely");
	    exit();
    }
	$sql = "SELECT * FROM `tbl_users` WHERE uid_U = :uid AND notf_U = :notf";
		if (!($stmt = $conn->prepare($sql))) {
			header("Location: ../gallery.php?error=sqlerror");
			exit();
		} else {
			$stmt->execute([':uid'=>$uid, ':notf'=>'Y']);
			if ($row = $stmt->fetch()) {
				$sql = "UPDATE `tbl_users` SET `notf_U` = :notf WHERE uid_U = :uid";
    			if (!($stmt = $conn->prepare($sql))) {
    				header("Location: ../gallery.php?error=sqlerror");
    				exit();
    			} else {
					$stmt->execute([':uid'=>$uid, ':notf'=>'N']);
				}
			} else {
				$sql = "UPDATE `tbl_users` SET `notf_U` = :notf WHERE uid_U = :uid";
    			if (!($stmt = $conn->prepare($sql))) {
    				header("Location: ../gallery.php?error=sqlerror");
    				exit();
    			} else {
					$stmt->execute([':uid'=>$uid, ':notf'=>'Y']);
				}
			}
		}
	$stmt = null;
	$conn = null;
} else {
	header("Location: ../index.php?error=no");
	exit();
}
?>