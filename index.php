<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background: #0a0f1c;
            color: #00ffff;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: #111827;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px #00ffff;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            text-shadow: 0 0 10px #00ffff;
        }

        input {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            outline: none;
            border-radius: 5px;
            background: #1f2937;
            color: #00ffff;
            box-shadow: 0 0 5px #00ffff;
        }

        button {
            padding: 10px 20px;
            background: #00ffff;
            border: none;
            border-radius: 5px;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 0 10px #00ffff;
            transition: 0.3s;
        }

        button:hover {
            background: #00cccc;
            box-shadow: 0 0 20px #00ffff;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>

        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
