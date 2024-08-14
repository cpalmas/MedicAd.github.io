function encryptPassword() {
    const passwordField = document.getElementById('password');
    const shift = 3;
    let password = passwordField.value;
    let encryptedPassword = '';

    for (let i = 0; i < password.length; i++) {
        let char = password[i];
        const code = password.charCodeAt(i);

        if (char.match(/[a-z]/i)) {
            if (code >= 65 && code <= 90) { // Mayúsculas
                char = String.fromCharCode(((code - 65 + shift) % 26) + 65);
            } else if (code >= 97 && code <= 122) { // Minúsculas
                char = String.fromCharCode(((code - 97 + shift) % 26) + 97);
            }
        } else if (char.match(/[0-9]/)) { // Números
            char = String.fromCharCode(((code - 48 + shift) % 10) + 48);
        } else {
            char = password[i]; // Otros caracteres no se encriptan
        }

        encryptedPassword += char;
    }

    // Update the password field with the encrypted password
    passwordField.value = encryptedPassword;

    return true; // Allow form submission
}
