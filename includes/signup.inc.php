<?php

if (isset($_POST['signup-submit'])) {

    require 'db.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordR = $_POST['pwd-repeat'];

    if ($username != htmlspecialchars($_POST['uid']) || $email != htmlspecialchars($_POST['mail'])
    || $password != htmlspecialchars($_POST['pwd']) || $passwordR != htmlspecialchars($_POST['pwd-repeat'])) {
        header("Location: ../signup.php?error=chooseYourHatWisely");
	    exit();
    }
    if (empty($username) || empty($email) || empty($password) || empty($passwordR)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduidmail");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    } else if ($password !== $passwordR) {
        header("Location: ../signup.php?error=passwordmismatch&uid=".$username."&mail=".$email);
        exit();
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,64}$/", $password)) {
        header("Location: ../signup.php?error=weakasspwd&uid=".$username."&mail=".$email);
        exit();
    } else {
        // Check if username is in use
        $sql = "SELECT uid_U FROM tbl_users WHERE uid_U = :usr";
        if (!($stmt = $conn->prepare($sql))) {
            header("Location: ../signup.php?error=sqlerror");
            exit(); 
        } else {
            $stmt->execute([':usr'=>$username]);
            $res = $stmt->fetchAll();
            if (sizeof($res) >= 1) {
                header("Location: ../signup.php?error=usernameinuse&uid=".$username);
                exit();
            }
        }
        // Check if email already exists
        $sql = "SELECT email_U FROM tbl_users WHERE email_U = :mail";
        if (!($stmt = $conn->prepare($sql))) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            $stmt->execute([':mail'=>$email]);
            $res = $stmt->fetchAll();
            if (sizeof($res) >= 1) {
                header("Location: ../signup.php?error=emailexists&mail=".$email);
                exit();
            } else {
                $token = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!$_,|~';
                $token = str_shuffle($token);
                $token = substr($token, 0, 32);

                $sql = "INSERT INTO tbl_users (uid_U, email_U, pwd_U, token_U, conf_U) VALUES (:usr, :mail, :pwd, :toke, :con)";
                if (!($stmt = $conn->prepare($sql))) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
					$hashPwd = password_hash($password, PASSWORD_DEFAULT);
                    $stmt->execute([':usr'=>$username, ':mail'=>$email, ':pwd'=>$hashPwd, ':toke'=>$token, ':con'=>'N']);

                    $subject = 'Email Verification for '.$username;
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    $message = file_get_contents('../auth/verify.html');
                    $message = str_replace('%token%', $token, $message);
                    mail($email, $subject, $message, $headers);
                    
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
	}
	$stmt = null;
	$conn = null;
} else {
	header("Location: ../signup.php");
	exit();
}
