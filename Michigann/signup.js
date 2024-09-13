const nicPattern1 = /^[0-9]{9}[vVxXyY]$/;
const nicPattern2 = /^[0-9]{12}$/;
const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const telPattern = /^[0-9]{10}$/;

document.getElementById('nicNumber').addEventListener('input', function() {
    const nicNumber = this.value;
    if (!nicPattern1.test(nicNumber) && !nicPattern2.test(nicNumber)) {
        document.getElementById('nicError').textContent = 'Invalid NIC number format.';
    } else {
        document.getElementById('nicError').textContent = '';
    }
});

document.getElementById('email').addEventListener('input', function() {
    const email = this.value;
    if (!emailPattern.test(email)) {
        document.getElementById('emailError').textContent = 'Invalid email format.';
    } else {
        document.getElementById('emailError').textContent = '';
    }
});

document.getElementById('telephoneNumber').addEventListener('input', function() {
    const telephoneNumber = this.value;
    if (!telPattern.test(telephoneNumber)) {
        document.getElementById('telError').textContent = 'Telephone number must be 10 digits.';
    } else {
        document.getElementById('telError').textContent = '';
    }
});

document.getElementById('confirmPassword').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;
    if (password !== confirmPassword) {
        document.getElementById('passwordError').textContent = 'Passwords do not match.';
    } else {
        document.getElementById('passwordError').textContent = '';
    }
});

document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let isValid = true;

    const nicNumber = document.getElementById('nicNumber').value;
    if (!nicPattern1.test(nicNumber) && !nicPattern2.test(nicNumber)) {
        document.getElementById('nicError').textContent = 'Invalid NIC number format.';
        isValid = false;
    }

    const email = document.getElementById('email').value;
    if (!emailPattern.test(email)) {
        document.getElementById('emailError').textContent = 'Invalid email format.';
        isValid = false;
    }

    const telephoneNumber = document.getElementById('telephoneNumber').value;
    if (!telPattern.test(telephoneNumber)) {
        document.getElementById('telError').textContent = 'Telephone number must be 10 digits.';
        isValid = false;
    }

    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    if (password !== confirmPassword) {
        document.getElementById('passwordError').textContent = 'Passwords do not match.';
        isValid = false;
    }

    if (isValid) {
        alert('Form submitted successfully!');
        // Here you can add code to submit the form data to the server
    }
});