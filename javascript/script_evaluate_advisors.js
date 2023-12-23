// Wait for the document to be ready
document.addEventListener("DOMContentLoaded", function () {
    // Example: Add event listener for the form submit event
    var evaluateAdvisorForm = document.querySelector("#evaluate-advisor-form");
    evaluateAdvisorForm.addEventListener("submit", function (event) {
        event.preventDefault();

        // Get form data and do something with it
        var formData = new FormData(event.target);
        var name = formData.get("name-input");
        var email = formData.get("email-input");
        var advisor = formData.get("advisor-input");
        var rating = formData.get("rating-input");
        var comment = formData.get("comment-input");

        console.log("Name:", name);
        console.log("Email:", email);
        console.log("Advisor:", advisor);
        console.log("Rating:", rating);
        console.log("Comment:", comment);

        // Add other logic to handle form submission based on your requirements
    });

    // Add other event listeners or perform additional actions as needed for the evaluate advisors page
});
