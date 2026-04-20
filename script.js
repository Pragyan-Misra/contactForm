document.getElementById("contactForm").addEventListener("submit", function(e) {

    let isValid = true;

    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const phone = document.getElementById("phone");
    const message = document.getElementById("message");

    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    const phonePattern = /^[0-9]{10}$/;

    clearErrors();

    if (name.value.trim() === "") {
        showError(name, "Name is required");
        isValid = false;
    }

    if (!emailPattern.test(email.value.trim())) {
        showError(email, "Enter valid email");
        isValid = false;
    }

    if (!phonePattern.test(phone.value.trim())) {
        showError(phone, "Enter 10-digit phone number");
        isValid = false;
    }

    if (message.value.trim().length < 10) {
        showError(message, "Message must be at least 10 characters");
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault();
    }

});

function showError(input, message) {
    const small = input.parentElement.querySelector(".error");
    small.innerText = message;
}

function clearErrors() {
    document.querySelectorAll(".error").forEach(el => el.innerText = "");
}
