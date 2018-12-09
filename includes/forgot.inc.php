<?php

if (isset($_POST['forgot-pwd'])) {

    require 'db.inc.php';

    $mailuid = $_POST['mailuid'];

    if ($mailuid != htmlspecialchars($_POST['mailuid'])) {
        header("Location: ../index.php?error=chooseYourHatWisely");
	    exit();
    }
	if (empty($mailuid)) {
		header("Location: ../index.php?error=emptyfield");
		exit();
	} else {
        $sql = "SELECT * FROM tbl_users WHERE email_U = :mid";
		if (!($stmt = $conn->prepare($sql))) {
			header("Location: ../signup.php?error=sqlerror");
			exit();
		} else {
            $stmt->execute([':mid'=>$mailuid]);
			$res = $stmt->fetch();
            if ($res) {
                $tid = $res['token_U'];
                $subject = 'Password Reset';
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $message = file_get_contents('../auth/forgot.html');
                $message = str_replace('%token%', $tid, $message);
                mail($mailuid, $subject, $message, $headers);
                    
                header("Location: ../index.php?reset=success");
                exit();
            } else {
                header("Location: ../index.php?reset=emailnotfound");
			    exit();
            }
        }
    }
    $stmt = null;
	$conn = null;
}