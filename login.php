<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['pss'];

    if (!isset($_SESSION["user"])) {

        $message = "Please, signup first!";

    } else {

        if ($username == $_SESSION['user'] &&
            $password == $_SESSION['password']) {

            $_SESSION['userdashboard'] = $username;

            header("Location: dashboard.php");
            exit();

        } else {

            $message = "Incorrect Username and Password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #eaf7f8;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 100vh;
        }

        form {
            width: 350px;
            background: white;

            padding: 30px;

            border-radius: 10px;

            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            color: #277c8e;
            margin-bottom: 25px;
        }

        input {
            width: 100%;

            padding: 12px;

            margin-bottom: 15px;

            border: 1px solid #ccc;
            border-radius: 5px;

            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #277c8e;
        }

        button {
            width: 100%;

            padding: 12px;

            background: #277c8e;
            color: white;

            border: none;
            border-radius: 5px;

            font-size: 16px;

            cursor: pointer;
        }

        button:hover {
            background: #1f6574;
        }

        h3 {
            text-align: center;
            color: red;
            font-size: 14px;
            margin-top: 15px;
        }

        a {
            display: block;

            text-align: center;

            margin-top: 15px;

            color: #277c8e;

            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

    <form method="POST">

        <h2>Login Form</h2>

        <input
            type="text"
            name="username"
            placeholder="Username"
            required
        >

        <input
            type="password"
            name="pss"
            placeholder="Password"
            required
        >

        <button type="submit">Login</button>

        <h3><?php echo $message; ?></h3>

        <a href="signup.php">Don't have an account? Signup</a>

    </form>

</body>

</html>