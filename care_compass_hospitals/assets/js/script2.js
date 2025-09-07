document.addEventListener("DOMContentLoaded", function () {
    console.log("Contact Page JavaScript Loaded!");

    const hotlineBtn = document.querySelector(".hotline-btn");
    if (hotlineBtn) {
        hotlineBtn.addEventListener("click", function (event) {
            if (!confirm("Do you want to call Care Compass Hospitals?")) {
                event.preventDefault(); 
            }
        });
    }
    const navLinks = document.querySelectorAll("nav ul li a");
    navLinks.forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add("active");
        }
    });
    const contactInfo = document.querySelectorAll(".contact-info p a, .contact-info p strong");
    contactInfo.forEach(info => {
        info.addEventListener("click", function () {
            const textToCopy = this.innerText;
            navigator.clipboard.writeText(textToCopy).then(() => {
                alert(`Copied: ${textToCopy}`);
            }).catch(err => {
                console.error("Error copying text:", err);
            });
        });
    });
    const socialLinks = document.querySelectorAll(".social-media ul li a");
    socialLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            if (!confirm(`You are about to visit ${this.href}. Continue?`)) {
                event.preventDefault();
            }
        });
    });
});