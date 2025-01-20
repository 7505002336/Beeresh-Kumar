<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    $sql = "DELETE FROM course WHERE id = ?";
    $stmt = $data->prepare($sql);
    $stmt->bind_param("i", $course_id);
    if ($stmt->execute()) {
        header("Location: admin_course_view.php"); // Redirect to the course list page after deletion
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
