<?php
include 'controller/session.php';

$user = [
    'username' => 'admin',
    'email' => 'admin@example.com',
    'avatar' => 'assets/default-avatar.png'
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <nav>
        
    </nav>
    <main>
        <h2>My Profile</h2>
        <section id="profile-view">
            <img src="<?php echo $user['avatar']; ?>" alt="Avatar" class="avatar">
            <div class="profile-info">
                <p><strong>Username:</strong> <span id="view-username"><?php echo $user['username']; ?></span></p>
                <p><strong>Email:</strong> <span id="view-email"><?php echo $user['email']; ?></span></p>
                <p><strong>Full Name:</strong> <span id="view-fullname">John Doe</span></p>
                <p><strong>Phone:</strong> <span id="view-phone">+1234567890</span></p>
                <p><strong>Bio:</strong> <span id="view-bio">A short bio about yourself...</span></p>
            </div>
            <button id="editProfileBtn">Edit Profile</button>
        </section>
        <section id="profile-edit" style="display:none;">
            <form id="profileForm">
                <label>Username:
                    <input type="text" id="edit-username" value="<?php echo $user['username']; ?>" disabled>
                </label>
                <label>Email:
                    <input type="email" id="edit-email" value="<?php echo $user['email']; ?>" disabled>
                </label>
                <label>Full Name:
                    <input type="text" id="edit-fullname" value="John Doe">
                </label>
                <label>Phone Number:
                    <input type="text" id="edit-phone" value="+1234567890">
                </label>
                <label>Bio:
                    <textarea id="edit-bio" rows="3">A short bio about yourself...</textarea>
                </label>
                <label>Change Avatar:
                    <input type="file" id="avatarInput">
                </label>
                <button type="submit" id="saveProfileBtn">Save Changes</button>
                <button type="button" id="cancelEditBtn">Cancel</button>
            </form>
        </section>
    </main>
    <script src="js/profile.js"></script>
</body>
</html>