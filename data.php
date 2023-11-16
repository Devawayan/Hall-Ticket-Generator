<?php
$servername="localhost";
$username= "root";
$password= "";
$databasename= "hall_ticket";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Collect form data
    $FULL_NAME = $_POST['FULL_NAME'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO database1 (FULL_NAME, Email, Password) VALUES (:FULL_NAME, :Email, :Password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':FULL_NAME', $FULL_NAME);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':Password', $Password);
    $stmt->execute();

    echo "Data inserted successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn= null;
?>