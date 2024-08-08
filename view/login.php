<?php
require_once '../controller/login.php'
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            font-family: 'Roboto', sans-serif;
            text-align: center;
            color: #ffffff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            color: rgba(145, 21, 216, 0.56);
            font-size: 3em;
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            color: #333333;
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1s ease-in-out;
            text-align: left;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 5px; /* کاهش margin-bottom */
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #9b59b6;
            box-shadow: 0 0 8px rgba(139, 0, 0, 0.2);
            outline: none;
        }

        .error {
            color: #e74c3c;
            font-size: 0.9em;
            margin-bottom: 15px; /* افزایش margin-bottom */
        }

        .message {
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            width: 100%;
        }

        .success {
            background: #2ecc71;
            color: #fff;
        }

        button {
            color: #ffffff;
            background-color: #9b59b6;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #8e44ad;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .form-footer {
            margin-top: 20px;
        }

        .form-footer a {
            color: #9b59b6;
            text-decoration: none;
            font-weight: bold;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<form action="login.php" method="POST">
    <h2>Login</h2>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
    <?php if (!empty($errors['email'])): ?>
        <div class="error"><?php echo $errors['email']; ?></div>
    <?php endif; ?>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <?php if (!empty($errors['password'])): ?>
        <div class="error"><?php echo $errors['password']; ?></div>
    <?php endif; ?>
    <button type="submit">Login</button>
    <?php if (!empty($errors['general'])): ?>
        <div class="message error">
            <?php echo $errors['general']; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="message success">
            <?php foreach ($success as $message): ?>
                <p><?php echo $message; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="form-footer">
        <p>If you don't have an account, <a href="register.php">register here</a>.</p>
        <p>If you want go to first page, <a href="first_page_weblog.php">Home</a>.</p>
    </div>
</form>
</body>
</html>
