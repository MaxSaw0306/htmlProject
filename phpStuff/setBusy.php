<?php
    $servername = "localhost";
    $username = "Master";
    $password = "8vOCmO7GYNgiovSH";
    $dbname ="maxwels";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $user = $_GET['user'];
    $setBusy = $conn->query("UPDATE programmer p INNER JOIN user u ON u.ID = p.P_ID SET p.Status = 'BUSY' WHERE u.Username = '$user'") or die($conn->error);
?>