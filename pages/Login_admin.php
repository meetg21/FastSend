<?php
require 'connection.php';
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "select * from admin where email= '$email' ";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $user_record = mysqli_fetch_assoc($result);
    $pass = $user_record['pass'];
    if ($pass == $password) {
      echo "Logged in successfully!";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" type="" href="\styles\login-page.css" />
</head>

<body>
  <div class="main">
    <table>
      <tr>
        <td>
          <img src="\images\admin.svg" alt="admin" />
        </td>
        <td>
          <form class="box" method="POST">
            <h1>Login</h1>
            <p>Hello Admin, welcome back!</p>
            <hr />
            <label for="Email id"></label>
            <h3>Email</h3>
            <input name="email" type="email" placeholder="Enter a valid email address" required /><br /><br />
            <h3>Password</h3>
            <label for="Password"></label>
            <input type="password" name="password" placeholder="Enter password" required /><br />
            <a href="forgotpass.html">Forgot Password?</a><br />
            <button type="submit">Login</button>
            <p>Not a member? <a href="signup.html">Signup now</a></p>
          </form>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>