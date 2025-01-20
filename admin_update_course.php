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

// Fetch course details based on the course_id passed via GET
if (isset($_GET['course_id']) && filter_var($_GET['course_id'], FILTER_VALIDATE_INT)) {
    $course_id = $_GET['course_id'];
    $sql = "SELECT * FROM course WHERE id = ?";
    $stmt = $data->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();
}

// Update the course details if form is submitted
if (isset($_POST['update_course'])) {
    $c_name = $_POST['name'];
    $c_code = $_POST['code'];
    $c_credit = $_POST['credits'];

    // Prepare and bind the SQL query for updating the course
    $update_sql = "UPDATE course SET name = ?, code = ?, credits = ? WHERE id = ?";
    $update_stmt = $data->prepare($update_sql);
    $update_stmt->bind_param("ssii", $c_name, $c_code, $c_credit, $course_id);

    if ($update_stmt->execute()) {
        // Redirect after successful update
        header('Location: admin_course_view.php');  // Redirect to admin_view_course.php
        exit();  // Always call exit after a header redirect
    } else {
        $message = "Error: " . $update_stmt->error;
        $message_class = "alert-danger";
    }

    // Close the prepared statement for the update query
    $update_stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <?php include("admin_css.php"); ?>
    <style>
        body {
            background: #f2f2f2;
        }
        .content {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin-top: 80px;
            height: auto;
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
        input[type="text"], input[type="number"] {
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
        .alert-success {
            color: green;
            text-align: center;
            font-weight: bold;
        }
        .alert-danger {
            color: red;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include("admin_sidebar.php"); ?>
    <center>
    <div class="content">
        <?php if (isset($message)): ?>
            <div class="alert <?php echo $message_class; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="admin_update_course.php?course_id=<?php echo $course_id; ?>" method="post">
            <fieldset>
                <h1>Update Course Details</h1>

                <label for="courseName">Course Name:</label>
                <input type="text" id="courseName" name="name" required value="<?php echo htmlspecialchars($course['name']); ?>">

                <label for="courseCode">Course Code:</label>
                <input type="text" id="courseCode" name="code" required value="<?php echo htmlspecialchars($course['code']); ?>">

                <label for="credits">Credits:</label>
                <input type="number" id="credits" name="credits" required min="1" max="10" value="<?php echo htmlspecialchars($course['credits']); ?>">

                <button type="submit" name="update_course">Update Course</button>
            </fieldset>
        </form>
    </div>
    </center>
</body>
</html>
