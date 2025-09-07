document.addEventListener("DOMContentLoaded", function () {
    console.log("Sign-In Page JavaScript Loaded!");

    document.getElementById("loginForm").addEventListener("submit", function (event) {
        if (!validateLoginForm()) {
            event.preventDefault(); 
        }
    });

    function validateLoginForm() {
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value.trim();

        let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return false;
        }

        return true;
    }

    document.getElementById("email").focus();
});
