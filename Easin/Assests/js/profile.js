document.getElementById('editProfileBtn').onclick = function() {
    document.getElementById('profile-view').style.display = 'none';
    document.getElementById('profile-edit').style.display = 'block';
};

document.getElementById('cancelEditBtn').onclick = function() {
    document.getElementById('profile-edit').style.display = 'none';
    document.getElementById('profile-view').style.display = 'block';
};

document.getElementById('profileForm').onsubmit = function(e) {
    e.preventDefault();
    
    document.getElementById('view-fullname').textContent = document.getElementById('edit-fullname').value;
    document.getElementById('view-phone').textContent = document.getElementById('edit-phone').value;
    document.getElementById('view-bio').textContent = document.getElementById('edit-bio').value;
    
    document.getElementById('profile-edit').style.display = 'none';
    document.getElementById('profile-view').style.display = 'block';
};
document.getElementById('saveProfileBtn').onclick = function() {
    alert('Profile changes saved (demo only).');
};

document.getElementById('avatarInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            
            document.querySelectorAll('.avatar').forEach(function(img) {
                img.src = e.target.result;
            });
        };
        reader.readAsDataURL(file);
    }
});