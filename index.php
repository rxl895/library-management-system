<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #007bff;
            padding: 12px 20px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-align: left;
        }

        h2 {
            margin-top: 40px;
            font-size: 26px;
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
            text-decoration: none;
            transition: transform 0.2s ease, background 0.3s ease;
        }

        .dashboard-btn:hover {
            background-color: #0056b3;
            transform: scale(1.03);
        }

        .logout-btn {
            margin-top: 20px;
            background-color: crimson;
            padding: 10px 20px;
            border: none;
            color: white;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        footer {
            margin-top: 50px;
            font-size: 14px;
            color: #555;
        }

        /* Dark mode */
        .dark-mode {
            background-color: #121212;
            color: #eee;
        }

        .dark-mode .dashboard-btn {
            background-color: #444;
            color: white;
        }

        .dark-mode nav {
            background-color: #222;
        }

        .dark-toggle {
            background-color: #333;
            color: #fff;
            padding: 8px 16px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .dark-toggle:hover {
            background-color: #222;
        }
    </style>
</head>
<body>

    <nav>
        📚 Library Management System
    </nav>

    <h2>📘 Library Management Dashboard</h2>

    <a class="dashboard-btn" href="add_book.php">➕ Add Book</a>
    <a class="dashboard-btn" href="view_books.php">📖 View Books</a>
    <a class="dashboard-btn" href="issue_book.php">📦 Issue Book</a>
    <a class="dashboard-btn" href="return_book.php">📥 Return Book</a>
    <a class="dashboard-btn" href="view_issued_books.php">📋 View Issued Logs</a>

    <button onclick="toggleMode()" class="dark-toggle">🌓 Toggle Dark Mode</button>

    <form action="logout.php" method="POST">
        <button type="submit" class="logout-btn">🔓 Logout</button>
    </form>

    <footer>
        <p>&copy; 2025 Library Management System. All rights reserved.</p>
    </footer>

    <script>
        function toggleMode() {
            document.body.classList.toggle("dark-mode");
        }
    </script>

</body>
</html>
