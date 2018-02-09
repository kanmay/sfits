<?php
$servername = "ec2-23-21-162-90.compute-1.amazonaws.com:5432";
$username = "aqqqqsiwerdxed";
$password = "8ac3cdad79fcca7d1af33e38e4f192c61da1b2ee24676d08da62478dc7d4a6c7";
$dbname = "deb90cpmmdagnp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }
?>
