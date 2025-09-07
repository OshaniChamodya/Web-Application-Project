document.addEventListener('DOMContentLoaded', function() {

    const searchForm = document.querySelector('.search-form');
    const patientIdInput = document.getElementById('search-id');

    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const patientId = patientIdInput.value.trim();

        if (patientId === "") {
            alert("Patient ID cannot be empty!");
        } else if (isNaN(patientId)) {
            alert("Please enter a valid Patient ID (numbers only).");
        } else {

       searchForm.submit();
        }
    });

});
   