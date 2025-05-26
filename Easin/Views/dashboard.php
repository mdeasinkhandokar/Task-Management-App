<?php
include 'controller/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <main>
        <h1>Welcome to Your Dashboard</h1>
   
        <div class="dashboard-cards">
            <a href="profile.php" class="dashboard-card">
                <div class="card-icon">👤</div>
                <div class="card-title">Profile</div>
                <div class="card-desc">View and edit your profile</div>
            </a>
            <a href="tasks.php" class="dashboard-card">
                <div class="card-icon">📝</div>
                <div class="card-title">Tasks</div>
                <div class="card-desc">Manage your tasks</div>
            </a>
            <a href="due_dates.php" class="dashboard-card">
                <div class="card-icon">⏰</div>
                <div class="card-title">Due Dates</div>
                <div class="card-desc">Set and view due dates</div>
            </a>
            <a href="categories.php" class="dashboard-card">
                <div class="card-icon">🏷️</div>
                <div class="card-title">Categories</div>
                <div class="card-desc">Organize by category</div>
            </a>
            <a href="progress.php" class="dashboard-card">
                <div class="card-icon">📊</div>
                <div class="card-title">Progress</div>
                <div class="card-desc">Track your progress</div>
            </a>
            <a href="calendar.php" class="dashboard-card">
                <div class="card-icon">📅</div>
                <div class="card-title">Calendar</div>
                <div class="card-desc">View your calendar</div>
            </a>
            <a href="notifications.php" class="dashboard-card">
                <div class="card-icon">🔔</div>
                <div class="card-title">Notifications</div>
                <div class="card-desc">See your notifications</div>
            </a>
            <a href="contact.php" class="dashboard-card">
                <div class="card-icon">✉️</div>
                <div class="card-title">Contact</div>
                <div class="card-desc">Contact support</div>
            </a>
            <a href="upload.php" class="dashboard-card">
                <div class="card-icon">📤</div>
                <div class="card-title">File Upload</div>
                <div class="card-desc">Upload and manage files</div>
            </a>
            <a href="premium.php" class="dashboard-card">
                <div class="card-icon">⭐</div>
                <div class="card-title">Premium Account</div>
                <div class="card-desc">Upgrade your account</div>
            </a>
            <a href="controller/logout.php" class="dashboard-card logout-card">
                <div class="card-icon">🚪</div>
                <div class="card-title">Logout</div>
                <div class="card-desc">Sign out of your account</div>
            </a>
        </div>
    </main>
    <script src="js/dashboard.js"></script>
</body>
</html>