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

    $searchText = $_GET['search'];
    $searchUser = $conn->query("SELECT * FROM `user` WHERE `ID` = '$searchText' OR `Username` = '$searchText' OR `Email` = '$searchText'") or die($conn->error);
    
?>