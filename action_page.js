// action_page.js

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(event) {
        let isValid = true;
        const email = document.getElementById('email').value;
        const cardNumber = document.getElementById('cardnumber').value;
        const expMonth = document.getElementById('expmonth').value;
        const expYear = document.getElementById('expyear').value;
        const cvv = document.getElementById('cvv').value;

        // Clear previous error messages
        clearErrors();

        // Validate first name
        const firstName = document.getElementById('firstname').value.trim();
        if (!firstName) {
            showError('firstname', 'First name is required.');
            isValid = false;
        }

        // Validate email
        if (!validateEmail(email)) {
            showError('email', 'Please enter a valid email address.');
            isValid = false;
        }

        // Validate card number (simple check, you may use a library for better validation)
        if (!/^\d{16}$/.test(cardNumber)) {
            showError('cardnumber', 'Card number must be 16 digits.');
            isValid = false;
        }

        // Validate expiration month and year
        if (!isValidExpiration(expMonth, expYear)) {
            showError('expmonth', 'Invalid expiration date.');
            isValid = false;
        }

        // Validate CVV
        if (!/^\d{3}$/.test(cvv)) {
            showError('cvv', 'CVV must be 3 digits.');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission
        }
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function isValidExpiration(month, year) {
        const currentDate = new Date();
        const currentMonth = currentDate.getMonth() + 1; // Months are zero-indexed
        const currentYear = currentDate.getFullYear() % 100; // Get last two digits of the year
        return (month >= 1 && month <= 12) && (year > currentYear || (year == currentYear && month >= currentMonth));
    }

    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const error = document.createElement('div');
        error.className = 'error';
        error.innerText = message;
        field.parentNode.insertBefore(error, field.nextSibling);
    }

    function clearErrors() {
        const errors = document.querySelectorAll('.error');
        errors.forEach(error => error.remove());
    }
});
