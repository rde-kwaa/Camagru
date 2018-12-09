<?php
if (isset($_POST['pic-pos'])) {

    require 'db.inc.php';
	
	session_start();
    $user = $_SESSION['uid'];
    $image = $_POST['idata'];
    $imagedata = base64_encode($_POST['idata']);

    if ($user != htmlspecialchars($_SESSION['uid']) || base64_decode($imagedata, true) !== $image) {
        header("Location: ../index.php?error=chooseYourHatWisely");
	    exit();
    }
    $sql = "INSERT INTO tbl_picts (photo_P, idu_P) VALUES (:pic, (SELECT `tbl_users`.`id_U` FROM `tbl_users` WHERE `tbl_users`.`uid_U` = :uid))";
    if (!($stmt = $conn->prepare($sql))) {
        header("Location: ../index.php?error=sqlerror");
        exit();
    } else {
        $stmt->execute([':pic'=>base64_decode($imagedata, true), ':uid'=>$user]);
        header("Location: ../index.php?picture=posted");
        exit();
    }
    
    $stmt = null;
    $conn = null;
}
