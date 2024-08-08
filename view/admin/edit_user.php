<?php
require_once __DIR__ . '/../../controller/admin/edit_user.php'; // اصلاح مسیر به درستی

global$user;
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش کاربر</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            background: linear-gradient(135deg, #FFE031 10%, #F04579 90%);
            font-family: 'Roboto', sans-serif;
            color: #ffffff;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h3 {
            font-size: 2.5em;
            margin-top: 20px;
            animation: fadeInDown 1s ease-in-out;
            margin-right: 40px;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            display: inline-block;
            text-align: left;
            margin-top: 20px;
            width: 90%;
            max-width: 400px;
            animation: fadeInUp 1s ease-in-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #333333;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }

        button {
            color: #ffffff;
            background-color: #333333;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s, transform 0.3s;
            display: block;
            margin: 20px auto 0;
        }

        button:hover {
            background-color: #555555;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
<h3>Edit user</h3>
<form action="../../controller/admin/edit_user.php?id=<?= $user['id'] ?>" method="post">
    <label for="email">email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>" required>

    <label for="password">password:</label>
    <input type="password" id="password" name="password" placeholder="Leave blank to keep current password">

    <label for="firstname">firstname:</label>
    <input type="text" id="firstname" name="firstname" value="<?= htmlspecialchars($user['firstname'], ENT_QUOTES, 'UTF-8') ?>" required>

    <label for="lastname">lastname:</label>
    <input type="text" id="lastname" name="lastname" value="<?= htmlspecialchars($user['lastname'], ENT_QUOTES, 'UTF-8') ?>" required>

    <button type="submit">edit</button>
</form>
</body>
</html>

