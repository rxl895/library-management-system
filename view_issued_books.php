<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'config/db_config.php';

$result = $conn->query("
    SELECT ib.id, b.title, ib.student_name, ib.issue_date, ib.return_date, ib.returned
    FROM issued_books ib
    JOIN books b ON ib.book_id = b.id
    ORDER BY ib.issue_date DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issued Books Log</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 90%; margin: auto; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #007bff; color: white; }
        .returned { color: green; font-weight: bold; }
        .issued { color: orange; font-weight: bold; }
        h2 { text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>
    <h2>📋 Issued Books Log</h2>
    <table>
        <tr>
            <th>#</th>
            <th>📘 Title</th>
            <th>👩‍🎓 Student</th>
            <th>📅 Issue Date</th>
            <th>📆 Return Date</th>
            <th>📌 Status</th>
        </tr>
        <?php if ($result->num_rows > 0): 
            $i = 1;
            while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['student_name']) ?></td>
                <td><?= $row['issue_date'] ?></td>
                <td><?= $row['return_date'] ?? '—' ?></td>
                <td class="<?= $row['returned'] ? 'returned' : 'issued' ?>">
                    <?= $row['returned'] ? 'Returned' : 'Issued' ?>
                </td>
            </tr>
        <?php endwhile; else: ?>
            <tr><td colspan="6">No issued books found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>

