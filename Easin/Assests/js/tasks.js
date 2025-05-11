document.getElementById('expandBtn').onclick = function() {
    var adv = document.getElementById('advancedOptions');
    adv.style.display = adv.style.display === 'none' ? 'block' : 'none';
};
document.getElementById('taskForm').onsubmit = function(e) {
    e.preventDefault();
    var name = document.getElementById('taskName').value.trim();
    if (!name) return;
    var li = document.createElement('li');
    li.textContent = name;
    document.getElementById('taskList').appendChild(li);
    document.getElementById('taskName').value = '';
};