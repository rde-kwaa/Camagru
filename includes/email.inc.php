<?php

if (isset($_POST['chng-mail'])) {

    require 'db.inc.php';

    $username = $_POST['uid'];
    $mail = $_POST['new-mail'];
    $passwordC = $_POST['cur-pwd'];

    if ($username != htmlspecialchars($_POST['uid']) || $mail != htmlspecialchars($_POST['new-mail'])
    || $passwordC != htmlspecialchars($_POST['cur-pwd'])) {
        header("Location: ../account.php?error=chooseYourHatWisely");
	    exit();
    }
    if (empty($username) || empty($mail)) {
        header("Location: ../account.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM tbl_users WHERE uid_U = :uid";
		if (!($stmt = $conn->prepare($sql))) {
			header("Location: ../account.php?error=sqlerror");
			exit();
		} else {
			$stmt->execute([':uid'=>$username]);
			if ($row = $stmt->fetch()) {
				$pwdCheck = password_verify($passwordC, $row['pwd_U']);
				if ($pwdCheck == false) {
					header("Location: ../account.php?error=wrongpwd");
					exit();
				} else if ($pwdCheck == true) {
                    $token = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!$_,|~';
                    $token = str_shuffle($token);
                    $token = substr($token, 0, 32);
                    $sql = "UPDATE tbl_users SET email_U = :mail, token_U = :token";
                    if (!($stmt = $conn->prepare($sql))) {
                        header("Location: ../auth/account.php?error=sqlerror");
                        exit();
                    } else {
                        $stmt->execute([':token'=>$token, ':mail'=>$mail]);
                        $updt = $stmt->rowCount();
                        if ($updt) {
                            header("Location: ../account.php?mailchange=success");
                            exit();
                        } else {
                            header("Location: ../account.php?mailchange=error");
                            exit();
                        }
		            } 
                }
            }
        }        
	}
	$stmt = null;
	$conn = null;
} else {
	header("Location: ../account.php");
	exit();
}
