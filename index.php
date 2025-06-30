<!DOCTYPE html>
<html>
<head>
    <title>📚 Library Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 60px;
            background-color: #f4f4f4;
        }
        h1 {
            margin-bottom: 40px;
            color: #333;
        }
        .nav {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-width: 300px;
            margin: 0 auto;
        }
        a {
            padding: 12px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            transition: background 0.3s ease;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>📚 Library Management Dashboard</h1>

    <div class="nav">
        <a href="add_book.php">➕ Add Book</a>
        <a href="view_books.php">📖 View Books</a>
        <a href="issue_book.php">📦 Issue Book</a>
        <a href="return_book.php">📥 Return Book</a>
        <a href="view_issued_books.php">📋 View Issued Logs</a>
    </div>
</body>
</html>
