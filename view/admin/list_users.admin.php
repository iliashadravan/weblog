<?php

require_once __DIR__ . '/../../controller/admin/list_users.admin.php'; // اصلاح مسیر به درستی
global $all_users_result;
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>List Users</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        body {
            background: linear-gradient(135deg, #0100EC 10%, #fB36F4 70%);
            font-family: 'Roboto', sans-serif;
            text-align: center;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        h3 {
            color: #000000;
            font-size: 2em;
            margin-top: 20px;
            animation: fadeInDown 1s ease-in-out;
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
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            color: #000000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 1s ease-in-out;
            border-radius: 10px;
            overflow: hidden;
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
        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 1em;
        }
        th {
            background-color: #333333;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #ffffff;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            display: inline-block;
            margin: 5px 0;
            font-size: 0.9em;
        }
        .actions a {
            background-color: dodgerblue;
        }
        .actions a:hover {
            background-color: royalblue;
            transform: translateX(3px);
        }
        .logout {
            background-color: #e50006;
            padding: 15px 20px;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 20px;
        }
        .logout:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
<h3>Users List</h3>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($user = $all_users_result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['firstname']) ?></td>
            <td><?= htmlspecialchars($user['lastname']) ?></td>
            <td class="actions">
                <a href="edit_user.php?id=<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>">Edit User</a>
                <a href="show.articles.php?id=<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>">Show Article</a>
                <a href="../../controller/admin/delete_user.php?id=<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete User</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<div>
    <a class="logout" href="../../controller/logout.php">Logout</a>
</div>
</body>
</html>
