<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'config/db_config.php';

$msg = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $issue_id = $_POST['issue_id'];

    $stmt = $conn->prepare("UPDATE issued_books SET returned = 1, return_date = CURDATE() WHERE id = ?");
    $stmt->bind_param("i", $issue_id);

    if ($stmt->execute()) {
        $msg = "✅ Book returned successfully!";
    } else {
        $msg = "❌ Error: " . $conn->error;
    }

    $stmt->close();
}

// Fetch unreturned books
$issued = $conn->query("
    SELECT issued_books.id, books.title, issued_books.student_name 
    FROM issued_books 
    JOIN books ON issued_books.book_id = books.id 
    WHERE issued_books.returned = 0
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Return Book</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        form { max-width: 500px; margin: auto; }
        label, select, input { display: block; width: 100%; margin-bottom: 10px; padding: 8px; }
        input[type=submit] { background: #28a745; color: white; border: none; cursor: pointer; }
        .msg { margin-top: 20px; text-align: center; color: green; }
    </style>
</head>
<body>
    <h2>📘 Return a Book</h2>
    <form method="POST" action="">
        <label>Select Issued Book:</label>
        <select name="issue_id" required>
            <option value="">-- Choose a Book --</option>
            <?php while ($row = $issued->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>">
                    <?= htmlspecialchars($row['title']) ?> (issued to <?= htmlspecialchars($row['student_name']) ?>)
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" value="Return Book">
    </form>

    <?php if ($msg): ?>
        <div class="msg"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
</body>
</html>
