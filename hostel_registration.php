<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "studentproject";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = $conn->real_escape_string($_POST['name']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $nationality = $conn->real_escape_string($_POST['nationality']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);

    // Handle file upload
    $photo = $_FILES['photo']['name']; // Original file name
    $photo_tmp = $_FILES['photo']['tmp_name']; // Temporary file path
    $photo_folder = "uploads/"; // Directory to save uploaded files

    // Ensure the directory exists
    if (!is_dir($photo_folder)) {
        mkdir($photo_folder, 0755, true); // Create directory if not exists
    }

    $photo_target = $photo_folder . uniqid() . "_" . basename($photo); // Unique name for the file

    // Check if the file is uploaded properly
    if (is_uploaded_file($photo_tmp)) {
        if (move_uploaded_file($photo_tmp, $photo_target)) {
            //echo "Photo uploaded successfully!";
        } else {
            die("Error moving uploaded photo. Check folder permissions.");
        }
    } else {
        die("Error uploading photo. Please try again.");
    }

    // Insert data into the database
    $sql = "INSERT INTO students (name, gender, dob, nationality, phone, email, photo)
            VALUES ('$name', '$gender', '$dob', '$nationality', '$phone', '$email', '$photo_target')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! <br> <strong>Thank you for registering with us.</strong>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    

    h1 {
      text-align: center;
      color: #4CAF50;
    }

    fieldset {
      border: 2px solid #4CAF50; /* Thicker fieldset border */
      border-radius: 5px;
      margin-bottom: 15px; /* Add space between fieldsets */
      padding: 15px; /* Space inside each fieldset */
    }

    legend {
      font-weight: bold;
      color: #4CAF50;
    }
    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 5px;
    }

    button:hover {
      background-color: #45a049; /* Slightly darker green on hover */
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h1>Hostel Registration Form</h1>
    <form action="#" method="post" enctype="multipart/form-data">
      <!-- Personal Details -->
      <fieldset>
        <legend>Personal Details</legend>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="" disabled selected>Choose...</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="nationality">Nationality:</label>
        <input type="text" id="nationality" name="nationality" required>

        <label for="phone">Contact Number:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>

        <label for="photo">Profile Photo:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>
      </fieldset>

      <!-- Parent/Guardian Details -->
      <fieldset>
        <legend>Parent/Guardian Details</legend>
        <label for="guardian-name">Guardian Name:</label>
        <input type="text" id="guardian-name" name="guardian-name" required>

        <label for="relationship">Relationship:</label>
        <input type="text" id="relationship" name="relationship" required>

        <label for="guardian-phone">Contact Number:</label>
        <input type="tel" id="guardian-phone" name="guardian-phone" required>

        <label for="guardian-email">Email Address:</label>
        <input type="email" id="guardian-email" name="guardian-email"><br>

        <label for="guardian-address">Address:</label>
        <textarea id="guardian-address" name="guardian-address" rows="3" required></textarea>
      </fieldset>

      <!-- Hostel Preferences -->
      <fieldset>
        <legend>Hostel Preferences</legend>
        <label for="room-type">Room Type:</label>
        <select id="room-type" name="room-type" required>
          <option value="" disabled selected>Choose...</option>
          <option value="single">Single</option>
          <option value="shared">Shared</option>
        </select>

        <label for="meal-plan">Meal Plan:</label>
        <select id="meal-plan" name="meal-plan" required>
          <option value="" disabled selected>Choose...</option>
          <option value="veg">Veg</option>
          <option value="non-veg">Non-Veg</option>
          <option value="both">Both</option>
        </select>

        <label for="special-requirements">Special Requirements:</label>
        <textarea id="special-requirements" name="special-requirements" rows="3"></textarea>
      </fieldset>

      <!-- Agreement -->
      <fieldset>
        <legend>Agreement</legend>
        <label>
          <input type="checkbox" name="agreement" required>
          I confirm that the above information is true and agree to abide by hostel rules.
        </label>
      </fieldset>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
