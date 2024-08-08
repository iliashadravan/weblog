<?php
require_once '../../controller/user/edit.user.php';
global$user_email; global$user_lastname; global$user_firstname;
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>edit information</title>
    <style>
        body {
            background: linear-gradient(135deg, #E5F230, #54DB63);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
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

        h2 {
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #177e14;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
            color: #555;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-size: 1em;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus {
            border-color: #ede908;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
            outline: none;
        }

        button {
            background-color: #54DB63;
            color: azure;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            width: 100%;
            margin-bottom: 20px;
        }

        button:hover {
            background-color: #207332;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #207332;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #ede908;
        }

        .success-message, .error-message {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
        }

        .success-message svg, .error-message svg {
            margin-right: 10px;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Edit user information</h2>

    <?php if (!empty($success_message)): ?>
        <div class="success-message">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 12l2 2 4-4" stroke="#155724" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="12" cy="12" r="9" stroke="#155724" stroke-width="2"/>
            </svg>
            <?php echo $success_message; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($error_message)): ?>
        <div class="error-message">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L6 18M6 6l12 12" stroke="#721c24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="12" cy="12" r="9" stroke="#721c24" stroke-width="2"/>
            </svg>
            <?php echo $error_message; ?>
        </div>
    <?php endif; ?>
    <form action="edit.php" method="POST">
        <label for="firstname">Firstname:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($user_firstname, ENT_QUOTES, 'UTF-8'); ?>" required>
        <label for="lastname">lastname:</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo htmlspecialchars($user_lastname, ENT_QUOTES, 'UTF-8'); ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user_email, ENT_QUOTES, 'UTF-8'); ?>" required>
        <label for="password">password:</label>
        <input type="password" name="password" id="password" placeholder="Leave blank to keep current password">
        <button type="submit">Update</button>
        <a class="back-link" href="index.php">Back to panel</a>
    </form>
</div>
</body>
</html>
