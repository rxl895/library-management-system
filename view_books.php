<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'config/db_config.php';

$result = $conn->query("SELECT * FROM books ORDER BY added_on DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library - View Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f8f9fa;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #e8f0fe;
        }
        .empty {
            text-align: center;
            margin-top: 50px;
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>
    <h2>📚 Library Books</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <tr>
                <th>📖 Title</th>
                <th>✍️ Author</th>
                <th>🎯 Genre</th>
                <th>🕓 Added On</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['title']) ?></td>
                    <td><?= htmlspecialchars($row['author']) ?></td>
                    <td><?= htmlspecialchars($row['genre']) ?></td>
                    <td><?= htmlspecialchars($row['added_on']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p class="empty">No books added yet.</p>
    <?php endif; ?>
</body>
</html>
