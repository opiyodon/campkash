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

// contact page popup
function displayAlert(message, type) {
    // Create a styled alert box
    var alertBox = document.createElement('div');
    alertBox.style.padding = '20px';
    alertBox.style.margin = '10px';
    alertBox.style.color = 'white';
    alertBox.style.textAlign = 'center';
    alertBox.innerText = message;

    // Set the background color based on the type of alert
    if (type === 'success') {
        alertBox.style.backgroundColor = '#4CAF50';
    } else if (type === 'error') {
        alertBox.style.backgroundColor = '#f44336';
    }

    // Append alert box to the body
    document.body.appendChild(alertBox);

    // Remove the alert box after 3 seconds
    setTimeout(function () {
        alertBox.remove();
    }, 3000);

    // Reload the contact form after the alert box is removed
    setTimeout(function () {
        location.reload();
    }, 3500);
}

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
    var profileBox = document.querySelector('.profileBox');
    var dropDown = document.querySelector('.dropdown-content');

    function profileDropdown(event) {
        // Check if 'dropdown-close' class is present
        if (dropDown.classList.contains('dropdown-close')) {
            // Remove 'dropdown-close' and add 'dropdown-open' to open the dropdown
            dropDown.classList.remove('dropdown-close');
            dropDown.classList.add('dropdown-open');
        } else {
            // Remove 'dropdown-open' and add 'dropdown-close' to close the dropdown
            dropDown.classList.remove('dropdown-open');
            dropDown.classList.add('dropdown-close');
        }
    }

    // Add click event listener to profile picture
    profileBox.addEventListener('click', profileDropdown);
});

// switch pages on dashboard
document.addEventListener('DOMContentLoaded', function () {
    var links = document.querySelectorAll('.sidebar ul a');
    var profileBtn = document.querySelector('.profileBtn'); // Since there's only one profile button
    var sections = document.querySelectorAll('.main-content section');
    var activeLink = document.querySelector('.sidebar ul a.active'); // Keep track of the currently active link

    function changeActiveSection(event) {
        event.preventDefault();

        // Remove active class from all sections
        sections.forEach(function (section) {
            section.classList.remove('active-section');
        });

        // If the profile button is clicked, activate the profile section
        if (this === profileBtn) {
            document.querySelector('#profile').classList.add('active-section');
            // Do not remove the 'active' class from the sidebar links
        } else {
            // Remove active class from the previously active link
            if (activeLink) {
                activeLink.classList.remove('active');
            }
            // Add active class to clicked link and corresponding section
            this.classList.add('active');
            var activeSection = document.querySelector(this.getAttribute('href'));
            activeSection.classList.add('active-section');
            activeLink = this; // Update the currently active link
        }
    }

    // Add click event to all links
    links.forEach(function (link) {
        link.addEventListener('click', changeActiveSection);
    });

    // Add click event to the profile button
    profileBtn.addEventListener('click', changeActiveSection);
});

// restrict maximum amount on repaying loan forms
window.onload = function () {
    var paymentInput = document.getElementById('payment-amount');
    var repaymentForm = document.getElementById('repayment-form');
    paymentInput.max = loanBalance;

    // Add an event listener to the form
    repaymentForm.addEventListener('submit', function (event) {
        if (paymentInput.value > loanBalance) {
            // Prevent the form from being submitted
            event.preventDefault();

            // Display an alert and reset the input value
            alert('Please enter a value equal to or lower than the loan balance.');
            paymentInput.value = '';
        }
    });
};

// restrict loan application based on loan balance
document.getElementById('loan-request-form').addEventListener('submit', function (e) {
    var lastLoanBalance = Number(document.getElementById('last_loan_balance').value);
    if (lastLoanBalance > 0) {
        e.preventDefault();
        alert('You need to clear your previous loan before requesting a new one');
    }
});

// change profile picture on dashboard
var changeProfileBox = document.querySelector(".changeProfileBox");
var profileOverlay = document.querySelector(".profile-overlay");

// Add the 'profile-overlay-active' class on mouseover
changeProfileBox.addEventListener("mouseover", function () {
    profileOverlay.classList.add("profile-overlay-active");
});

// Remove the 'profile-overlay-active' class on mouseout
changeProfileBox.addEventListener("mouseout", function () {
    profileOverlay.classList.remove("profile-overlay-active");
});