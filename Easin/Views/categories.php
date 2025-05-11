<?php
include 'controller/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <link rel="stylesheet" href="css/categories.css">
</head>
<body>
    <nav>
        <!-- ... existing code ... -->
    </nav>
    <main>
        <h2>Task Categories</h2>
        <form id="categoryForm">
            <input type="text" id="categoryName" placeholder="New Category" required>
            <button type="submit">Add Category</button>
        </form>
        <ul id="categoryList"></ul>
    </main>
    <script src="js/categories.js"></script>
</body>
</html>