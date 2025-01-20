<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start(); // Start the session at the beginning

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "studentproject";

    // Create connection
    $data = mysqli_connect($host, $user, $password, $db);

    // Check connection
    if (!$data) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo("Connection successful<br>");

    // Check if form is submitted
    if (isset($_POST['apply'])) {
        $data_name = mysqli_real_escape_string($data, $_POST['name']);
        $data_phone = mysqli_real_escape_string($data, $_POST['phone']);
        $data_email = mysqli_real_escape_string($data, $_POST['email']);
        $data_message = mysqli_real_escape_string($data, $_POST['message']);

        // Use prepared statements to prevent SQL injection
        $stmt = $data->prepare("INSERT INTO admission (name, phone, email, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $data_name, $data_phone, $data_email, $data_message);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Your application was sent successfully.";
            header("Location: student.php");
            exit(); // Make sure to call exit after header redirection
        } else {
            echo "Apply Failed: " . $stmt->error;
        }

        $stmt->close();
    }

    $data->close(); // Close the connection
    ?>
</body>
</html>
