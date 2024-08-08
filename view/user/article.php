<?php
require_once '../../controller/user/save_article.php';
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>send article</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            background: linear-gradient(135deg, #00FFED 10%, #9D00C6 100%);
            font-family: 'Roboto', sans-serif;
            text-align: center;
            color: #000000;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #333333;
            font-size: 2.5em;
            margin-bottom: 20px;
            margin-right: 50px;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: left;
            max-width: 600px;
            width: 100%;
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

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 1.1em;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }

        .error {
            color: #ff0000;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        button {
            color: #ffffff;
            background-color: #333333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
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
<form action="../../controller/user/save_article.php" method="post">
    <h1>Article</h1>
    <label for="title">title:</label>
    <input type="text" id="title" name="title">
    <?php if(has_error('title')) { ?>
        <div class="error"><?php echo get_error('title'); ?></div>
    <?php } ?>

    <label for="body">body:</label>
    <textarea id="body" name="body" rows="10" cols="60" required></textarea>
    <?php if(has_error('body')) { ?>
        <div class="error"><?php echo get_error('body'); ?></div>
    <?php } ?>

    <button type="submit">send</button>
</form>
</body>
</html>


