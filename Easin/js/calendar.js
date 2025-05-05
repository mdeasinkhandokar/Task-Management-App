document.addEventListener('DOMContentLoaded', () => {
    const calendar = document.getElementById('calendar');
    const currentMonthElement = document.getElementById('currentMonth');
    let currentDate = new Date();

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const daysInMonth = lastDay.getDate();
        const startingDay = firstDay.getDay();

        currentMonthElement.textContent = `${firstDay.toLocaleString('default', { month: 'long' })} ${year}`;

        let calendarHTML = '<div class="calendar-days">';
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        days.forEach(day => {
            calendarHTML += `<div class="day-header">${day}</div>`;
        });

        for (let i = 0; i < startingDay; i++) {
            calendarHTML += '<div class="calendar-day empty"></div>';
        }

        for (let day = 1; day <= daysInMonth; day++) {
            calendarHTML += `
                <div class="calendar-day" data-date="${year}-${month + 1}-${day}">
                    <span class="date">${day}</span>
                    <div class="tasks"></div>
                </div>
            `;
        }

        calendarHTML += '</div>';
        calendar.innerHTML = calendarHTML;
        loadTasksIntoCalendar();
    }

    function loadTasksIntoCalendar() {
        const tasks = JSON.parse(localStorage.getItem('tasks') || '[]');
        tasks.forEach(task => {
            if (task.dueDate) {
                const taskDate = new Date(task.dueDate);
                const dateCell = document.querySelector(`[data-date="${taskDate.getFullYear()}-${taskDate.getMonth() + 1}-${taskDate.getDate()}"]`);
                if (dateCell) {
                    const tasksContainer = dateCell.querySelector('.tasks');
                    tasksContainer.innerHTML += `<div class="calendar-task">${task.text}</div>`;
                }
            }
        });
    }

    document.getElementById('prevMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

   
    renderCalendar();
});