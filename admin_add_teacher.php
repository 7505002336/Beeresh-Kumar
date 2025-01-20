
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

// Establish database connection
$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize message variable
$message = '';

if (isset($_POST['add_teacher'])) {
    $t_name = $_POST['name'];
    $t_description = $_POST['description'];
    $file = $_FILES['image']['name'];

    // Set destination for the uploaded file
    $dst = "./image/" . basename($file);
    $dst_db = "image/" . basename($file);

    // Move the uploaded file to the destination
    if (move_uploaded_file($_FILES['image']['tmp_name'], $dst)) {
        $sql = "INSERT INTO teacher(name, description, image) VALUES('$t_name', '$t_description', '$dst_db')";
        if (mysqli_query($data, $sql)) {
            $message = "Teacher added successfully.";
        } else {
            $message = "Error: " . mysqli_error($data);
        }
    } else {
        $message = "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Teacher</title>
    <?php include("admin_css.php"); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .content {
            width: calc(100% - 250px);
            height: 80vh;
            margin: auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            float: right;
            overflow-y: auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }
        .form-field {
            margin-bottom: 15px;
        }
        .form-field label {
            display: block;
            margin-bottom: 5px;
        }
        .form-field input[type="text"],
        .form-field input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-field button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-field button:hover {
            background-color: #45a049;
        }
        .message {
            opacity: 2px;
            text-align: center;
            color: black;
            margin-bottom: 20px;
            padding: 10px;
            border: 2px solid green;
            background-color: red;
            border-radius: 5px;
        }
        .ok-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 5px 10px;
        }
        .ok-button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function hideMessage() {
            document.getElementById("successMessage").style.display = "none";
        }
    </script>
</head>
<body>
    <?php include("admin_sidebar.php"); ?>

    <div class="content">
        <h1>Add Teacher</h1>

        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-field">
                <label for="name">Teacher Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-field">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" required>
            </div>
            <div class="form-field">
                <label for="photo">Upload Photo:</label>
                <input type="file" id="photo" name="image" accept="image/*" required>
            </div>
            <div class="form-field">
                <button type="submit" name="add_teacher">Add Teacher</button>
            </div>
        </form>
    </div>
</body>
</html>
