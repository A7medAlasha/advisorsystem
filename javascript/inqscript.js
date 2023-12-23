// Function to handle form submission
document.getElementById('inquiryForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form from submitting and page reload

    // Get the inquiry text from the form
    var inquiryText = document.getElementById('inquiryText').value;

    // Create a new div to display the inquiry
    var inquiryDiv = document.createElement('div');
    inquiryDiv.classList.add('inquiry');
    inquiryDiv.textContent = inquiryText;

    // Append the inquiry to the inquiries container
    var inquiriesContainer = document.getElementById('inquiriesContainer');
    inquiriesContainer.appendChild(inquiryDiv);

    // Clear the input field after submission
    document.getElementById('inquiryText').value = '';

    // Send inquiry data to PHP using fetch API
    fetch('process_inquiry.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'inquiryText=' + encodeURIComponent(inquiryText) // Send inquiry text
    })
        .then(response => {
            if (response.ok) {
                console.log('Inquiry submitted successfully');
            } else {
                console.error('Failed to submit inquiry');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});
