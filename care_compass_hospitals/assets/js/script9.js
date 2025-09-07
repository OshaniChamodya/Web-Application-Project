document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.querySelector(".search-form");
    const searchInput = document.getElementById("search-id");

    searchForm.addEventListener("submit", function (event) {
        if (!validateInput(searchInput.value)) {
            event.preventDefault();
            alert("Please enter a valid Patient ID (only numbers allowed)." );
        }
    });

    function validateInput(input) {
        const patientIdPattern = /^\d+$/; 
        return patientIdPattern.test(input);
    }
});
