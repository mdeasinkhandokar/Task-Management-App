document.getElementById('categoryForm').onsubmit = function(e) {
    e.preventDefault();
    var name = document.getElementById('categoryName').value.trim();
    if (!name) return;
    var li = document.createElement('li');
    li.textContent = name;
    document.getElementById('categoryList').appendChild(li);
    document.getElementById('categoryName').value = '';
};