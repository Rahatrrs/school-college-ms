<?php
// delete.php

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentmsdb";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve parameters from the POST request
    $id = $_POST['id'];
    $filename = $_POST['filename'];
    $className = $_POST['className'];

    // Delete record from the database
    $sqlDelete = "DELETE FROM results WHERE id = $id";

    if ($conn->query($sqlDelete) === TRUE) {
        // Delete the associated PDF file
        $targetDir = "uploads/";
        $filePath = $targetDir . $filename;
        if (file_exists($filePath)) {
            unlink($filePath);

            // Send a success response
            echo "success";
        } else {
            echo "Error: File not found.";
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If accessed directly, return an error response
    echo "Error: Invalid request.";
}
?>
