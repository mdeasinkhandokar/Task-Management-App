<?php
include 'controller/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <nav>
        <!-- ... existing code ... -->
    </nav>
    <main>
        <h2>Contact Us</h2>
        <form id="contactForm">
            <input type="text" id="contactName" placeholder="Your Name" required>
            <input type="email" id="contactEmail" placeholder="Your Email" required>
            <textarea id="contactMsg" placeholder="Your Message" required></textarea>
            <button type="submit">Send</button>
        </form>
        <div id="contactResult"></div>
    </main>
    <script src="js/contact.js"></script>
</body>
</html>