<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

// Create connection
$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM admission";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
    <?php
    include("admin_css.php");
    ?>
</head>
<body>
    <?php
    include("admin_sidebar.php");
    ?>
    <div class="content" style="display: flex; justify-content: center; align-items: center; 
     flex-direction: column; margin: 20px;">
           <butten style="display: block; width:60%;text-align: center; margin: 20px; padding: 10px;
     background-color: #4CAF50; color: white; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif;">
    <h1 style="font-size: 2.5em; font-weight: bold; margin: 0; letter-spacing: 1px">Applied For Admission</h1>
</butten>
        <table style="
            width: 60%; 
            border-collapse: collapse; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6); 
            background-color: #ffffff; 
            border: 2px solid #ddd;
        ">
            <thead>
                <tr style="background-color: #4CAF50; color: white;">
                    <th style="padding: 15px; font-size: 16px;">Name</th>
                    <th style="padding: 15px; font-size: 16px;">Phone</th>
                    <th style="padding: 15px; font-size: 16px;">Email</th>
                    <th style="padding: 15px; font-size: 16px;">Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($info = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 15px;"><?php echo htmlspecialchars($info['name']); ?></td>
                        <td style="padding: 15px;"><?php echo htmlspecialchars($info['phone']); ?></td>
                        <td style="padding: 15px;"><?php echo htmlspecialchars($info['email']); ?></td>
                        <td style="padding: 15px;"><?php echo htmlspecialchars($info['message']); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
            </body>