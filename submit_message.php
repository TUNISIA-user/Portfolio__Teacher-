<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "basa"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$message = $_POST['message'];


$stmt = $conn->prepare("INSERT INTO Messages (Name, Email, Course, Message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $course, $message);


if ($stmt->execute()) {
    echo "tw njawbok 3ala 9rib ya bahi ";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
