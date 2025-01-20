<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if student_id is provided
if (isset($_GET['student_id'])) {
    $user_id = mysqli_real_escape_string($data, $_GET['student_id']);

    // Correct SQL query
    $sql = "DELETE FROM user WHERE id='$user_id'";

    // Execute query
    if (mysqli_query($data, $sql)) {
        // Redirect to another page
        header("Location: view_student.php");
        exit(); // Ensure no further code is executed after redirect
    } else {
        echo "Error deleting record: " . mysqli_error($data);
    }
} else {
    echo "No student ID provided.";
}

// Close the database connection
mysqli_close($data);
?>
