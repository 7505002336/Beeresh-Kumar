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

// Handle deletion
if (isset($_POST['teacher_id'])) {
    $t_id = intval($_POST['teacher_id']); // Ensure it's an integer to prevent SQL injection

    // Prepare the delete query
    $sql2 = "DELETE FROM teacher WHERE id='$t_id'";
    $result2 = mysqli_query($data, $sql2);
}

// Fetch teacher data
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Teacher List</title>
    <?php include("admin_css.php"); ?>
    <style>
        .content {
            width: calc(100% - 500px);
            margin: auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            max-height: 80vh;
            overflow-y: auto;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .teacher-image {
            border: 2px solid #4CAF50;
            border-radius: 50%;
            height: 100px;
            width: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <?php include("admin_sidebar.php"); ?>

    <div class="content">
        <h1>Teacher List</h1>
        <table>
            <thead>
                <tr>
                    <th>Teacher Name</th>
                    <th>About Teacher</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($info = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($info['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($info['description']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($info['image']) . 
                     "' class='teacher-image' alt='" . htmlspecialchars($info['name']) . "'></td>";
                    echo "<td>
                            <form action='' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this teacher?\");'>
                                <input type='hidden' name='teacher_id' value='" . htmlspecialchars($info['id']) . "'>
                                <input type='submit' value='Delete' class='btn btn-danger'>
                            </form>
                          </td>";
                    echo "<td>
                            <form action='update_teacher.php' method='GET'>
                                <input type='hidden' name='id' value='" . htmlspecialchars($info['id']) . "'>
                                <input type='submit' value='Update' class='btn btn-primary'>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
