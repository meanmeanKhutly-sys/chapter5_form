<?php
session_start();

$usershow = $_SESSION['userdashboard'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <style>

        body {
            font-family: Arial;
            margin: 0;
            background: #eaf7f8;
        }

        .header {
            background: #277c8e;
            color: white;
            padding: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .menu {
            background: white;
            padding: 15px;
            text-align: center;
        }

        .menu a {
            display: inline-block;
            background: #5b8def;
            color: white;
            padding: 12px 20px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
        }

        .menu a:hover {
            background: #416fc9;
        }

        .logout {
            background: #e74c3c !important;
        }

        .content {
            margin: 20px;
            background: white;
            padding: 10px;
            border-radius: 10px;
        }

        iframe {
            width: 100%;
            height: 700px;
            border: none;
        }

    </style>

</head>

<body>

    <div class="header">

        <h2>
            Welcome <?php echo $usershow; ?> Dashboard
        </h2>

    </div>

    <div class="menu">

        <a href="homework_bacII/index.php" target="project">
            Home
        </a>

        <a href="homework_bacII/science.php" target="project">
            Science
        </a>

        <a href="homework_bacII/social.php" target="project">
            Social Science
        </a>

        <a href="logout.php" class="logout">
            Logout
        </a>

    </div>

    <div class="content">

        <iframe
            name="project"
            src="homework_bacII/index.php">
        </iframe>

    </div>

</body>

</html>