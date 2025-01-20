<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="login.css" type="text/css">
    <title>Login Page</title>
    <style>
        /* Full page background image */
        body {
            background-image: url('https://source.unsplash.com/1600x900/?city,night'); /* Example image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Center the form */
        

        h1 {
            margin-bottom: 20px;
            font-size: 2rem;
        }

         
        /* Custom button styling */
        .btn-custom {
            background-color: #007bff;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 5px;
            border: none;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-custom:focus {
            outline: none;
        }

        /* Back icon styling */
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
    <a href="Student.php" class="back-icon">
        <i class="bi bi-arrow-left-circle">Back</i> <!-- Back icon -->
    </a>

    <div class="login-container">
        <form action="login_ckeck.php" method="POST">
            <h1>Login Form</h1>
            <label>Username</label>
            <input type="text" name="username" required><br>

            <label>Password</label>
            <input type="text" name="password" required><br>

            <button type="submit" class="btn btn-custom">Login</button>
        </form>
    </div>
</body>
</html>
