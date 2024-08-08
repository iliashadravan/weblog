<?php
require_once __DIR__ . '/../../controller/admin/show.articles.php'; // اصلاح مسیر به درستی

?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            color: #333;
        }

        h1 {
            margin: 20px 0;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            color: #007BFF;
        }

        .article-container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            max-height: 70vh;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .article {
            margin-bottom: 30px;
            text-align: left;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
            background: #f9f9f9;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .article:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .article h2 {
            font-size: 1.7em;
            color: #444;
            margin-bottom: 10px;
        }

        .article p {
            font-size: 1.2em;
            line-height: 1.6;
            color: #666;
            margin-bottom: 15px;
        }

        .article a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .article a:hover {
            color: #d12025;
        }
    </style>
</head>
<body>

<h1>User panel</h1>
<div class="article-container">
    <?php
    if (isset($result_blog)) {
        while ($row = $result_blog->fetch_assoc()) {
            ?>
            <div class="article">
                <h2><?php echo 'title: ' . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <p><?php echo 'body: ' . nl2br(htmlspecialchars($row['body'], ENT_QUOTES, 'UTF-8')); ?></p>
                <a href="edit.articles.admin.php?id=<?php echo $row['id']; ?>">edit</a>
                <a href="../../controller/admin/delete.articles.admin.php?id=<?php echo $row['id']; ?>">delete</a>
            </div>
            <?php
        }
    }
    ?>
</div>
</body>
</html>
