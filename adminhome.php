<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <?php include("admin_css.php"); ?>
    
    <style>
        body{
            background: green;
        }
         

        /* Fading Effect */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .content {
            background:#f2f2ff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 900px;
            text-align: center;
            transition: transform 0.3s ease-out;
        }
        h1 {
            font-size: 2.8em;
            color: #4CAF50;
            margin-bottom: 15px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h2 {
            font-size: 1.8em;
            color: #555;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            color: #333;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* 3D Button Style */
        .btn-3d {
            display: flex;
            display: inline-block;
            justify-content: center;
            text-align: center;
            background-color:red;
            color: white;
            padding: 0px 0px;
            font-size: 1.2em;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3), 0 6px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            margin: 10px;
            margin-bottom: 20px;
            
           
        }

        .btn-3d:hover {
            transform: translateY(-5px) scale(1.0);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4), 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .btn-3d:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Button Size */
        @media (max-width: 768px) {
            .btn-3d {
                padding: 15px 20px;
                font-size: 1.1em;
            }

            .content {
                padding: 20px;
            }

            h1 {
                font-size: 2.2em;
            }

            h2 {
                font-size: 1.5em;
            }

            p {
                font-size: 1.1em;
            }
        }
    </style>
</head>
<body>

    <?php include("admin_sidebar.php"); ?>

    <div class="content">
        <!-- Main Welcome Heading -->
        <h1>Welcome to the Admin Dashboard</h1>
        
        <!-- Subheading -->
        <h2>Manage Courses, Students, and More!</h2>
        
        <!-- Brief Description -->
        <p>
            As an admin, you can manage all aspects of the system. From adding courses and updating student data to tracking progress, everything is at your fingertips!
        </p>
        
        <!-- 3D Buttons Container -->
        <div class="button-container">
            <button class="btn-3d" onclick="window.location.href='admin_back_registered_students.php';" aria-label="Applied Students">Back Registered Student</button>
            <button class="btn-3d" onclick="window.location.href='admin_transport_registered_student.php';" aria-label="View Students">Bus Registered Student</button>
            <button class="btn-3d" onclick="window.location.href='hostel_student.php';" aria-label="View Teachers">Hostel Registered Student</button>
        </div>
    </div>
</body>
</html>
