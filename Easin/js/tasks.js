
document.addEventListener('DOMContentLoaded', () => {
    const tasksList = document.getElementById('tasksList');
    const taskForm = document.getElementById('taskForm');
    const searchInput = document.getElementById('searchTasks');

    function loadTasks() {
        const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
        tasksList.innerHTML = tasks.map(task => `
            <div class="task-item ${task.completed ? 'completed' : ''}" data-id="${task.id}">
                <input type="checkbox" ${task.completed ? 'checked' : ''}>
                <span>${task.text}</span>
                <button class="delete-btn">Delete</button>
            </div>
        `).join('');
    }

   
    taskForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const title = document.getElementById('taskTitle').value;
        const description = document.getElementById('taskDescription').value;
        const dueDate = document.getElementById('dueDate').value;
        const category = document.getElementById('taskCategory').value;

        if (title) {
            const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
            tasks.push({
                id: Date.now(),
                text: title,
                description,
                dueDate,
                category,
                completed: false
            });
            localStorage.setItem('tasks', JSON.stringify(tasks));
            loadTasks();
            taskForm.reset();
        }
    });

 
    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const tasks = document.querySelectorAll('.task-item');
        tasks.forEach(task => {
            const text = task.querySelector('span').textContent.toLowerCase();
            task.style.display = text.includes(searchTerm) ? 'flex' : 'none';
        });
    });

   
    loadTasks();
});