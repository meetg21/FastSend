const form = document.getElementById("signup-form");
const emailInput = form.elements["Email"];
const mobileInput = form.elements["Mobile"];
const passwordInput = form.elements["password"];

form.addEventListener("submit", function (event) {
  if (!validateEmail(emailInput.value)) {
    event.preventDefault();
    alert("Invalid email address");
  }
  if (!validateMobile(mobileInput.value)) {
    event.preventDefault();
    alert("Invalid mobile number");
  }
  if (!validatePassword(passwordInput.value)) {
    event.preventDefault();
    alert("Password must be 8-15 characters and alphanumeric only");
  }
});

function validateEmail(email) {
  // Regular expression for email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function validateMobile(mobile) {
  // Regular expression for mobile validation
  const mobileRegex = /^\d{10}$/;
  return mobileRegex.test(mobile);
}

function validatePassword(password) {
  // Regular expression for password validation
  const passwordRegex = /^[a-zA-Z0-9]{8,15}$/;
  return passwordRegex.test(password);
}
