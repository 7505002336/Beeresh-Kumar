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

// Correct SQL query
$sql = "SELECT * FROM user WHERE usertype='student'";

// Execute query
$result = mysqli_query($data, $sql);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($data));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <?php include("admin_css.php"); ?>
    <style>
        .delete {
            display: inline-block;
            padding: 10px 20px;
            background-color: red;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .update {
            display: inline-block;
            padding: 10px 20px;
            background-color: green;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include("admin_sidebar.php"); ?>
    <div class="content" style="display: flex; justify-content: center; align-items: center; flex-direction: column; margin: 20px;">
        <button style="display: block; width: 60%; text-align: center; margin: 20px; padding: 10px; background-color: #4CAF50; color: white; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif;">
            <h1 style="font-size: 2.5em; font-weight: bold; margin: 0; letter-spacing: 1px">All Student Details</h1>
        </button>
        <table style="width: 60%; border-collapse: collapse; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6); background-color: #ffffff; border: 2px solid #ddd;">
            <thead>
                <tr style="background-color: #4CAF50; color: white;">
                    <th style="padding: 15px; font-size: 16px;">Name</th>
                    <th style="padding: 15px; font-size: 16px;">Phone</th>
                    <th style="padding: 15px; font-size: 16px;">Email</th>
                    <th style="padding: 15px; font-size: 16px;">Password</th>
                    <th style="padding: 15px; font-size: 16px;">Update</th>
                    <th style="padding: 15px; font-size: 16px;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($info = $result->fetch_assoc()) {
                    ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 15px;"><?php echo htmlspecialchars($info['username']); ?></td>
                        <td style="padding: 15px;"><?php echo htmlspecialchars($info['phone']); ?></td>
                        <td style="padding: 15px;"><?php echo htmlspecialchars($info['email']); ?></td>
                        <td style="padding: 15px;"><?php echo htmlspecialchars($info['password']); ?></td>
                        <td style="padding: 15px;">
                            <a class="update" href="update_student.php?student_id=<?php echo $info['id']; ?>">Update</a>
                        </td>
                        <td style="padding: 15px;">
                            <a class="delete" onclick="return confirm('Confirm to Delete Student?');" href="delete.php?student_id=<?php echo $info['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php mysqli_close($data); ?>
</body>
</html>
