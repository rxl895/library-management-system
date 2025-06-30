<?php
require 'config/db_config.php';

$msg = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $genre = trim($_POST['genre']);

    if ($title && $author && $genre) {
        $stmt = $conn->prepare("INSERT INTO books (title, author, genre) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $author, $genre);

        if ($stmt->execute()) {
            $msg = "✅ Book added successfully!";
        } else {
            $msg = "❌ Error: " . $conn->error;
        }

        $stmt->close();
    } else {
        $msg = "⚠️ All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <style>
        body { font-family: Arial, margin: 40px; }
        form { max-width: 400px; margin: auto; }
        label, input, select { display: block; width: 100%; margin-bottom: 10px; padding: 8px; }
        input[type=submit] { background: #007bff; color: white; border: none; cursor: pointer; }
        .msg { margin-top: 20px; text-align: center; color: green; }
    </style>
</head>
<body>
    <h2>Add a New Book</h2>
    <form method="POST" action="">
        <label>Title:</label>
        <input type="text" name="title" required>

        <label>Author:</label>
        <input type="text" name="author" required>

        <label>Genre:</label>
        <input type="text" name="genre" required>

        <input type="submit" value="Add Book">
    </form>

    <?php if ($msg): ?>
        <div class="msg"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>
</body>
</html>
