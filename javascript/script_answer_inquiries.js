// Add your custom JavaScript code here

// Example: Handle form submission
const form = document.querySelector('#answer-inquiry-form');
form.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent the form from submitting

    // Get the form data
    const name = form.elements['name-input'].value;
    const email = form.elements['email-input'].value;
    const inquiry = form.elements['inquiry-input'].value;

    // Answer the inquiry
    answerInquiry(name, email, inquiry);
});

// Example: Answer the inquiry
function answerInquiry(name, email, inquiry) {
    // Replace this example code with your own implementation
    console.log(`Name: ${name}`);
    console.log(`Email: ${email}`);
    console.log(`Inquiry: ${inquiry}`);

    // Add your logic to send the answer to the customer
}
