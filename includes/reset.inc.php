<?php
if (isset($_POST['new-pwd'])) {

    require 'db.inc.php';

    $tid = $_POST['tid'];
    $password = $_POST['pwd'];
    $passwordR = $_POST['pwd-repeat'];

    if ($tid != htmlspecialchars($_POST['tid']) || $password != htmlspecialchars($_POST['pwd'])
    || $passwordR != htmlspecialchars($_POST['pwd-repeat'])) {
        header("Location: ../gallery.php?error=chooseYourHatWisely");
	    exit();
    }
    if (empty($password) || empty($passwordR)) {
        header("Location: ../auth/reset.php?error=emptyfields");
        exit();
    } else if ($password !== $passwordR) {
        header("Location: ../auth/reset.php?error=passwordmismatch");
        exit();
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,64}$/", $password)) {
        header("Location: ../auth/reset.php?error=weakasspwd");
        exit();
    } else {
        $token = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!$_,|~';
        $token = str_shuffle($token);
        $token = substr($token, 0, 32);
        $sql = "UPDATE tbl_users SET pwd_U = :pwd, token_U = :token WHERE (token_U = :tid AND conf_U = 'Y')";
        if (!($stmt = $conn->prepare($sql))) {
            header("Location: ../auth/reset.php?error=sqlerror");
            exit();
        } else {
            $hashPwd = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute([':tid'=>$tid, ':token'=>$token, ':pwd'=>$hashPwd]);
            $updt = $stmt->rowCount();
            if ($updt) {
                header("Location: ../index.php?pwdreset=success");
                exit();
            } else {
                header("Location: ../index.php?pwdreset=expiredlink");
                exit();
            }
        }
    }
    $stmt = null;
	$conn = null;
}