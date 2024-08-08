
<?php
require_once '..\controller\first_page_weblog.php';
global$result;
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>All Articles</title>
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
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .article {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            margin: 20px 0;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 5px solid #3f51b5;
        }
        .article:hover {
            transform: scale(1.02);
            box-shadow: 0 12px 24px rgba(0,0,0,0.2);
            border-left: 5px solid #e50006;
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
        footer {
            text-align: center;
            padding: 20px;
            background: #3f51b5;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0,0,0,0.2);
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
    <h1>All Articles</h1>

</header>
<div class="container">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="article">
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($row['body'])); ?></p>
            <p class="author">Written by: <?php echo htmlspecialchars($row['firstname']) . ' ' . htmlspecialchars($row['lastname']); ?></p>
            <?php
            // تبدیل تاریخ و زمان میلادی به شمسی
            $timestamp = strtotime($row['time']);
            $jalali_date = jalali_date('Y/m/d H:i:s', $timestamp);
            ?>
            <p class="time">Published on: <?php echo htmlspecialchars($jalali_date); ?></p>
        </div>
    <?php endwhile; ?>
</div>
<footer>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
</footer>
</body>
</html>
