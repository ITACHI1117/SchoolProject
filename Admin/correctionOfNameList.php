<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Correction Of Name</h2>
    <table>
        <thead>
            <tr>
                <th>Application Number</th>
                <th>Matriculation Number</th>
                <th>Surname</th>
                <th>First Name</th>
                <th>Other Name</th>
                <th>Gender</th>
                <th>Date Of Birth</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Marriage Status</th>
                <th>College</th>
                <th>Mode Of Entry</th>
                <th>Study Type</th>
                <th>Study Mode</th>
                <th>Class Of Degree</th>
                <th>Year Of Entry</th>
                <th>Year of Graduation</th>
                <th>Correction Type</th>
                <th>Wrong Document Details</th>
                <th>Correct Document Details</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "school_project";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch user information
            $sql = "SELECT *  FROM correction_of_name";
            $result = $conn->query($sql);

            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["applicationNumber"] . "</td>";
                echo "<td>" . $row["matriculationNumber"] . "</td>";
                echo "<td>" . $row["surname"] . "</td>";
                echo "<td>" . $row["firstname"] . "</td>";
                echo "<td>" . $row["othername"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["dateOfBirth"] . "</td>";
                echo "<td>" . $row["phoneNumber"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["marriageStatus"] . "</td>";
                echo "<td>" . $row["college"] . "</td>";
                echo "<td>" . $row["modeOfEntry"] . "</td>";
                echo "<td>" . $row["studyType"] . "</td>";
                echo "<td>" . $row["studyMode"] . "</td>";
                echo "<td>" . $row["classOfDegree"] . "</td>";
                echo "<td>" . $row["yearOfEntry"] . "</td>";
                echo "<td>" . $row["yearOfGraduation"] . "</td>";
                echo "<td>" . $row["correctionType"] . "</td>";
                
                
                echo "<td><img src='../" . $row["wrongDocumentDetails"] . "' alt='wrongDocumentDetails' style='width: 50px; height: auto;'></td>";
                echo "<td><img src='../" . $row["correctDocumentDetails"] . "' alt='correctDocumentDetails' style='width: 50px; height: auto;'></td>";
                echo "<td><form action='approval.php' method='post'>
                <input name='applicationNumber' type='hidden' value= ". $row["applicationNumber"] ."></input>
                <input name='ApprovalType' type='hidden' value= 'correction_of_name'></input>";
                if( $row["Approval"] == 0 ){
                    echo "<button type='submit' class=" . $row["applicationNumber"] .">Approve</button>
                    </form></td>";
                }else{
                   echo "<h4>Approved✅</h4>";
                }
                
                echo "</tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
