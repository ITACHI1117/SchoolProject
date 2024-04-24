<?php
ob_start(); // Start output buffering

// Assuming you have received the record ID to be updated
$applicationNumber = $_POST['applicationNumber']; 
$ApprovalType = $_POST["ApprovalType"];


// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "school_project";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to update the record and set the approved column to true
$sql = "UPDATE $ApprovalType SET Approval = True WHERE applicationNumber = ?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("s", $applicationNumber); 

// Execute the statement
if ($stmt->execute()) {
    header("Location: correctionOfNameList.php");
    ob_end_flush();
    exit; // Make sure to stop further execution of PHP code
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();



?>
