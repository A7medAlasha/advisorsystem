// script_track_inquiries.js
document.addEventListener("DOMContentLoaded", function () {
    // Fetch inquiry data
    fetch('../php/fetch_inquiries.php')
        .then(response => response.json())
        .then(data => {
            // Reference to the table body
            const tableBody = document.querySelector('#inquiries-table tbody');

            // Loop through the data and create table rows
            data.forEach(inquiry => {
                const row = tableBody.insertRow();
                row.innerHTML = `
                    <td>${inquiry.name}</td>
                    <td>${inquiry.email}</td>
                    <td>${inquiry.inquiry}</td>
                    <td>${inquiry.status}</td>
                `;
            });
        })
        .catch(error => console.error('Error:', error));
});
