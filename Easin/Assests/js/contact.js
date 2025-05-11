document.getElementById('contactForm').onsubmit = function(e) {
    e.preventDefault();
    document.getElementById('contactResult').textContent = "Thank you for contacting us!";
    this.reset();
};