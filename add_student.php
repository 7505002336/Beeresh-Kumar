<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['add_student'])) {
    $user_name = $_POST['name'];
    $user_phone = $_POST['phone'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $usertype = "student";

    // Corrected variable name from 'username' to 'user_name'
    $check = "SELECT * FROM user WHERE username='$user_name'";

    $check_user = mysqli_query($data, $check);

    $row_count = mysqli_num_rows($check_user);
    if ($row_count == 1) {
        echo "<script type='text/javascript'>
            alert('Username already exists. Try another one.');
            </script>";
    } else {
        $sql = "INSERT INTO user (username, phone, email, password, usertype) 
        VALUES ('$user_name', '$user_phone', '$user_email', '$user_password', '$usertype')";

        $result = mysqli_query($data, $sql);
        if ($result) {
            echo "<script type='text/javascript'>
            alert('Data Uploaded Successfully.');
            </script>";
        } else {
            echo "Data upload failed.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <style>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(10,20, 0, 0.2);
            width: 470px;
            max: width 500px;
            display: flex;
            flex-direction: column;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            color: #4CAF50;
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            border:none;
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Optional: Add responsive design */
        @media (max-width: 500px) {
            form {
                width: 90%;
            }
        }
    </style>
	<?php
	include("admin_css.php")
	?>
</head>
<body>
<?php
    include("admin_sidebar.php")
?>
<div class="content">
<center>
<butten style="display: block;width: 60%; text-align: center; margin: 20px; padding: 10px;
    background-color: #4CAF50; color: white; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif;">
    <h1 style="font-size: 2.5em; font-weight: bold; margin: 0; letter-spacing: 1px;">Add Student Details</h1>
</butten>
    <div>
    <form action="#" method="POST">
        <div>
            <label>Student Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Phone</label>
            <input type="number" name="phone">
        </div>
        <div>
            <label>Email</label>
            <input type="text" name="email">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password">
        </div>
        <div>
            <input type="Submit" name="add_student" value="Add Student">
        </div>
   </form>
</div>
</div>
    </center>
</body>
</html>