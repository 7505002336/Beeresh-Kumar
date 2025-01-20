<header class="header">
    <a href="" style="font-size: 25px">Student Dashboard</a>
    <div class="logout">
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</header>

<style>
    button {
        margin-top: 0px;
        width: 200px;
        height: 40px;
        cursor: pointer;
        background-color: #4CAF50;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease, transform 0.2s ease;
        outline: none;
        display: inline-block;
        text-align: center;
    }

    button a {
        text-decoration: none;
        color: white;
        font-family: Arial, sans-serif;
        font-size: 1em;
        font-weight: bold;
        display: block;
    }

    button:active {
        background-color: #45a049;
        transform: scale(0.98);
    }

    /* Keyframe Animation for Left to Right movement for only the welcome text */
    @keyframes moveLeftToRight {
        0% {
            transform: translateX(100%);
        }
        50% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(100%);
        }
    }

    /* Apply the animation to the Welcome text only */
    h1.welcome-text {
        animation: moveLeftToRight 10s linear infinite;
    }

    /* Style for button container */
    .button-container {
        display: flex;
        gap: 20px;
        margin-top: 20px;
    }

    /* Profile Section */
    .profile-section {
        background-color: #f1f1f1;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .profile-section a {
        color: #4CAF50;
        font-size: 1.2em;
        font-weight: bold;
        text-decoration: none;
    }

    .profile-section a:hover {
        text-decoration: underline;
    }

    .btn-3d {
        background-color: green;
        color: white;
        padding: 60px 30px;
        font-size: 1.2em;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3), 0 6px 20px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease-in-out;
        cursor: pointer;
        margin-top: 2px;
        margin-right: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .btn-3d:hover {
        background-color:white;
        color:red;
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4), 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .btn-3d:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 4px 12px rgba(0, 0, 0, 0.1);
}

    /* Button container to center buttons */
    .button-container {
        text-align: center; /* Center buttons horizontally */
        margin-top: 40px;   /* Add margin to the top */
    }

    .button-container .btn-3d:last-child {
        margin-right: 20px;
    }
</style>

<aside>
    <ul>
        <li>
            <button>
                <a href="student_help.php">24/7 Student Help</a>
            </button>
        </li>
        <li>
            <button>
                <a href="transport_registration_form.php">TransportRegistration</a>
            </button>
        </li>
        <li>
            <button>
                <a href="notic.php">Important notice</a>
            </button>
        </li>
        <li>
            <button>
                <a href="hostel_registration.php">Hostel Registration</a>
            </button>
        </li>
        <li>
            <button>
                <a href="student_back.php">Back Registration</a>
            </button>
        </li>
    </ul>
</aside>

<div class="content">
    <!-- Profile Section added before the Welcome Message -->
    <div class="profile-section">
        <p><strong>Student Profile</strong></p>
        <p><a href="student_profile.php">View and Edit Your Profile</a></p>
    </div>

    <!-- Apply the animation only to this h1 -->
    <h1 class="welcome-text" style="font-size: 2.5em; font-weight: bold; margin: 0; letter-spacing: 1px; color: red;">
        Welcome to the Student Dashboard
    </h1>
    <br>
    <p style="font-size: 1.2em; color: #333; line-height: 1.5;">
	<p style="font-size: 1.2em; color: #333; line-height: 1.5;">
    As a student, you can access and manage your courses, track your progress, view grades,
	 and update your information—all in one here!

    </p>

    <div class="button-container">
        <!-- Image buttons with link -->
        <h1 class="btn-3d">
        Personal Profile Management: Students can manage their profile information.
</h1>
        <h1  class="btn-3d">
        Stay Organized: Encourages students to make use of the portal for better organization.
        
</h1>
        <h1   class="btn-3d">
        Course Enrollment: Ability to enroll in or view the courses they're enrolled in.
         
</h1>
		 
    </div>
</div>
