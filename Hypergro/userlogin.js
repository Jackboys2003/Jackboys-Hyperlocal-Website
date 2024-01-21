function validatePhoneNumber(input) {
    const phoneNumber = input.value;
    const isValid = /^\d{10}$/.test(phoneNumber);

    if (!isValid) {
        alert('Invalid character entered in the phone number. Please use only digits.');
        input.value = phoneNumber.replace(/\D/g, ''); 
    }
}

function validateForm() {
    const email = document.getElementsByName('email')[0].value;
    const phoneNumber = document.getElementsByName('phoneNumber')[0].value;
    const pinCode = document.getElementsByName('pinCode')[0].value;
    const password = document.getElementsByName('password')[0].value;
    const confirmPassword = document.getElementsByName('confirmPassword')[0].value;

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Invalid email address format');
        return false;
    }

    const phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phoneNumber)) {
        alert('Invalid phone number (should be 10 digits)');
        return false;
    }

   
    const pinCodeRegex = /^\d{6}$/;
    if (!pinCodeRegex.test(pinCode)) {
        alert('Invalid pin code (should be 6 digits)');
        return false;
    }

   
    const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    if (!passwordRegex.test(password)) {
        alert('Invalid password. It should contain at least 1 special character, 1 number, and be 8 characters long.');
        return false;
    }
    if (password !== confirmPassword) {
        alert('Passwords do not match');
        return false;
    }

    return true; 
}
