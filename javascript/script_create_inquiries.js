createInquiryForm.addEventListener("submit", function (event) {
    event.preventDefault();

    var nameInput = document.querySelector("#name-input").value;
    var emailInput = document.querySelector("#email-input").value;
    var inquiryInput = document.querySelector("#inquiry-input").value;

    var formData = {
        name: nameInput,
        email: emailInput,
        inquiry: inquiryInput
    };

    fetch('Data Source=(LocalDB)\MSSQLLocalDB;AttachDbFilename=C:\Users\Rak\source\repos\WebSite1\WebSite1\App_Data\AcademicAdvisingDB.mdf;Integrated Security=True', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
        .then(response => {
            if (response.ok) {
                console.log("Inquiry submitted successfully");
                // Update UI or show confirmation message to the user
            } else {
                console.error("Failed to submit inquiry");
                // Handle the error and inform the user
            }
        })
        .catch(error => {
            console.error("Error:", error);
            // Handle network errors or other issues
        });
});
