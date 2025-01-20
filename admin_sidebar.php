<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<style>
	button {
		margin-top:0px;
		width: 200px; /* Fixed width for uniform button size */
            height: 40px; /* Fixed height for uniform button size */
            cursor: pointer;
            background-color: #4CAF50; /* Default background color */
            border: none;
            border-radius: 5px;
            padding: 10px 20px; /* Adjust padding for button size */
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.2s ease;
            outline: none;
            display: inline-block; /* Ensures the button fits the content */
            text-align: center;
        }
        button a {
            text-decoration: none;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 1em; /* Adjust font size as needed */
            font-weight: bold;
            display: block; /* Ensures link fills the button */
        }
        button:active {
            background-color: #45a049; /* Darker green on click */
            transform: scale(0.98); /* Slightly shrink on click */
        }
    </style>
<header class="header">
		
		<a href=""style="font-size:25px">Admin Dashboard</a>

		<div class="logout">
			
			<a href="logout.php" class="btn btn-primary">Logout</a>

		</div>

	</header>


	<aside>
		
		<ul>
			
			<li>
				<button>
				<a href="admission.php">Admission</a>
</button>
			</li>

			<li>
			<button>
				<a href="add_student.php">Add Student</a>
</button>
			</li>

			<li>
			<button>
				<a href="view_student.php">View Student</a>
</button>
			</li>

			<li>
			<button>
				<a href="admin_add_teacher.php">Add Teacher</a>
</button>
			</li>

			<li>
			<button>
				<a href="admin_view_teacher.php">View Teacher</a>
</button>
			</li>
			<li>
			<button>
				<a href="admin_add_course.php">Add Courses</a>
</button>
			</li>
			<li>
			<button>
				<a href="admin_course_view.php">View Courses</a>
</button>
			</li>


		</ul>


	</aside>
    </body>
</html>