<?php
session_start();

// Dummy data
$users = [
    ['username' => 'hamdan', 'password' => '1234'],
    ['username' => 'haikal', 'password' => 'abcd']
];

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputUser = $_POST['username'];
    $inputPass = $_POST['password'];

    foreach ($users as $user) {
        if ($inputUser === $user['username'] && $inputPass === $user['password']) {
            $_SESSION['username'] = $inputUser;
            header('Location: index.php');
            exit;
        }
    }

    $error = 'Username atau password salah.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Thriftopia</title>
    <style>
        body {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        .login-container img {
            width: 120px;
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border-radius: 30px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 14px;
        }

        .login-container .remember-me {
            text-align: left;
            font-size: 0.85em;
            margin-top: 10px;
        }

        .login-container .forgot {
            text-align: right;
            font-size: 0.85em;
            margin-top: -18px;
            margin-bottom: 20px;
        }

        .login-container .forgot a {
            color: #1e90ff;
            text-decoration: none;
        }

        .login-container .forgot a:hover {
            text-decoration: underline;
        }

        .login-container button {
            background-color: #1e90ff;
            border: none;
            color: white;
            padding: 12px 0;
            width: 100%;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .login-container button:hover {
            background-color: #0b75d1;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="foto/user-icon.png" alt="User Icon"> <!-- ganti sesuai ikonmu -->
        <h2>Login</h2>

        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember" checked>
                <label for="remember"> Remember me</label>
            </div>
            
            <div class="forgot">
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>
