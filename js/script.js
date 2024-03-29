// landing page slider
document.addEventListener('DOMContentLoaded', (event) => {
    let slideIndex = 1;
    const slides = document.getElementsByClassName("slide");
    const dots = document.getElementsByClassName("nav-btn");
    const showSlides = (n) => {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        if (slides[n - 1]) { // Check if the slide exists
            slides[n - 1].style.display = "block";
            dots[n - 1].className += " active";
        }
    }
    const autoSlideShow = () => {
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        showSlides(slideIndex);
    }
    showSlides(slideIndex);
    setInterval(autoSlideShow, 3000); // Change slide every 3 seconds

    // Add event listeners to the navigation buttons
    for (let i = 0; i < dots.length; i++) {
        dots[i].addEventListener('click', function () {
            slideIndex = i + 1;
            showSlides(slideIndex);
        });
    }
});

// validate password in reset_password.php
function validatePasswords() {
    var newPassword = document.getElementById("new_password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    if (newPassword != confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    return true;
}

// profile dashboard on dashboard
document.addEventListener('DOMContentLoaded', function () {
    var profilePic = document.querySelectorAll('.user-profile');
    var dropDown = document.querySelectorAll('.dropdown-content');

    function profileDropdown(event) {
        // toggle dropdown
    }

    profilePic.addEventListener('click', profileDropdown);
});

// switch pages on dashboard
document.addEventListener('DOMContentLoaded', function () {
    var links = document.querySelectorAll('.sidebar ul a');
    var sections = document.querySelectorAll('.main-content section');

    function changeActiveSection(event) {
        event.preventDefault();

        // Remove active class from all sections and links
        sections.forEach(function (section) {
            section.classList.remove('active-section');
        });
        links.forEach(function (link) {
            link.classList.remove('active');
        });

        // Add active class to clicked link and corresponding section
        this.classList.add('active');
        var activeSection = document.querySelector(this.getAttribute('href'));
        activeSection.classList.add('active-section');
    }

    // Add click event to all links
    links.forEach(function (link) {
        link.addEventListener('click', changeActiveSection);
    });
});