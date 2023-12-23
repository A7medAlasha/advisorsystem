// script_review_inquiries.js
document.addEventListener("DOMContentLoaded", function () {
    // Fetch inquiry data
    fetch('fetch_inquiries.php')
        .then(response => response.json())
        .then(data => {
            // Reference to the table body
            const tableBody = document.querySelector('#inquiry-table tbody');

            // Loop through the data and create table rows
            data.forEach(inquiry => {
                const row = tableBody.insertRow();
                row.innerHTML = `
                    <td>${inquiry.name}</td>
                    <td>${inquiry.email}</td>
                    <td>${inquiry.inquiry}</td>
                    <td>${inquiry.departments}</td>
                    <td><button onclick="performAction(${inquiry.id})">Action</button></td>
                `;
            });
        })
        .catch(error => console.error('Error:', error));
});
