<?php
session_start();
$error = '';
$success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    // Simple validation (expand as needed)
    if (!$username || !$email || !$password || !$confirm) {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } else {
        // Here you would insert into DB, check for existing user, etc.
        // For demo, just show success
        $success = 'Registration successful! You can now <a href="login.php">login</a>.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Sign Up</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form id="signupForm" method="post" action="">
            <input type="text" name="username" id="signup-username" placeholder="Username" required>
            <input type="email" name="email" id="signup-email" placeholder="Email" required>
            <input type="password" name="password" id="signup-password" placeholder="Password" required>
            <input type="password" name="confirm" id="signup-confirm" placeholder="Confirm Password" required>
            <button type="submit" id="signupBtn">Register</button>
        </form>
        <a href="login.php">Back to Login</a>
    </div>
    <script src="js/signup.js"></script>
</body>
</html>