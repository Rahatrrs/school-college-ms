<?php
// your_upload_handler.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve form data
    $className = $_POST['nottitle'];

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES['resultPdf']['name']);

    if (move_uploaded_file($_FILES['resultPdf']['tmp_name'], $targetFile)) {
        // File uploaded successfully, now insert data into the database
        $resultPdf = $_FILES['resultPdf']['name'];

        // SQL query to insert data into the 'results' table
        $sql = "INSERT INTO results (class_name, result_pdf) VALUES ('$className', '$resultPdf')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Record inserted successfully"); window.location = "post-results.php";</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "File upload failed";
    }

    // Close the database connection
    $conn->close();
}
?>
