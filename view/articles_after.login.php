<?php
require_once '../controller/articles_after.login.php';

global$email, $result;
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>User Articles</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        header {
            background: #3f51b5;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .article {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 5px solid #3f51b5;
        }

        .article:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            border-left: 5px solid #5ba2ec;
        }

        .article h2 {
            margin-top: 0;
            color: #333;
            font-size: 1.8em;
        }

        .article p {
            line-height: 1.8;
        }

        .article .author {
            font-style: italic;
            color: #666;
            margin-top: 10px;
        }

        .article .time {
            font-size: 0.9em;
            color: #888;
            margin-top: 5px;
        }

        .actions {
            margin-top: 20px;
        }

        .actions a {
            text-decoration: none;
            color: #fff;
            background-color: #3f51b5;
            padding: 10px 15px;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .actions a:hover {
            background-color: #e50006;
        }

        footer {
            text-align: center;
            padding: 10px;
            background: #3f51b5;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
        }

        footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <h1>User Articles</h1>

</header>
<div class="container">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="article">
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($row['body'])); ?></p>
            <p class="author">Written
                by: <?php echo htmlspecialchars($row['firstname']),'           '   ,  htmlspecialchars($row['lastname']); ?></p>
            <p class="time">Published on:
                <?php
                $timestamp = strtotime($row['time']);
                list($year, $month, $day) = explode('-', date('Y-m-d', $timestamp));
                list($hour, $minute, $second) = explode(':', date('H:i:s', $timestamp));

                if ($year != 0000){
                    $jalali_date = gregorian_to_jalali($year, $month, $day);
                    echo htmlspecialchars("{$jalali_date[0]}/{$jalali_date[1]}/{$jalali_date[2]}  $hour:$minute:$second");
                }

                ?>
            </p>
            <div class="actions">
                <?php if ($row['user_email'] === $email): ?>
                    <a href="user/edit.article.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="../controller/user/delete_article.php?id=<?php echo $row['id']; ?>"
                       onclick="return confirm('Are you sure you want to delete this article?');">Delete</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<footer>
    <a href="user/index.php">go to panel</a>
</footer>

</body>
</html>

