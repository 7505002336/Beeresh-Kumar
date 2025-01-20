<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM course";
$result = mysqli_query($data, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($data));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Course List</title>
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
        .button {
            padding: 6px 12px;
            margin: 0 5px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .button-delete {
            background-color: #d9534f; /* Red for delete */
        }
        .button-update {
            background-color: #0275d8; /* Blue for update */
        }
        .button:hover {
            opacity: 0.8;
        }
        .button-delete:hover {
            background-color: #c9302c;
        }
        .button-update:hover {
            background-color: #025aa5;
        }
    </style>
</head>
<body>
    <?php include("admin_sidebar.php"); ?>

    <div class="content">
        <h1>Course List</h1>
        <table>
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Credits</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($info = $result->fetch_assoc()) {
                    $course_id = $info['id']; // Assuming the course table has an 'id' field
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($info['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($info['code']) . "</td>";
                    echo "<td>" . htmlspecialchars($info['credits']) . "</td>";
                    echo "<td>
                            <form method='POST' action='delete_course.php'>
                                <input type='hidden' name='course_id' value='$course_id'>
                                <button type='submit' class='button button-delete'
                                 onclick='return confirm(\"Are you sure you want to delete this course?\");'>Delete</button>
                            </form>
                          </td>";
                    echo "<td>
                            <form method='GET' action='admin_update_course.php'>
                                <input type='hidden' name='course_id' value='$course_id'>
                                <button type='submit' class='button button-update'>Update</button>
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
