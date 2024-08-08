<?php
require_once '../controller/index.php';
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
    <style>
        body {
            background-color: #e0f7fa; /* رنگ پس‌زمینه ملایم آبی */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1 {
            color: #267caa; /* رنگ عنوان سبز تیره */
            margin: 20px 0;
            font-size: 2.5em;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .article-container {
            width: 80%;
            margin: 20px auto;
            background-color: #ffffff; /* رنگ پس‌زمینه مقاله‌ها سفید */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            position: relative;
            top: 0;
            max-height: 70vh; /* حداکثر ارتفاع برای شناوری */
            overflow-y: auto; /* فعال کردن پیمایش عمودی */
        }

        .article {
            margin-bottom: 20px;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
            border-radius: 8px;
            background: #e0f7fa; /* رنگ پس‌زمینه مقاله‌ها زرد ملایم */
            transition: background 0.3s, box-shadow 0.3s;
        }

        .article:last-child {
            border-bottom: none;
        }

        .article:hover {
            background: #bddef1; /* رنگ پس‌زمینه مقاله‌ها در حالت هاور */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .article h2 {
            font-size: 1.6em;
            color: #267caa; /* رنگ عنوان مقاله سبز تیره */
            margin-bottom: 10px;
        }

        .article p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #555;
            margin-bottom: 15px;
        }

        .article a {
            margin-right: 10px;
            color: #0288d1; /* رنگ لینک آبی */
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .article a:hover {
            color: #d32f2f; /* رنگ لینک در حالت هاور قرمز */
        }

        .button-container {
            margin: auto;
            padding: 10px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .button-container a {
            display: inline-block;
            padding: 12px 20px;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s;
        }

        .new-article {
            background-color: #0288d1; /* رنگ دکمه آبی */
        }

        .new-article:hover {
            background-color: #03578a;
            transform: translateY(-2px);
        }

        .edit-user {
            background-color: #0288d1; /* رنگ دکمه آبی */
        }

        .edit-user:hover {
            background-color: #035788;
            transform: translateY(-2px);
        }

        .logout {
            background-color: #d32f2f; /* رنگ دکمه قرمز */
        }

        .logout:hover {
            background-color: #971212;
            transform: translateY(-2px);
        }

        footer {
            background-color: #e0f7fa; /* رنگ پس‌زمینه فوتر مطابق با رنگ پس‌زمینه اصلی */
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
    </style>
</head>
<body>

<h1>User Panel</h1>

    <div class="article-container">
        <?php
        if (isset($result_blog)) {
            while ($row = $result_blog->fetch_assoc()) {
                ?>
                <div class="article">
                    <h2><?php echo 'Title: ' . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p><?php echo 'Body: ' . nl2br(htmlspecialchars($row['body'], ENT_QUOTES, 'UTF-8')); ?></p>
                    <a href="edit.article.in.index.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="controllere_article.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this article?');">Delete</a>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <footer>
        <div class="button-container">
            <a class="new-article" href="article.php">Add a new article</a>
            <a class="logout" href="controllert.php">Logout</a>
            <a class="edit-user" href="edit.php">Edit user information</a>
        </div>
    </footer>

</body>
</html>
