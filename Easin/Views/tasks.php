<?php
include 'controller/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tasks</title>
    <link rel="stylesheet" href="css/tasks.css">
</head>
<body>
    <nav>
        
    </nav>
    <main>
        <h2>Tasks</h2>
        <form id="taskForm">
            <input type="text" id="taskName" placeholder="Task name" required>
            <button type="submit">Add Task</button>
            <button type="button" id="expandBtn">+</button>
            <div id="advancedOptions" style="display:none;">
                <textarea id="taskDesc" placeholder="Description"></textarea>
                <input type="text" id="taskLabels" placeholder="Labels (comma separated)">
            </div>
        </form>
        <ul id="taskList"></ul>
    </main>
    <script src="js/tasks.js"></script>
</body>
</html>