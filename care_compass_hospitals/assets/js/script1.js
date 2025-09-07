document.addEventListener("DOMContentLoaded", function () {
    console.log("Appointment Form JavaScript Loaded!");

    function validateAppointmentForm() {
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const doctor = document.getElementById("doctor").value;
        const date = document.getElementById("date").value;
        const today = new Date().toISOString().split("T")[0]; 

        if (name === "" || email === "" || doctor === "" || date === "") {
            alert("Please fill in all required fields.");
            return false;
        }
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }
        if (date < today) {
            alert("Please select a future date for your appointment.");
            return false;
        }
        alert("Appointment successfully booked!");
        return true;
    }

    const appointmentForm = document.getElementById("appointmentForm");
    if (appointmentForm) {
        appointmentForm.addEventListener("submit", function (event) {
            if (!validateAppointmentForm()) {
                event.preventDefault();
            }
        });
    }
});
