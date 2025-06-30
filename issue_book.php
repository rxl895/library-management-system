<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'config/db_config.php';

$msg = "";

// Handle book issue form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $student_name = trim($_POST['student_name']);
    $issue_date = date('Y-m-d'); // today’s date

    if ($book_id && $student_name) {
        $stmt = $conn->prepare("INSERT INTO issued_books (book_id, student_name, issue_date) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $book_id, $student_name, $issue_date);

        if ($stmt->execute()) {
            $msg = "✅ Book issued successfully to $student_name.";
        } else {
            $msg = "❌ Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        $msg = "⚠️ Please fill all fields.";
    }
}

// Fetch available books
$books = $conn->query("SELECT id, title FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>
    <style>
        body { font-family: Arial; margin: 40px; background-color: #f9f9f9; }
        form { max-width: 400px; margin: auto; }
        label, select, input { display: block; width: 100%; margin-bottom: 12px; padding: 10px; }
        input[type=submit] { background-color: #007bff; color: white; border: none; cursor: pointer; }
        .msg { text-align: center; margin-top: 20px; color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">📚 Issue a Book</h2>
    <form method="POST" action="">
        <label>Select Book:</label>
        <select name="book_id" required>
            <option value="">-- Choose a Book --</option>
            <?php while ($book = $books->fetch_assoc()): ?>
                <option value="<?= $book['id'] ?>"><?= htmlspecialchars($book['title']) ?></option>
            <?php endwhile; ?>
        </select>

        <label>Student Name:</label>
        <input type="text" name="student_name" required>

        <input type="submit" value="Issue Book">
    </form>

    <?php if ($msg): ?>
        <div class="msg"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
</body>
</html>
