<!DOCTYPE html>
<html>
<head>
    <title>Library Management Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        nav {
            background: #007bff;
            color: white;
            padding: 15px 20px;
            font-size: 20px;
            font-weight: bold;
            text-align: left;
        }

        h1 {
            margin-top: 50px;
            font-size: 28px;
        }

        .button-container {
            margin-top: 30px;
        }

        .dashboard-btn {
            display: block;
            width: 250px;
            margin: 12px auto;
            padding: 12px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
        }

        .dashboard-btn:hover {
            background-color: #0056b3;
        }

        footer {
            margin-top: 50px;
            padding: 20px;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>
<body>

    <nav>
        📚 Library Management System
    </nav>

    <h1>📘 Library Management Dashboard</h1>

    <div class="button-container">
        <a href="add_book.php" class="dashboard-btn">➕ Add Book</a>
        <a href="view_books.php" class="dashboard-btn">📖 View Books</a>
        <a href="issue_book.php" class="dashboard-btn">📦 Issue Book</a>
        <a href="return_book.php" class="dashboard-btn">📬 Return Book</a>
        <a href="view_issued_books.php" class="dashboard-btn">🗂️ View Issued Logs</a>
    </div>

    <footer>
        &copy; <?= date('Y') ?> Library Management System. All rights reserved.
    </footer>

</body>
</html>
