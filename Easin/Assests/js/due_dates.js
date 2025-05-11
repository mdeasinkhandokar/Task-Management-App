document.getElementById('dueDateForm').onsubmit = function(e) {
    e.preventDefault();
    var input = document.getElementById('dateInput').value.trim();
    if (!input) return;
    var div = document.createElement('div');
    div.textContent = "Due: " + input;
    document.getElementById('dueDateList').appendChild(div);
    document.getElementById('dateInput').value = '';
};