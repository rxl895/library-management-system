<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'config/db_config.php';

$msg = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $student = trim($_POST['student']);

    if ($book_id && $student) {
        $stmt = $conn->prepare("INSERT INTO issued_books (book_id, student_name) VALUES (?, ?)");
        $stmt->bind_param("is", $book_id, $student);

        if ($stmt->execute()) {
            $msg = "✅ Book issued to $student.";
        } else {
            $msg = "❌ Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        $msg = "⚠️ Please select a book and enter a student name.";
    }
}

// Fetch book list
$books = $conn->query("SELECT id, title FROM books");
if (!$books) {
    die("❌ SQL error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        form { max-width: 400px; margin: auto; }
        select, input { display: block; width: 100%; padding: 8px; margin-bottom: 10px; }
        input[type=submit] { background: #007bff; color: white; border: none; cursor: pointer; }
        .msg { text-align: center; color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h2>📚 Issue a Book</h2>

    <form method="POST" action="">
        <label>Select Book:</label>
        <select name="book_id" required>
            <option value="">-- Choose a Book --</option>
            <?php while ($row = $books->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></option>
            <?php endwhile; ?>
        </select>

        <label>Student Name:</label>
        <input type="text" name="student" required>

        <input type="submit" value="Issue Book">
    </form>

    <?php if ($msg): ?>
        <p class="msg"><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>
</body>
</html>
