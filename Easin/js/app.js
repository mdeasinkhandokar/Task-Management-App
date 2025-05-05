
function checkAuth() {
    const isLoggedIn = localStorage.getItem('isLoggedIn');
    if (!isLoggedIn && !window.location.href.includes('login.html')) {
        window.location.href = 'login.html';
    }
}


document.addEventListener('DOMContentLoaded', () => {
    checkAuth();
    
   
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
       
            if (email && password) {
                localStorage.setItem('isLoggedIn', 'true');
                window.location.href = 'index.html';
            }
        });
    }


    const quickAddInput = document.getElementById('quickAddTask');
    const addTaskBtn = document.getElementById('addTaskBtn');
    
    if (quickAddInput && addTaskBtn) {
        addTaskBtn.addEventListener('click', () => {
            const taskText = quickAddInput.value.trim();
            if (taskText) {
                addTask(taskText);
                quickAddInput.value = '';
            }
        });
    }
});


function addTask(text) {
    const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
    const newTask = {
        id: Date.now(),
        text,
        completed: false,
        createdAt: new Date().toISOString()
    };
    tasks.push(newTask);
    localStorage.setItem('tasks', JSON.stringify(tasks));
    
  
    triggerNotification('task_added', { title: text });
}



function triggerNotification(action, details) {
    switch(action) {
        case 'task_added':
            notificationSystem.addNotification(
                'New Task Added',
                `Task "${details.title}" has been added successfully.`
            );
            break;
        case 'profile_updated':
            notificationSystem.addNotification(
                'Profile Updated',
                'Your profile information has been updated successfully.'
            );
            break;
        case 'task_completed':
            notificationSystem.addNotification(
                'Task Completed',
                `Task "${details.title}" has been marked as complete.`
            );
            break;
    }
}