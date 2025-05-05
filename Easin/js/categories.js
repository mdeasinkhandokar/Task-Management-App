document.addEventListener('DOMContentLoaded', () => {
    const categoriesList = document.getElementById('categoriesList');
    const addCategoryBtn = document.getElementById('addCategoryBtn');

    function loadCategories() {
        const categories = JSON.parse(localStorage.getItem('categories') || '[]');
        categoriesList.innerHTML = categories.map(category => `
            <div class="category-item" style="background-color: ${category.color}">
                <span>${category.name}</span>
                <div class="category-actions">
                    <button class="edit-btn" data-id="${category.id}">Edit</button>
                    <button class="delete-btn" data-id="${category.id}">Delete</button>
                </div>
            </div>
        `).join('');
    }

    addCategoryBtn.addEventListener('click', () => {
        const name = prompt('Enter category name:');
        const color = '#' + Math.floor(Math.random()*16777215).toString(16);
        
        if (name) {
            const categories = JSON.parse(localStorage.getItem('categories') || '[]');
            categories.push({
                id: Date.now(),
                name,
                color
            });
            localStorage.setItem('categories', JSON.stringify(categories));
            loadCategories();
        }
    });

    categoriesList.addEventListener('click', (e) => {
        if (e.target.classList.contains('delete-btn')) {
            const id = e.target.dataset.id;
            if (confirm('Are you sure you want to delete this category?')) {
                const categories = JSON.parse(localStorage.getItem('categories') || '[]');
                const updatedCategories = categories.filter(cat => cat.id !== parseInt(id));
                localStorage.setItem('categories', JSON.stringify(updatedCategories));
                loadCategories();
            }
        }
    });

   
    loadCategories();
});