<?php
    // Login and Database information
    $servername = "localhost";
    $username = "root";
    $password = "gandalf";
    $dbname = "camdb";
    $tbl_user = "tbl_users";
	$tbl_pics = "tbl_picts";
	$tbl_like = "tbl_likes";
    $tbl_comm = "tbl_comms";

    // Create database using PDO method
    try {
        $conn = new PDO("mysql:host=$servername", $username, $password);
        // PDO Exception Error Mode
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connection Established<br>";
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Database Created Successfully<br>";
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
	}

    // User Table
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // PDO Exception Error Mode
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create User Table with SQL
        $sql = "CREATE TABLE IF NOT EXISTS $tbl_user (
        id_U INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
        uid_U VARCHAR(42) NOT NULL,
        email_U VARCHAR(320) NOT NULL,
        pwd_U VARCHAR(512) NOT NULL,
        token_U VARCHAR(32) NOT NULL,
        conf_U ENUM('N', 'Y') NOT NULL,
		notf_U ENUM('Y', 'N') NOT NULL
        )";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table \"tbl_users\" created successfully<br>";
        }
    catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

    // Photos Table
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // PDO Exception Error Mode
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create Photos Table with SQL
        $sql = "CREATE TABLE IF NOT EXISTS $tbl_pics (
        id_P INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
        photo_P LONGTEXT NOT NULL,
        idu_P INT(6) NOT NULL,
        likes_P INT(11) NOT NULL DEFAULT '0'
        )";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table \"tbl_picts\" created successfully<br>";
        }
    catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

	// Likes Table
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // PDO Exception Error Mode
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create Photos Table with SQL
        $sql = "CREATE TABLE IF NOT EXISTS $tbl_like (
        id_L INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
        idu_L INT(6) NOT NULL,
        id_P INT(6) NOT NULL
        )";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table \"tbl_likes\" created successfully<br>";
        }
    catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

    // Comments Table
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // PDO Exception Error Mode
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create Photos Table with SQL
        $sql = "CREATE TABLE IF NOT EXISTS $tbl_comm (
        id_C INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
        comm_C VARCHAR(1024) NOT NULL,
        id_P INT(6) NOT NULL,
        idu_C INT(6) NOT NULL
        )";

        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table \"tbl_comms\" created successfully<br>";
        }
    catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;

?>