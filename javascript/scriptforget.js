// Get DOM elements
const form = document.querySelector('#forgot-password-form');
const emailInput = document.querySelector('#email');
const errorMessage = document.querySelector('#error-message');

// Handle form submission
form.addEventListener('submit', (event) => {
    event.preventDefault();

    // Validate email format
    const email = emailInput.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        errorMessage.textContent = 'Please enter a valid email address.';
        return;
    }

    // TODO: Implement password reset functionality
});
