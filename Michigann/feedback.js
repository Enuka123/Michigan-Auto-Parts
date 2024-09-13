
function validateRegistrationForm() {
    const fullName = document.getElementById('fullName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const nic = document.getElementById('nic').value;
    const feedback = document.getElementById('feedback').value;
   /* const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;*/

    if (fullName === '' || email === '' || phone === '' || nic === '' || feedback === '') {
        alert('All fields are required.');
        return false;
    }

    if (!validateEmail(email)) {
        alert('Invalid email format.');
        return false;
    }

    if (!validatePhoneNumber(phone)) {
        alert('Invalid phone number format.');
        return false;
    }

    if (!validateNIC(nic)) {
        alert('Invalid NIC format.');
        return false;
    }
    return true;
}

function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(String(email).toLowerCase());
}

function validatePhoneNumber(phone) {
    const re = /^[0-9]{10}$/;
    return re.test(String(phone));
}

function validateNIC(nic) {
    const re = /^[0-9]{9}[vVxX]$/;
    return re.test(String(nic));
}
