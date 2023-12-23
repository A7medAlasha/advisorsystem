// Wait for the document to be ready
document.addEventListener("DOMContentLoaded", function () {
    // Example: Handle submitting the "New Inquiry" form
    var newInquiryForm = document.querySelector("create_inquiries.html");
    newInquiryForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the form from submitting

        // Get the entered inquiry details
        var inquiryTitle = document.querySelector("#inquiry-title").value;
        var inquiryDescription = document.querySelector("#inquiry-description").value;

        // Perform any desired action with the entered inquiry details

        // Example: Display the inquiry details on the page
        var inquiryDetailsContainer = document.querySelector("#inquiry-details");
        inquiryDetailsContainer.innerHTML = `
      <h2>${inquiryTitle}</h2>
      <p>${inquiryDescription}</p>
    `;

        // Example: Submit the inquiry to a backend server using AJAX
        var formData = new FormData();
        formData.append("title", inquiryTitle);
        formData.append("description", inquiryDescription);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/api/inquiries");
        xhr.setRequestHeader("Content-Type", "application/json");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Inquiry submitted successfully
                    console.log("Inquiry submitted successfully");
                } else {
                    // Error occurred while submitting the inquiry
                    console.error("Error submitting inquiry");
                }
            }
        };

        xhr.send(JSON.stringify(formData));
    });
});
