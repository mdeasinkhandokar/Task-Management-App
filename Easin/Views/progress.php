<?php
include 'controller/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Progress Tracking</title>
    <link rel="stylesheet" href="css/progress.css">
</head>
<body>
    <nav>
    
    </nav>
    <main>
        <h2>Progress Tracking</h2>
        <div id="completionBar">
            <div id="barFill" style="width: 40%"></div>
        </div>
        <div id="stats">
            <span>Completed: 4/10 tasks</span>
        </div>
        <select id="weekSelector">
            <option>This Week</option>
            <option>Last Week</option>
        </select>
        <canvas id="productivityGraph" width="400" height="100"></canvas>
    </main>
    <script src="js/progress.js"></script>
</body>
</html>