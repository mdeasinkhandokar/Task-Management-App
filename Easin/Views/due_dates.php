<?php
include 'controller/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Due Dates</title>
    <link rel="stylesheet" href="css/due_dates.css">
</head>
<body>
    <nav>
      
    </nav>
    <main>
        <h2>Due Dates</h2>
        <form id="dueDateForm">
            <input type="text" id="dateInput" placeholder="e.g. next Thursday at 2 pm" required>
            <button type="submit">Set Due Date</button>
        </form>
        <div id="reminderSettings">
            <label>Reminder: <input type="checkbox" id="reminderToggle"> Enable</label>
        </div>
        <div id="dueDateList"></div>
    </main>
    <script src="js/due_dates.js"></script>
</body>
</html>