<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {

}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="../new/fav.png" type="image/x-icon">
    <title>Student  Management System|| Add Notice</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Add Results </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Results</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Add Results</h4>
                   
                    <form method="post" action="your_upload_handler.php" enctype="multipart/form-data">
                      <!-- Other form fields -->

                      <div class="form-group">
                          <label for="exampleInputName1">Class Name</label>
                          <input type="text" name="nottitle" value="" class="form-control" required='true'>
                      </div>

                      <div class="form-group">
                          <label for="resultPdf">Result PDF</label>
                          <input type="file" name="resultPdf" id="resultPdf" accept=".pdf">
                          <small class="form-text text-muted">Upload a PDF file.</small>
                      </div>

                      <!-- Other form fields -->

                      <button type="submit" class="btn btn-primary">Submit</button>
                  </form>

                  </div>
                </div>
              </div>
            </div>
          </div>




        <style>
        .pdf-container {
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap to the next line */
        }

        .pdf-item {
    margin: 1rem; /* 10px to rem */
    flex: 0 0 calc(25% - 1.6rem); /* 20px to rem; Set the width of each item to 25% (4 items in a row) */
    box-sizing: border-box;
}

.pdf-link {
    text-decoration: none;
    color: #0066cc;
    display: flex;
    flex-direction: column; /* Stack text and icon vertically */
    align-items: center; /* Center items horizontally */
    border: 0.1rem solid #ddd; /* 1px to rem */
    padding: 1rem; /* 10px to rem */
    text-align: center;
    position: relative;
}

.pdf-link:hover {
    text-decoration: underline;
}

.pdf-icon {
    margin-bottom: 1rem; /* 10px to rem */
    width: 5rem; /* 50px to rem */
    height: 6rem; /* 60px to rem */
}

.delete-button {
    position: absolute;
    bottom: 0.5rem; /* 5px to rem */
    right: 0.5rem; /* 5px to rem */
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem; /* 5px 10px to rem */
    cursor: pointer;
}

    </style>


          <div class="results">
          <h2 class="title-show">Uploaded Results</h2>

          <?php
// display_pdfs.php

// Directory where uploaded files are stored
$targetDir = "uploads/";

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

// Fetch data from the 'results' table
$sql = "SELECT id, class_name, result_pdf FROM results";
$result = $conn->query($sql);

// Display each PDF file along with the class_name as a link
if ($result->num_rows > 0) {
    echo "<div class='pdf-container'>";
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $className = $row['class_name'];
        $filename = $row['result_pdf'];

        // Add a PDF icon
        $pdfIcon = '<img src="./pdf/pdf.png" alt="PDF" class="pdf-icon">';

        echo "<div class='pdf-item' id='pdf-item-$id'>
        $className 
              <a href='$targetDir$filename' target='_blank' class='pdf-link'>
                $pdfIcon
                $filename
                <br><br><br>
                <button class='delete-button' onclick='deletePDF($id, \"$filename\", \"$className\", event); return false;'>Delete</button>

              </a>
            </div>";
    }
    echo "</div>";
} else {
    echo "No PDF files found.";
}

// Close the database connection
$conn->close();
?>









<script>
   function deletePDF(id, filename, className) {
    if (confirm("Are you sure you want to delete this record?")) {
        // Send an AJAX request to delete.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete-result.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Define the parameters to be sent in the request
        var params = "id=" + id + "&filename=" + filename + "&className=" + className;

        // Set up the callback function to handle the response
        xhr.onload = function () {
            if (xhr.status === 200 && xhr.responseText === "success") {
                // If the deletion is successful, remove the corresponding HTML element
                var element = document.getElementById("pdf-item-" + id);
                if (element) {
                    element.remove();
                } else {
                    alert("Error: Could not find the HTML element to remove.");
                }
            } else {
                alert("Error: " + xhr.responseText);
            }
        };

        // Send the request
        xhr.send(params);
    }
}

</script>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>