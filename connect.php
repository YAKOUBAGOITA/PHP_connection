<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    $id = ''; 
}
if (isset($_POST['fname'])) {
    $fname = $_POST['fname'];
} else {
    $fname = ''; 
}
if (isset($_POST['lname'])) {
    $lname = $_POST['lname'];
} else {
   
    $lname = ''; 
}
if (isset($_POST['email'])) {
    $email= $_POST['email'];
} else {
    $email = ''; 
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $password = ''; 
}
$conn = new mysqli('localhost', 'root', 'Pass@12345', 'goita');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO data(id,fname, lname, email, password) 
    VALUES (? ,?, ?,?,?)");

    
    if ($stmt === false) {
        die('Error in preparing statement: ' . $conn->error);
    }

    $stmt->bind_param("issss",$id, $fname, $lname, $email, $password);
    $stmt_executed = $stmt->execute();

    
    if ($stmt_executed === false) {
        die('Error in executing statement: ' . $stmt->error);
    }

    echo "Registration Successful....";

    $stmt->close();
    $conn->close();
}
?>
