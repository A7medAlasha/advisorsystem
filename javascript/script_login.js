document.addEventListener('DOMContentLoaded', function () {
    // Select the form element
    const loginForm = document.querySelector('form');

    // Add event listener for form submission
    loginForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the entered username and password values
        const enteredUsername = document.getElementById('username').value;
        const enteredPassword = document.getElementById('password').value;

        // Get the selected user type (Student or Advisor)
        const userType = document.querySelector('input[name="userType"]:checked');

        // Define user credentials (username and password)
        const users = [
            { username: 'student1', password: 'student123', type: 'student' },
            { username: 'advisor1', password: 'advisor123', type: 'advisor' }, 
            { username: 'unit1', password: 'unit123', type: 'unit' }
            // Add more users here following the same pattern
        ];

        // Check if the entered values match any valid credentials and a user type is selected
        const validUser = users.find(user => user.username === enteredUsername && user.password === enteredPassword && user.type === userType.value);

        if (validUser) {
            // If matched, redirect to the corresponding dashboard based on user type
            switch (validUser.type) {
                case 'advisor':
                   
                    window.location.href = '../pages/Advisor Dashboard.html';
                    break;
                case 'student':
                   
                    window.location.href = '../pages/Student Dashboard.html';
                    break;
                case 'unit':

                    window.location.href = '../pages/Advising Unit Dashboard.html';
                    break;
                default:
                    alert('Invalid dashboard choice. Please try again.');
            }
        } else {
            // If not matched or user type not selected, display an error message
            alert('Invalid username or password or user type. Please try again.');
        }
    });
});
