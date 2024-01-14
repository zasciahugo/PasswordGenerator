function generatePassword(length) {
    const upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const lower = "abcdefghijklmnopqrstuvwxyz";
    const numbers = "0123456789";
    const special = "!@#$%^&*()-_=+";
    let characters = upper + lower + numbers + special;
    let password = '';
    for (let i = 0; i < length; i++) {
        let randomIndex = Math.floor(Math.random() * characters.length);
        password += characters[randomIndex];
    }
    return password;
}

function updatePassword() {
    let newPassword = generatePassword(12);
    document.getElementById('password-text').textContent = newPassword;
}


function copyPassword() {
    // Get the password text
    var password = document.getElementById('password-display').textContent.trim();

    // Create a temporary textarea element to copy the text to the clipboard
    var tempTextArea = document.createElement('textarea');
    tempTextArea.value = password;
    document.body.appendChild(tempTextArea);

    // Select and copy the text
    tempTextArea.select();
    document.execCommand('copy');

    // Remove the temporary textarea element
    document.body.removeChild(tempTextArea);

    // Optionally, you can provide user feedback, such as a tooltip or message
    alert('Password copied: ' + password);
}

document.addEventListener('DOMContentLoaded', function() {
    updatePassword();
});