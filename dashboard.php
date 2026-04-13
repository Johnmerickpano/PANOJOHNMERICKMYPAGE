<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background: #0a0f1c;
            color: #00ffff;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 100px;
        }

        .box {
            display: inline-block;
            padding: 40px;
            background: #111827;
            border-radius: 10px;
            box-shadow: 0 0 20px #00ffff;
        }

        h2 {
            text-shadow: 0 0 10px #00ffff;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: #000;
            background: #00ffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 0 10px #00ffff;
            transition: 0.3s;
        }

        a:hover {
            background: #00cccc;
            box-shadow: 0 0 20px #00ffff;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>