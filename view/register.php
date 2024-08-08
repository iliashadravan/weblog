
<?php
require_once '..\controller\register.php';
global$show_errors;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            background: linear-gradient(135deg, #dda0dd 30%, #8b0000 100%);
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
            color: #ffffff;
            font-size: 2.5em;
            margin-bottom: 30px; /* Increased margin-bottom */
            margin-right: 50px;
        }

        form {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px; /* Increased padding */
            border-radius: 15px; /* Slightly more rounded corners */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* More pronounced shadow */
            color: #333333;
            width: 100%;
            max-width: 400px; /* Added max-width */
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
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px; /* Slightly increased padding */
            margin-bottom: 15px; /* Increased margin-bottom */
            border: 1px solid #ccc;
            border-radius: 6px; /* Slightly more rounded corners */
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #8b0000;
            box-shadow: 0 0 8px rgba(139, 0, 0, 0.2); /* Added box-shadow on focus */
            outline: none;
        }

        .error {
            color: #ff0000;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        button {
            color: #ffffff;
            background-color: #8b0000;
            padding: 12px 20px; /* Slightly increased padding */
            border: none;
            border-radius: 6px; /* Slightly more rounded corners */
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s; /* Added box-shadow transition */
            display: block;
            margin: 20px auto 0; /* Added margin-top */
            width: 100%;
        }

        button:hover {
            background-color: #660000;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Added box-shadow on hover */
        }

        .form-footer {
            margin-top: 20px;
        }

        .form-footer a {
            color: #8b0000;
            text-decoration: none;
            font-weight: bold;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<h2>Register Page</h2>
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars(request('firstName')); ?>">
    <?php if ($show_errors && has_error('firstName')) { ?>
        <div class="error"><?php echo get_error('firstName'); ?></div>
    <?php } ?>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars(request('lastName')); ?>">
    <?php if ($show_errors && has_error('lastName')) { ?>
        <div class="error"><?php echo get_error('lastName'); ?></div>
    <?php } ?>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars(request('email')); ?>">
    <?php if ($show_errors && has_error('email')) { ?>
        <div class="error"><?php echo get_error('email'); ?></div>
    <?php } ?>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <?php if ($show_errors && has_error('password')) { ?>
        <div class="error"><?php echo get_error('password'); ?></div>
    <?php } ?>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password">
    <?php if ($show_errors && has_error('confirm_password')) { ?>
        <div class="error"><?php echo get_error('confirm_password'); ?></div>
    <?php } ?>

    <button type="submit">Register</button>
    <div class="form-footer">
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</form>
</body>
</html>
