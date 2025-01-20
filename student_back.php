<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($host, $user, $password, $db);
$success_message = "";  // Variable to hold success or error messages

if (isset($_POST['submit'])) {
    $enrollment = $_POST['enrollment'];
    $name = $_POST['studentName'];
    $course = $_POST['course'];
    $subject = $_POST['subjectName'];
    $subject_code = $_POST['subjectCode'];

    // Insert data into the database
    $sql = "INSERT INTO back_registration(enrollment, name, course, subject, subject_code)
            VALUES('$enrollment', '$name', '$course', '$subject', '$subject_code')";

    if ($data->query($sql) === TRUE) {
        $success_message = "Form submitted successfully!";
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
    <title>Student Back Registration Form</title>
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
            width:250px;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <form action="#" method="POST">
        <h1>Student Back Registration</h1>

        <!-- Displaying current date and time -->
        <div id="datetime"></div><br>

        <!-- Display success or error message -->
        <?php if ($success_message != ""): ?>
            <div class="success-message" id="successMessage"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <div class="col">
            <h2><strong>Please complete the registration form.</strong></h2>

            <div class="row 1">
                <h2><label for="enrollment">Enrollment No.</label></h2>
                <input type="text" id="enrollment" name="enrollment" required><br>
            </div>

            <h3><label for="studentName">Name</label></h3>
            <input type="text" id="studentName" name="studentName" required>
        </div>

        <div class="row">
            <h3><label for="course">Course</label></h3>
            <input type="text" id="course" name="course" required>
        </div>

        <div class="col">
            <h3><label for="subject">Subject</label></h3>
            <input type="text" id="subjectName" name="subjectName" required>
        </div>

        <div class="row">
            <h3><label for="subjectcode">Subject Code</label></h3>
            <input type="text" id="subjectCode" name="subjectCode" required>
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
