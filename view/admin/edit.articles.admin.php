<?php
global $blog;
require_once '../../controller/admin/edit.articles.admin.php';
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>Edit Article</title>
    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h3 {
            margin-top: 20px;
            font-size: 2.2em;
            color: #0277bd;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            margin-right: 35px;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
            margin-top: 20px;
            transform: translateY(0);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        form:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        label {
            font-size: 1.1em;
            color: #0277bd;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 24px);
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #b3e5fc;
            box-sizing: border-box;
            font-size: 1em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #81d4fa;
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        button {
            background-color: #0277bd;
            color: #ffffff;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s, transform 0.3s;
            display: block;
            margin: 20px auto 0;
        }

        button:hover {
            background-color: #01579b;
            transform: scale(1.05);
        }

        a {
            display: block;
            margin-top: 20px;
            color: #01579b;
            text-decoration: none;
            font-size: 1em;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0277bd;
        }
    </style>
</head>
<body>
<h3>Edit Article</h3>
<form action="edit.articles.admin.php?id=<?= htmlspecialchars($blog['id']) ?>" method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?= htmlspecialchars($blog['title']) ?>" required>

    <label for="body">Body:</label>
    <textarea id="body" name="body" required><?= htmlspecialchars($blog['body']) ?></textarea>

    <button type="submit">Edit</button>
    <a href="../admin/list_users.admin.php">Back to Panel</a>
</form>
</body>
</html>
