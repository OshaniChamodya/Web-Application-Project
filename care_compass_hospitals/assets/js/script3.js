document.addEventListener("DOMContentLoaded", function () {
    console.log("Feedback Page JavaScript Loaded!");

    document.getElementById("feedbackForm").addEventListener("submit", function (event) {
        if (!validateFeedbackForm()) {
            event.preventDefault(); 
        }
    });

    function validateFeedbackForm() {
        let name = document.getElementById("name").value.trim();
        let comments = document.getElementById("comments").value.trim();
        let rating = document.getElementById("rating").value;

        if (name === "") {
            alert("Please enter your name.");
            return false;
        }

        if (comments.length < 10) {
            alert("Comments should be at least 10 characters long.");
            return false;
        }

        if (!rating) {
            alert("Please select a rating.");
            return false;
        }

        alert("Thank you for your feedback!");
        return true;
    }

    const navLinks = document.querySelectorAll("nav ul li a");
    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add("active");
        }
    });

    const commentsBox = document.getElementById("comments");
    commentsBox.addEventListener("input", function () {
        this.style.height = "auto";
        this.style.height = (this.scrollHeight) + "px";
    });
});
