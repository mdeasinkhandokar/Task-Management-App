<?php
include 'controller/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Calendar View</title>
    <link rel="stylesheet" href="css/calendar.css">
</head>
<body>
    <nav>
        <!-- ... existing code ... -->
    </nav>
    <main>
        <h2>Calendar View</h2>
        <div id="calendarGrid">
            <div class="calendar-header">
                <span>Sun</span><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span>
            </div>
            <div class="calendar-body">
                <!-- Example static week row -->
                <div class="calendar-row">
                    <div class="calendar-cell"></div>
                    <div class="calendar-cell"></div>
                    <div class="calendar-cell">1</div>
                    <div class="calendar-cell">2</div>
                    <div class="calendar-cell">3</div>
                    <div class="calendar-cell">4</div>
                    <div class="calendar-cell">5</div>
                </div>
                <div class="calendar-row">
                    <div class="calendar-cell">6</div>
                    <div class="calendar-cell">7</div>
                    <div class="calendar-cell">8</div>
                    <div class="calendar-cell">9</div>
                    <div class="calendar-cell">10</div>
                    <div class="calendar-cell">11</div>
                    <div class="calendar-cell">12</div>
                </div>
                <!-- Add more rows as needed -->
            </div>
        </div>
        <button class="print-btn" onclick="window.print()">Print</button>
    </main>
    <script src="js/calendar.js"></script>
</body>
</html>