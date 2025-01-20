<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($host, $user, $password, $db);
$success_message = "";  // Variable to hold success or error messages

if (isset($_POST['submit'])) {
    $registration_no = $_POST['registrationNo'];
    $owner_name = $_POST['ownerName'];
    $vehicle_type = $_POST['vehicleType'];
    $route = $_POST['route'];
    $vehicle_code = $_POST['vehicleCode'];

    // Insert data into the database
    $sql = "INSERT INTO transport(registration, owner, vehicle_name, route, vehicle_code)
            VALUES('$registration_no', '$owner_name', '$vehicle_type', '$route', '$vehicle_code')";

    if ($data->query($sql) === TRUE) {
        $success_message = "Transport details submitted successfully!";
    } else {
        $success_message = "Error: " . $sql . "<br>" . $data->error;
    }

    $data->close();  // Close the database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport Registration Form</title>
    <style>
        body {
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }

        form {
            margin-top: 10px;
            margin-left: 180px;
            margin-right: 150px;
            border: 2px solid;
            border-radius: 10px;
            width: 920px;
            background-color: #ffffff;
        }

        h1 {
            text-align: center;
        }

        .row 1 {
            margin-left: 500px;
        }

        .row {
            margin-left: 670px;
            margin-top: -95px;
        }

        .col {
            margin-left: 40px;
            width: 250px;
        }

        input {
            padding: 15px;
            border: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }

        input:focus {
            outline: none;
            border-bottom: 2px solid #007bff;
        }

        #datetime {
            text-align: center;
            font-size: 1.2em;
            margin-top: 10px;
            margin-bottom: 20px;
            color: #333;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            margin-left: 340px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            width: 250px;
        }
        .back-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 30px;
            color: black;
            text-decoration: none;
        }
        .back-icon:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <a href="Studenthome.php" class=back-icon>
        <i class="bi bi-arrow-left-circle">Back</i> <!-- Back icon -->
    </a>


    <form action="#" method="POST">
        <h1>Transport Registration</h1>

        <!-- Displaying current date and time -->
        <div id="datetime"></div><br>

        <!-- Display success or error message -->
        <?php if ($success_message != ""): ?>
            <div class="success-message" id="successMessage"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <div class="col">
            <h2><strong>Please complete the registration form.</strong></h2>

            <div class="row 1">
                <h2><label for="registrationNo">Registration No.</label></h2>
                <input type="text" id="registrationNo" name="registrationNo" required><br>
            </div>

            <h3><label for="ownerName">Owner Name</label></h3>
            <input type="text" id="ownerName" name="ownerName" required>
        </div>

        <div class="row">
            <h3><label for="vehicleType">Vehicle Type</label></h3>
            <input type="text" id="vehicleType" name="vehicleType" required>
        </div>

        <div class="col">
            <h3><label for="route">Route</label></h3>
            <input type="text" id="route" name="route" required>
        </div>

        <div class="row">
            <h3><label for="vehicleCode">Vehicle Code</label></h3>
            <input type="text" id="vehicleCode" name="vehicleCode" required>
        </div>

        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </form>

    <script>
        // Function to display current date and time in a specific format
        function updateDateTime() {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const dateTime = now.toLocaleString('en-US', options);
            document.getElementById('datetime').innerHTML = `Current Date and Time: ${dateTime}`;
        }

        // Update the date and time every second
        setInterval(updateDateTime, 1000);

        // Hide the success message after 5 seconds if it's displayed
        window.onload = function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 5000);  // Hide the success message after 5 seconds
            }
        }
    </script>

</body>
</html>
