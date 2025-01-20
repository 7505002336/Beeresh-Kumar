<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_course'])) {
    $c_name = $_POST['name'];
    $c_code = $_POST['code'];
    $c_credit = $_POST['credits']; // Updated to match input name

    // Corrected the SQL query to match the number of columns and values
    $stmt = $data->prepare("INSERT INTO course (name, code, credits) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $data->error);
    }

    $stmt->bind_param("ssi", $c_name, $c_code, $c_credit); // Adjusted parameter types to match three inputs

    if ($stmt->execute()) {
         echo '<script>alert("New course added successfully!");</script>';
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <?php include("admin_css.php"); ?>
    <style>
        body{
            background: #f2f2f2;
        }
        .content {
            background:white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px; /* Increased padding for better spacing */
            max-width: 600px;
            margin-top: 80px;
            height: 400px; /* Set the fixed height */
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 16px;
        }
        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <?php include("admin_sidebar.php"); ?>
    <center>
    <div class="content">
        <form action="admin_add_course.php" method="post">
            <fieldset>
                <h1>Add Course Details</h1>

                <label for="courseName">Course Name:</label>
                <input type="text" id="courseName" name="name" required placeholder="Enter course name">

                <label for="courseCode">Course Code:</label>
                <input type="text" id="courseCode" name="code" required placeholder="Enter course code">

                <label for="credits">Credits:</label>
                <input type="number" id="credits" name="credits" required min="1" max="10" placeholder="Enter number of credits">

                <button type="submit" name="add_course">Add Course</button>
            </fieldset>
        </form>
    </div>
    </center>
</body>
</html>
