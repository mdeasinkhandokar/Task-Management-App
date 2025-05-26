document.getElementById('signupForm').onsubmit = function(e) {
    var username = document.getElementById('signup-username').value.trim();
    var email = document.getElementById('signup-email').value.trim();
    var password = document.getElementById('signup-password').value;
    var confirm = document.getElementById('signup-confirm').value;

    // Simple client-side validation
    if (!username || !email || !password || !confirm) {
        alert('All fields are required.');
        e.preventDefault();
        return false;
    }
    if (!/^[^@]+@[^@]+\.[^@]+$/.test(email)) {
        alert('Please enter a valid email address.');
        e.preventDefault();
        return false;
    }
    if (password.length < 6) {
        alert('Password must be at least 6 characters.');
        e.preventDefault();
        return false;
    }
    if (password !== confirm) {
        alert('Passwords do not match.');
        e.preventDefault();
        return false;
    }
    // You can add more checks as needed
};