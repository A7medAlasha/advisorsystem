// script.js
document.addEventListener('DOMContentLoaded', function () {
    const deleteButton = document.getElementById('deleteButton');
    deleteButton.addEventListener('click', function (event) {
        event.preventDefault();
        // Fetching data from the server
        fetch('../php/unit_php.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                // Handle the data received from the server
                console.log('Data from server:', data);
                // You can perform further actions with the received data here
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    });

    // Other event listeners and functionalities can be added as needed
});
