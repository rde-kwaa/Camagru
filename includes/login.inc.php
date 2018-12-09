<?php

if (isset($_POST['login-submit'])) {

    require 'db.inc.php';

    $mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if ($mailuid != htmlspecialchars($_POST['mailuid']) || $password != htmlspecialchars($_POST['pwd'])) {
        header("Location: ../index.php?error=chooseYourHatWisely");
	    exit();
    }
	if (empty($mailuid) || empty($password)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	} else {
		$sql = "SELECT * FROM tbl_users WHERE uid_U = :mid OR email_U = :mid";
		if (!($stmt = $conn->prepare($sql))) {
			header("Location: ../signup.php?error=sqlerror");
			exit();
		} else {
			$stmt->execute([':mid'=>$mailuid]);
			if ($row = $stmt->fetch()) {
				$pwdCheck = password_verify($password, $row['pwd_U']);
				if ($pwdCheck == false) {
					header("Location: ../index.php?error=wrongpwd");
					exit();
				} else if ($row['conf_U'] == 'N') {
					header("Location: ../index.php?error=notverified");
					exit();
				} else if ($pwdCheck == true) {
					session_start();
					$_SESSION['id'] = $row['id_U'];
					$_SESSION['uid'] = $row['uid_U'];
					header("Location: ../index.php?login=success");
					exit();
				} else {
					header("Location: ../index.php?error=wrongpwd");
					exit();
				}
			} else {
				header("Location: ../index.php?error=nouser");
            	exit();
			}
		}
	}
} else {
	header("Location: ../index.php");
	exit();
	$stmt = null;
	$conn = null;
}