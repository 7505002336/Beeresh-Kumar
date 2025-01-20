<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

// Establish database connection
$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch data from the table
$sql = "SELECT id, registration, owner, vehicle_name, route, vehicle_code FROM transport";
$result = $data->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport Registration Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Transport Registration Details</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Registration</th>
                <th>Owner</th>
                <th>Vehicle Name</th>
                <th>Route</th>
                <th>Vehicle Code</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Loop through each row of the result set and display in the table
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['registration']}</td>
                            <td>{$row['owner']}</td>
                            <td>{$row['vehicle_name']}</td>
                            <td>{$row['route']}</td>
                            <td>{$row['vehicle_code']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Close the database connection
$data->close();
?>
