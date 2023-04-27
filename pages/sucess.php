<?php
    //connect to database
    include('../scriptss/connection.php');  

    //query to get the max userid
    $query = "SELECT MAX(userid) as maxid FROM users";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    //increment the userid by 1
    $maxid = $row['maxid'];
    $newid = $maxid + 1;

    //get data from form
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $username = $_POST["name"];
    $pass = $_POST["password"];

    //hash the password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    //insert data into database
    $sql = "INSERT INTO users (userid , username , email, mobile, pass)
    VALUES ('$newid', '$username', '$email','$mobile', '$hashed_pass')";
    
    //just hear cause it doesn't work without this
    if (mysqli_query($conn, $sql)) {}

    //close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Submit Button Example</title>
  <style>
    /* Center the pop-up */
    #popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      border: 1px solid black;
      padding: 20px;
      display: none;
    }
  </style>
</head>
<body>
  <div id="popup">
    <h2>Welcome, thanks for signing in!</h2>
  </div>

  <script>

    const emailInput = '<?php echo $email ?>';
    const mobileInput = '<?php echo $mobile ?>';
    const passwordInput = '<?php echo $pass ?>';

    if (!validateEmail(emailInput)) {
      alert("Invalid email address");
      window.location.href = "signup.html";
    }
    if (!validateMobile(mobileInput)) {
      alert("Invalid mobile number");
      window.location.href = "signup.html";
    }
    if (!validatePassword(passwordInput)) {
      alert("Password must be 8-15 characters and alphanumeric only");
      window.location.href = "signup.html";
    }

    // Show the pop-up
    document.getElementById("popup").style.display = "block";

    // Wait 3 seconds and redirect to the login page
    setTimeout(function() {
      window.location.href = "login-page.html";
    }, 3000);

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

  </script>
</body>
</html>
