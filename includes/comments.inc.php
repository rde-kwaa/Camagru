<?php
if (isset($_POST['uid'])) {

    require 'db.inc.php';

	$uid = $_POST['uid'];
	$pid = $_POST['pid'];
	$com = $_POST['com'];
	
	if ($uid != htmlspecialchars($_POST['uid']) || $pid != htmlspecialchars($_POST['pid'])
	|| $com != htmlspecialchars($_POST['com'])) {
        header("Location: ../gallery.php?error=chooseYourHatWisely");
	    exit();
    }
	$sql = "INSERT INTO tbl_comms (comm_C, idu_C, id_P) VALUES (:com, :uid, :pid)";
    if (!($stmt = $conn->prepare($sql))) {
        header("Location: ../gallery.php?error=sqlerror");
        exit();
    } else {
		$stmt->execute([':com'=>$com, ':uid'=>$uid, ':pid'=>$pid]);
		$sql = "SELECT * FROM `tbl_picts` INNER JOIN `tbl_users` ON `idu_P` = `id_U` WHERE `id_P` = :pid";
		if (!($stmt = $conn->prepare($sql))) {
			header("Location: ../gallery.php?error=sqlerror");
			exit();
		} else {
			$stmt->execute([':pid'=>$pid]);
			$row = $stmt->fetch();
			if ($row['notf_U'] == 'Y') {
				$mailuid = $row['email_U'];
				session_start();
        		$subject = 'Comment Notification from: '.$_SESSION['uid'];
        		$headers = "MIME-Version: 1.0\r\n";
        		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
				$message = file_get_contents('../auth/notif.html');
				$message = str_replace('%pid%', $pid, $message);
				mail($mailuid, $subject, $message, $headers);
			}
		}
    }

    $stmt = null;
	$conn = null;
}