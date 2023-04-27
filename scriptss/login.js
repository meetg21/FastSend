// Get the login form
const form = document.getElementById('login-form');

// Add a submit event listener to the form
form.addEventListener('submit', function(e) {
  e.preventDefault(); // Prevent the form from submitting normally

  // Get the values of the email and password fields
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();

  // Perform some basic validation
  if (email === '') {
    alert('Please enter your email address');
    return;
  }
  if (password === '') {
    alert('Please enter your password');
    return;
  }

  // Send the login request to the server
  // You can replace this with your own login logic
  // For demonstration purposes, we'll just log the login credentials
  console.log(`Email: ${email}, Password: ${password}`);

  // Reset the form
  form.reset();
});