<?php
if (isset($_POST['usr-verf'])) {

    require 'db.inc.php';

    $tid = $_POST['tid'];

    if ($tid != htmlspecialchars($_POST['tid'])) {
        header("Location: ../index.php?error=chooseYourHatWisely");
	    exit();
    }
    if (empty($tid)) {
        header("Location: ../auth/verify.php?error=notoken");
        exit();
    } else {
        $sql = "SELECT * FROM tbl_users WHERE token_U = :toke";
	    if (!($stmt = $conn->prepare($sql))) {
			header("Location: ../signup.php?error=sqlerror");
			exit();
		} else {
            $stmt->execute([':toke'=>$tid]);
	    	$res = $stmt->fetch();
            if ($res) {
                $token = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!$_,|~';
                $token = str_shuffle($token);
                $token = substr($token, 0, 32);

                $sql = "UPDATE tbl_users SET conf_U = 'Y', token_U = :token WHERE token_U = :tid";
                if (!($stmt = $conn->prepare($sql))) {
                    header("Location: ../auth/verify.php?error=sqlerror");
                    exit();
                } else {
                    $stmt->execute([':tid'=>$tid, ':token'=>$token]);

                    header("Location: ../index.php?verify=success");
                    exit();
                }
            }
        }
        $stmt = null;
	    $conn = null;
    }
}