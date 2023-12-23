// Add your custom JavaScript code here

// Example: Handle form submission
const form = document.querySelector('#forward-inquiry-form');
form.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent the form from submitting

    // Get the form data
    const name = form.elements['name-input'].value;
    const email = form.elements['email-input'].value;
    const inquiry = form.elements['inquiry-input'].value;
    const departments = Array.from(form.elements['department[]'])
        .filter((checkbox) => checkbox.checked)
        .map((checkbox) => checkbox.value);

    // Send the form data to the server
    sendFormData(name, email, inquiry, departments);
});

// Example: Send form data to the server
function sendFormData(name, email, inquiry, departments) {
    // Replace this example code with your own implementation
    console.log(`Name: ${name}`);
    console.log(`Email: ${email}`);
    console.log(`Inquiry: ${inquiry}`);
    console.log(`Departments: ${departments}`);
}
