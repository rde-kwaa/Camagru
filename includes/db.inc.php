<?php
    // Login and Database information
    $servername = "localhost";
    $username = "root";
    $password = "gandalf";
    $dbname = "camdb";

    // PDO Connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // PDO Exception Error Mode
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Connection Failed: ". $e->getMessage();
    }