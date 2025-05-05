document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contactForm');

    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            message: document.getElementById('message').value
        };

     
        try {
          
            await new Promise(resolve => setTimeout(resolve, 1000));
            alert('Message sent successfully! We will get back to you soon.');
            contactForm.reset();
        } catch (error) {
            alert('Failed to send message. Please try again later.');
        }
    });
});