<?php

if (isset($_POST['chng-usrn'])) {

    require 'db.inc.php';

    $username = $_POST['uid'];
    $usernameN = $_POST['chng-uid'];

    if ($username != htmlspecialchars($_POST['uid']) || $usernameN != htmlspecialchars($_POST['chng-uid'])) {
        header("Location: ../account.php?error=chooseYourHatWisely");
	    exit();
    }
    if (empty($username)) {
        header("Location: ../account.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM tbl_users WHERE uid_U = :uid AND NOT(uid_U = :uidCheck)";
		if (!($stmt = $conn->prepare($sql))) {
			header("Location: ../account.php?error=sqlerror");
			exit();
		} else {
			$stmt->execute([':uid'=>$username, 'uidCheck'=>$usernameN]);
			if ($row = $stmt->fetch()) {
				$sql = "UPDATE tbl_users SET uid_U = :uidN WHERE uid_U = :uid";
                if (!($stmt = $conn->prepare($sql))) {
                    header("Location: ../auth/account.php?error=sqlerror");
                    exit();
                } else {
                    $stmt->execute([':uidN'=>$usernameN, ':uid'=>$username]);
                    $updt = $stmt->rowCount();
                    if ($updt) {
                        session_start();
                        $_SESSION['uid'] = $usernameN;
                        header("Location: ../account.php?usernamechange=success");
                        exit();
                    } else {
                        header("Location: ../account.php?usernamechange=error");
                        exit();
                    }
		        } 
            }
        }        
	}
	$stmt = null;
    $conn = null;
    header("Location: ../account.php?error=fatal");
	exit();
} else {
	header("Location: ../account.php");
	exit();
}
