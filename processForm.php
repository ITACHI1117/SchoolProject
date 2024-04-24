<?php

$database = $_POST["database"];


$applicationNumber = $_POST["applicationNumber"];
$matriculationNumber = $_POST["matriculationNumber"];
$surname = $_POST["surname"];
$firstname = $_POST["firstname"];
$othername = $_POST["othername"];
$gender = $_POST["gender"];
$dateOfBirth = $_POST["dateOfBirth"];
$phoneNumber = $_POST["phoneNumber"];
$email = $_POST["email"];
$marriageStatus = $_POST["marriageStatus"];
$college = $_POST["college"];
$modeOfEntry = $_POST["modeOfEntry"];
$studyType = $_POST["studyType"];
$studyMode = $_POST["studyMode"];
$classOfDegree = $_POST["classOfDegree"];
$yearOfEntry = $_POST["yearOfEntry"];
$yearOfGraduation =$_POST["yearOfGraduation"];
$correctionType = $_POST["correctionType"];

$targetDirectory = "uploads/";
$uploadedFiles = [];

// Loop through each uploaded file
foreach ($_FILES as $key => $file) {
    $file_name = $file["name"];
    $file_tmp = $file["tmp_name"];
    $file_size = $file["size"];
    $targetFile = $targetDirectory . basename($file_name);


    if($file_size > 3 * 1024 * 1024){
        echo "Error: The uploaded image is too large (maximum size is 3MB).";
    }else{
if (move_uploaded_file($file_tmp, $targetFile)) {
        // File uploaded successfully, add file path to the array
        $uploadedFiles[] = $targetFile;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
    
}


$host ="localhost";
$dbname = "school_project";
$username = "root";
$password = "";

$connection = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_error()){
    die("Connection error:" . mysqli_connect_error());
}


if($database == "correction_of_name"){
    $sql = "INSERT INTO correction_of_name (applicationNumber, matriculationNumber, surname, firstname, othername,
    gender, dateOfBirth, phoneNumber, email, marriageStatus, college, modeOfEntry, studyType, studyMode, classOfDegree,
    yearOfEntry, yearOfGraduation, correctionType, wrongDocumentDetails, correctDocumentDetails)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($connection);

// Check if the SQL statement is valid
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($connection));
}

// Bind parameters to the SQL statement
mysqli_stmt_bind_param($stmt, "sisssssissssssssssss",
    $applicationNumber, $matriculationNumber, $surname, $firstname, $othername,
    $gender, $dateOfBirth, $phoneNumber, $email, $marriageStatus, $college, $modeOfEntry,
    $studyMode, $studyType, $classOfDegree, $yearOfEntry, $yearOfGraduation,
    $correctionType, $uploadedFiles[0], $uploadedFiles[1]);
}





// Execute the SQL statement
if (mysqli_stmt_execute($stmt)) {
    echo "Record saved";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($connection);


// $sql = "SELECT * FROM correction_of_name";
// $result = $connection->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "<div>";
//         echo "<p>Application Number: " . $row["applicationNumber"]. "</p>";
//         echo "<p>Matriculation Number: " . $row["matriculationNumber"]. "</p>";
//         echo "</div>";
//     }
// } else {
//     echo "0 results";
// }

