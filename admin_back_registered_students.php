<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Variable to hold success or error messages
$success_message = "";

// Handle form submission
if (isset($_POST['submit'])) {
    $enrollment = $_POST['enrollment'];
    $name = $_POST['studentName'];
    $course = $_POST['course'];
    $subject = $_POST['subjectName'];
    $subject_code = $_POST['subjectCode'];

    // Insert data into the database
    $sql = "INSERT INTO back_registration(enrollment, name, course, subject, subject_code)
            VALUES('$enrollment', '$name', '$course', '$subject', '$subject_code')";

    if ($data->query($sql) === TRUE) {
        $success_message = "Form submitted successfully!";
    } else {
        $success_message = "Error: " . $sql . "<br>" . $data->error;
    }
}

// Fetch data from the database
$sql = "SELECT * FROM back_registration";
$result = $data->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Back Registration</title>
    <style>
        /* Page Styling */
        body {
            background-color: #e9f7f9; /* Light blue background for a calm appearance */
            color: #333; /* Standard text color */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #0056b3; /* Darker blue for headings */
            text-align: center;
            margin-top: 20px;
            font-size: 1.8em;
        }

        /* Table Styling */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            background-color: #ffffff; /* White table background */
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd; /* Light gray borders */
            font-size: 1em;
        }

        th {
            background-color: #007bff; /* Blue header background */
            color: white; /* White header text */
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Light gray for alternate rows */
        }

        tr:hover {
            background-color: #d4eaf7; /* Light blue hover effect */
            transition: background-color 0.3s; /* Smooth hover transition */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                font-size: 14px; /* Slightly smaller text for mobile */
            }

            table {
                width: 100%; /* Full width for smaller screens */
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Registered Students Table -->
    <h2>Back Registered Students</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Enrollment</th>
                <th>Name</th>
                <th>Course</th>
                <th>Subject</th>
                <th>Subject Code</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['Enrollment'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['course'] . "</td>";
                    echo "<td>" . $row['subject'] . "</td>";
                    echo "<td>" . $row['subject_code'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
