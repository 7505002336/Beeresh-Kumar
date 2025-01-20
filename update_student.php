<!DOCTYPE html>
<html>
<head>
    <?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "studentproject";
    
    // Connect to the database
    $data = mysqli_connect($host, $user, $password, $db);
    if (!$data) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $id = $_GET['student_id'];
    
    // Correct SQL query
    $sql = "SELECT * FROM user WHERE id='$id'";
    
    // Execute query
    $result = mysqli_query($data, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($data));
    }
    
    $info = $result->fetch_assoc();

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Use prepared statements to prevent SQL injection
        $query = $data->prepare("UPDATE user SET username=?, phone=?, email=?, password=? WHERE id=?");
        $query->bind_param("ssssi", $name, $phone, $email, $password, $id);
        
        if ($query->execute()) {
            echo "<script>alert('Updated Successfully')</script>";
        } else {
            echo "Update failed: " . $data->error;
        }
    }
    ?>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <?php include("admin_css.php"); ?>
    <style>

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(10,20, 0, 0.8);
            width: 470px;
            max-width: 500px;
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
        input[type="number"],
        input[type="password"] {
            border: none;
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
</head>
<body>
    <?php include("admin_sidebar.php"); ?>
    <div class="content">
        <center>
        <butten style="display: block;width: 50%; text-align: center; margin: 20px; padding: 10px;
    background-color: #4CAF50; color: white; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif;">
    <h1 style="font-size: 2.5em; font-weight: bold; margin: 0; letter-spacing: 1px;">Update Student Details</h1>
</butten>
            <div>
                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($info['username']); ?>">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone" value="<?php echo htmlspecialchars($info['phone']); ?>">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo htmlspecialchars($info['email']); ?>">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo htmlspecialchars($info['password']); ?>">
                    </div>
                    <div>
                        <input type="submit" name="update" value="Update">
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>
</html>
