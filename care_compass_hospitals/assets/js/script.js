document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript Loaded Successfully!");

    const searchInput = document.querySelector(".search-bar input");
    const searchButton = document.querySelector(".search-bar button");

    if (searchButton && searchInput) {
        searchButton.addEventListener("click", function () {
            let query = searchInput.value.trim();
            if (query) {
                alert("Searching for: " + query);
            } else {
                alert("Please enter a search query.");
            }
        });
    }
});
