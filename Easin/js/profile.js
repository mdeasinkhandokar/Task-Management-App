document.addEventListener('DOMContentLoaded', () => {
    const profileTabs = document.getElementById('profileTabs');
    const changeAvatarBtn = document.getElementById('changeAvatarBtn');
    const userAvatar = document.getElementById('userAvatar');
    
   
    loadUserData();
    
 
    showTab('edit-profile');
    
   
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            showTab(button.dataset.tab);
        });
    });
    
 
    changeAvatarBtn.addEventListener('click', () => {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const imageData = e.target.result;
                    userAvatar.src = imageData;
                    localStorage.setItem('userAvatar', imageData);
                };
                reader.readAsDataURL(file);
            }
        };
        input.click();
    });
    
   
    function loadUserData() {
        const userData = JSON.parse(localStorage.getItem('userData') || '{}');
        const avatarData = localStorage.getItem('userAvatar');
        
        if (avatarData) {
            userAvatar.src = avatarData;
        }
        
        if (userData.fullName) {
            document.querySelector('.profile-info h2').textContent = userData.fullName;
        }
    }
    
    
    function showTab(tabName) {
        let content = '';
        switch(tabName) {
            case 'edit-profile':
                content = `
                    <form id="profileForm">
                        <div class="form-group">
                            <input type="text" id="fullName" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" placeholder="Email">
                        </div>
                        <button type="submit" class="btn-primary">Save Changes</button>
                    </form>
                `;
                break;
            case 'change-password':
                content = `
                    <form id="passwordForm">
                        <div class="form-group">
                            <input type="password" id="currentPassword" placeholder="Current Password">
                        </div>
                        <div class="form-group">
                            <input type="password" id="newPassword" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <input type="password" id="confirmPassword" placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn-primary">Change Password</button>
                    </form>
                `;
                break;
            case 'notifications':
                content = `
                    <form id="notificationForm">
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="emailNotifications">
                                Email Notifications
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" id="pushNotifications">
                                Push Notifications
                            </label>
                        </div>
                        <button type="submit" class="btn-primary">Save Preferences</button>
                    </form>
                `;
                break;
        }
        profileTabs.innerHTML = content;
    }

  
    document.addEventListener('submit', (e) => {
        e.preventDefault();
        
        if (e.target.id === 'profileForm') {
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            
            const userData = {
                fullName,
                email
            };
            
            localStorage.setItem('userData', JSON.stringify(userData));
            document.querySelector('.profile-info h2').textContent = fullName;
            alert('Profile updated successfully!');
        }
    });
});