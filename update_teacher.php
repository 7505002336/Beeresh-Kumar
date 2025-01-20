<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

// Establish database connection
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle update
if (isset($_POST['id'])) {
    $t_id = intval($_POST['id']);
    $name = mysqli_real_escape_string($data, $_POST['name']);
    $description = mysqli_real_escape_string($data, $_POST['description']);
    $image = $_FILES['image']['name'];

    // Handle image upload
    if ($image) {
        $target_dir = "uploads/"; // Ensure this directory exists and is writable
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    } else {
        // If no new image, keep the old one
        $currentTeacher = mysqli_fetch_assoc(mysqli_query($data, "SELECT image FROM teacher WHERE id='$t_id'"));
        $target_file = $currentTeacher['image'];
    }

    // Prepare the update query
    $sql = "UPDATE teacher SET name='$name', description='$description', image='$target_file' WHERE id='$t_id'";
    if (mysqli_query($data, $sql)) {
        echo "<script>alert('Update Success'); window.location.href='teacher_list.php';</script>"; // Redirect after success
    } else {
        echo "<script>alert('Error updating teacher: " . mysqli_error($data) . "');</script>";
    }
}

// Fetch teacher data for editing
if (isset($_GET['id'])) {
    $t_id = intval($_GET['id']);
    $teacherData = mysqli_fetch_assoc(mysqli_query($data, "SELECT * FROM teacher WHERE id='$t_id'"));
} else {
    die("No teacher ID specified.");
}
?>
<?php include("admin_css.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Update Teacher</title>
    <style>
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }
        .teacher-image {
            border: 2px solid #4CAF50;
            border-radius: 8px;
            height: 100px; /* Fixed height */
            width: 100px; /* Fixed width */
            object-fit: cover; /* Maintain aspect ratio */
            margin-bottom: 15px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include("admin_sidebar.php"); ?>

    <div class="content">
        <h1>Update Teacher</h1>
        <form action="admin_view_teacher.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($teacherData['id']); ?>">
            
            <label for="name">Teacher Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($teacherData['name']); ?>" required>

            <label for="description">About Teacher:</label>
            <textarea name="description" required><?php echo htmlspecialchars($teacherData['description']); ?></textarea>

            <label for="image">Image:</label>
            <input type="file" name="image">
            <img src="<?php echo htmlspecialchars($teacherData['image']); ?>" class="teacher-image" alt="<?php echo htmlspecialchars($teacherData['name']); ?>">

            <input type="submit" value="Update" class="btn">
        </form>
    </div>
</body>
</html>
