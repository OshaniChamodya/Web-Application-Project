document.addEventListener("DOMContentLoaded", function() {

    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {

        event.preventDefault();

        const email = document.querySelector('#email').value;
        const password = document.querySelector('#password').value;

        if (email === "" || password === "") {
            displayMessage("Please fill in all fields.", "error");
            return;
        }


        form.submit(); 
    });

    function displayMessage(message, type) {
        const messageContainer = document.createElement('div');
        messageContainer.classList.add('message', type);
        messageContainer.textContent = message;

        document.body.appendChild(messageContainer);

        setTimeout(function() {
            messageContainer.remove();
        }, 3000);
    }
});
