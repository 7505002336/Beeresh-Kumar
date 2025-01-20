<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

// Establish database connection
$data = mysqli_connect($host, $user, $password, $db);

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
            max-height: 80vh; /* Set a maximum height */
            overflow-y: auto; /* Enable vertical scrolling */
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
            border: 2px solid #4CAF50; /* Border color */
            border-radius: 50%; /* Rounded corners */
            height: 100px; /* Set height */
            width: 100px; /* Set width */
            object-fit: cover; /* Maintain aspect ratio */
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
                            <form action='delete_teacher.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this teacher?\");'>
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
