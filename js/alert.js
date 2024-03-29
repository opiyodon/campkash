function displayAlert(message, type) {
    // Create a styled alert box
    var alertBox = document.createElement('div');
    alertBox.style.padding = '20px';
    alertBox.style.margin = '10px';
    alertBox.style.color = 'white';
    alertBox.style.textAlign = 'center';
    alertBox.innerText = message;

    // Set the background color based on the type of alert
    if(type === 'success') {
        alertBox.style.backgroundColor = '#4CAF50';
    } else if(type === 'error') {
        alertBox.style.backgroundColor = '#f44336';
    }

    // Append alert box to the body
    document.body.appendChild(alertBox);

    // Remove the alert box after 3 seconds
    setTimeout(function() {
        alertBox.remove();
    }, 3000);

    // Reload the contact form after the alert box is removed
    setTimeout(function() {
        location.reload();
    }, 3500);
}