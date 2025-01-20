<?php
error_reporting(0);
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
session_destroy();

if ($message) {
    echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Message</title>
    <style>
        body {
            background-color:transparent;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .message-box {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .message-box button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class='overlay'>
        <div class='message-box'>
            <p>$message</p>
            <button onclick='closeMessage()'>OK</button>
        </div>
    </div>
    <script type='text/javascript'>
        function closeMessage() {
            document.querySelector('.overlay').style.display = 'none';
        }
    </script>
</body>
</html>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="Student.css" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        *{
             
    padding: 0;
    margin: 0;
}
nav{
    background-color: #333;
    position:absolute;
    height: 70px;
    width: 100%;
}
.logo{
    font-size: 25px;
    position: relative;
    left: 5%;
    color: red;
    font-weight: bold;
    line-height: 75px;
}

ul{
    position: relative;
    float:right;
     
    margin-right:20px ;
}
ul li{
    display: inline-block;
    line-height: 70px;
    margin: 0 10px;
}
ul li a{
    text-decoration: none;
    color: red;
    text-size-adjust: bold;
}
 .main_img{
    width: 100%;
    height: 300px;
    margin-top: -20px;
 }
 .section1{
    padding-top: 70px;
 }
.welcome_img{
    width: 50px;
    height:200pxpx;
}
.container{
    padding-top: 70px;
}
form{
    border-top: #00a030;
    background-image: linear-gradient(rgb(255, 0, 0),rgb(229, 255, 0));
    color: rgb(0, 0, 0);
    padding: 40px;
    border-radius: 10px;
    width: 330px;
    height: 440px;
    border: 2px solid rgb(255, 255, 255);
}
header{
    font-size:20px;
    background-image: linear-gradient(rgb(247, 87, 87),rgb(73, 89, 228));
}
input[type=text]{
    color: rgb(0, 0, 0);
    margin: 10px 0px;
    border-radius: 2px;
}
 

        /* Basic Reset for Navigation */
        nav {
            background-color: #333;
            padding: 0px;
            margin-top:-20px;
            margin-right:10px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-start;
        }

        nav ul li {
            position: relative;
            margin: 0 0px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 0px 20px;
            display: block;
        }

        /* Dropdown menu styling */
        .dropdown {
            display: none;
            position: absolute;
            top: 110%;
            left: 0;
            background-color: #333;
            min-width: 180px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        /* Add arrow to dropdown using ::before */
        .dropdown::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 20px;
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 10px solid white;
        }

        /* Show the dropdown when hovering */
        nav ul li:hover .dropdown {
            display: block;
            background-color:white;
            color:#333;
        }

        .dropdown a {

            color: #333;
            text-decoration: none;
            font-size: 14px;
            display: block;
        }

        /* Styling for the nav links */
        .home > a, .contact > a, .admission > a {
            background-color: #333;
            color: white;
        }

        .home > a:hover,
        .contact > a:hover,
        .admission > a:hover {
            background-color: #444;
        }

        /* Style for the main section */
        .section1 {
            text-align: center;
            margin-top: 20px;
        }

        /* Styling for the teachers and courses sections */
        .section-title {
            color: red;
            text-align: center;
            margin-top: 30px;
        }

        .teacher-card, .course-card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .teacher-card img, .course-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .teacher-card p, .course-card p {
            font-size: 16px;
            margin-top: 10px;
        }

        /* Styling for the Admission Form */
        .admission_form {
            margin-top: 40px;
            padding: 80px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            max-width: 500px;
            margin: 0 auto;
        }

        .admission_form input, .admission_form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .admission_form button:hover {
            background-color: #45a049;
        }
        nav ul li a:hover {
    background-color: #444;
    border-radius: 5px;
}

nav .btn-outline-success {
    color: white;
    border: 2px solid #4CAF50;
    padding: 5px 30px;
    margin-right:-20px;
    background-color:#007BFF;
}

nav .btn-outline-success:hover {
    background-color: #333;
    color: white;
}
.welcome-message {
    padding: 10px;
    color: #333;
    font-family: Arial, sans-serif;
    font-size: 14px;
    line-height: 1.5;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    max-width: 400px;
    margin: 0 auto;
  }
    </style>
</head>
<body>
    <nav>
        <label class="logo"><p style="color:red">MANGALAYATAN UNIVERSITY</p></label>
        <ul>
            <!-- "Home" with dropdown menu -->
            <li class="home">
                <a href="#">Home</a>
                <div class="dropdown">
                <div class="welcome-message">
               <strong> Welcome to Mangalayatan University! Your journey towards excellence begins here. Explore, learn, and grow with us.</strong>
</div>
                </div>
            </li>
            <!-- "Contact" with dropdown menu -->
            <li class="contact">
                <a href="#">Contact</a>
                <div class="dropdown">
                <div class="welcome-message">
       <strong> For any inquiries, reach out to us via our official email or phone number.<bold style="background-color:yellow";>
        mangalayatan@edu.in | +123 456 7890
       </bold></strong>
       
</div>
                </div>
            </li>
            <!-- "Admission" with dropdown menu -->
            <li class="admission">
                <a href="#">Admission</a>
                <div class="dropdown">
                <div class="welcome-message">
               <strong> Explore the admission process and apply today to start your journey at Mangalayatan University.</strong>
</div>
                </div>
            </li>
            <li style="margin-right: 24px;">
                <a href="login.php" class="btn btn-outline-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <img class="main_img" src="university.jpg" alt="University Image">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="R.jpeg" width="100%" height="227px" alt="University Image">
            </div>
            <div class="col-md-8">
                <h1>Welcome to <p style="color:red">MANGALAYATAN UNIVERSITY</p></h1>
                <p>As you begin your academic journey here, embrace the opportunities to learn, grow, and connect with peers and mentors. This is your time to shine and achieve your goals.</p>
            </div>
        </div>
    </div>
    <center>
        <h1 class="section-title">Our Teachers</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="teacher-card">
                    <img src="teacher1.jpg" width="100%" height="200px" alt="Teacher 1">
                    <p>Artificial Intelligence (AI) is transforming education by offering personalized learning experiences and enhancing the teaching process.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="teacher-card">
                    <img src="teacher2.jpg" width="100%" height="200px" alt="Teacher 2">
                    <p>Our faculty members guide students through their academic journey, making complex concepts easier and fostering innovation.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="teacher-card">
                    <img src="teacher3.webp" width="100%" height="200px" alt="Teacher 3">
                    <p>Teachers inspire students by fostering curiosity, providing knowledge, and guiding them toward success in their chosen fields and grow to countinue.</p>
                </div>
            </div>
        </div>
    </div>
    <center>
        <h1 class="section-title">Our Courses</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="course-card">
                    <img src="web_developer.webp" width="100%" height="200px" alt="Web Development">
                    <p><strong>Web Development</strong><br>Build real-world projects, enhance skills, and gain expertise in web technologies.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="course-card">
                    <img src="pharmecy.jpg" width="100%" height="200px" alt="Pharmacy">
                    <p><strong>Pharmaceutical Sciences</strong><br>Gain practical knowledge in medication management, clinical pharmacy, and health.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="course-card">
                    <img src="Business_Management.jpg" width="100%" height="200px" alt="Business Management">
                    <p><strong>Business Management</strong><br>Master key business management areas such as leadership, strategy, and marketing.</p>
                </div>
            </div>
        </div>
    </div>
    <center><h1 class="section-title">Admission Form</h1></center>
    <div align="center" class="admission_form">
        <form action="admission_data.php" method="POST">
            <header>MANGALAYATAN UNIVERSITY</header><br>
            <input type="text" name="name" placeholder="Full Name" required><br>
            <input type="text" name="phone" placeholder="Phone" required><br>
            <input type="email" name="email" placeholder="Email Address" required><br>
            <label for="message">Message</label>
            <textarea name="message" placeholder="Your Message" required></textarea><br><br>
            <button class="btn btn-primary" name="apply">Apply Now</button>
            <br>
        </form>
    </div>
    <br>
    <center>
        <h1 style="color:red">Contact Us</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>If you have any questions about the application process, course details, or anything else, feel free to reach out to us. We’re here to assist you!</p>
                <p><strong>Email:</strong> admissions@mangalayatan.edu</p>
                <p><strong>Phone:</strong> +123 456 7890</p>
            </div>
        </div>
    </div>

</body>
</html>
