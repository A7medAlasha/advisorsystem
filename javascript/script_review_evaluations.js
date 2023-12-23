// script_review_evaluations.js
document.addEventListener("DOMContentLoaded", function () {
    // Fetch evaluation data
    fetch('../php/fetch_evaluations.php')
        .then(response => response.json())
        .then(data => {
            // Reference to the table body
            const tableBody = document.querySelector('#evaluation-table tbody');

            // Loop through the data and create table rows
            data.forEach(evaluation => {
                const row = tableBody.insertRow();
                row.innerHTML = `
                    <td>${evaluation.student_name}</td>
                    <td>${evaluation.reviewer_name}</td>
                    <td>${evaluation.evaluation_date}</td>
                    <td>${evaluation.score}</td>
                    <td>${evaluation.comments}</td>
                `;
            });
        })
        .catch(error => console.error('Error:', error));
});
