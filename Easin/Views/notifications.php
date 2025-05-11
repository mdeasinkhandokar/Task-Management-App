<?php
include 'controller/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Notifications</title>
    <link rel="stylesheet" href="css/notifications.css">
</head>
<body>
    <nav>
        <!-- ... existing code ... -->
    </nav>
    <main>
        <h2>Notifications</h2>
        <div id="bellIcon">🔔 <span id="unreadCount">0</span></div>
        <div id="notificationCenter" style="display:none;">
            <ul id="notificationList"></ul>
        </div>
        <div>
            <label>Email Notifications <input type="checkbox" id="emailToggle"></label>
            <label>Push Notifications <input type="checkbox" id="pushToggle"></label>
        </div>
    </main>
    <script src="js/notifications.js"></script>
</body>
</html>