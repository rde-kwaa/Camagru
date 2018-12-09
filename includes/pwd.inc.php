<?php

if (isset($_POST['chng-pwd'])) {

    require 'db.inc.php';

    $username = $_POST['uid'];
    $password = $_POST['pwd'];
    $passwordR = $_POST['pwd-repeat'];
    $passwordC = $_POST['cur-pwd'];

    if ($username != htmlspecialchars($_POST['uid']) || $password != htmlspecialchars($_POST['pwd'])
    || $passwordR != htmlspecialchars($_POST['pwd-repeat']) || $passwordC != htmlspecialchars($_POST['cur-pwd'])) {
        header("Location: ../account.php?error=chooseYourHatWisely");
	    exit();
    }
    if (empty($password) || empty($passwordR || empty($passwordC))) {
        header("Location: ../account.php?error=emptyfields");
        exit();
    } else if ($password !== $passwordR) {
        header("Location: ../account.php?error=passwordmismatch");
        exit();
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,64}$/", $password)) {
        header("Location: ../account.php?error=weakasspwd");
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
                    $sql = "UPDATE tbl_users SET pwd_U = :pwd, token_U = :token";
                    if (!($stmt = $conn->prepare($sql))) {
                        header("Location: ../auth/account.php?error=sqlerror");
                        exit();
                    } else {
                        $hashPwd = password_hash($password, PASSWORD_DEFAULT);
                        $stmt->execute([':token'=>$token, ':pwd'=>$hashPwd]);
                        $updt = $stmt->rowCount();
                        if ($updt) {
                            header("Location: ../account.php?pwdchange=success");
                            exit();
                        } else {
                            header("Location: ../account.php?pwdchange=error");
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
