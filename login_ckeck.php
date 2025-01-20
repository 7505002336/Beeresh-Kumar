<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "studentproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($data, $_POST['username']);
    $pass = mysqli_real_escape_string($data, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$name' AND password='$pass'";
    $result = mysqli_query($data, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row["usertype"] == "student") {
          $_SESSION['username']=$name;
          $_SESSION['usertype']="student";
          header("Location: studenthome.php");
        } 
        elseif ($row["usertype"] == "admin") {
            $_SESSION['username']=$name;
            $_SESSION['usertype']="admin";
            header("Location: adminhome.php");
        } else {
            session_start();
            $_SESSION['loginMessage'] = "Username or password not match";
            header("Location: login.php");
        }
    } else {
        session_start();
        $_SESSION['loginMessage'] = "Username or password not match";
        header("Location: login.php");
    }
}
?>
