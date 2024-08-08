<?php
require_once '../controller/edit.article.php';
global$blog;
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش وبلاگ</title>
    <style>
        body {
            background-color: #2c3e50;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #ecf0f1;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h3 {
            margin-top: 30px;
            font-size: 2.5em;
            color: #ecf0f1;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        form {
            display: inline-block;
            background-color: #34495e;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            margin-top: 30px;
            text-align: left;
            width: 90%;
            max-width: 500px;
        }

        label {
            font-size: 1.2em;
            color: #ecf0f1;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 16px);
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #95a5a6;
            box-sizing: border-box;
            font-size: 1em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        textarea {
            resize: vertical; /* اجازه تغییر ارتفاع */
            min-height: 150px; /* ارتفاع پیش‌فرض */
        }

        button {
            background-color: #1abc9c;
            color: #fff;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s, transform 0.3s;
            display: block;
            margin: 20px auto 0;
        }

        button:hover {
            background-color: #16a085;
            transform: scale(1.05);
        }

        a {
            display: block;
            margin-top: 20px;
            color: #1abc9c;
            text-decoration: none;
            font-size: 1em;
            transition: color 0.3s;
        }

        a:hover {
            color: #16a085;
        }
    </style>
</head>
<body>
<h3>Edit Article</h3>
<form action="" method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($blog['title']) ?>" required><br>

    <label for="body">Body:</label>
    <textarea id="body" name="body" required><?= htmlspecialchars($blog['body']) ?></textarea><br>

<button type="submit">Edit</button>
<a href="articles_after.login.php">Back to panel</a>
</form>
</body>
</html>
