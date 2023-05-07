
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign up</title>
  <link rel="stylesheet" href="\styles\signup.css" />
</head>

<body>
  <div class="main">
    <table>
      <tr>
        <td>
          <img src="\images\admin.svg" alt="admin" class="admin" />
        </td>
        <td>
          <form class="box" id="signup-form" method="POST">
            <h1>Sign up</h1>
            <p style="text-align: center">Let's get you started!</p>
            <hr style="align-items: center" />
            <label for="Name">
              <h3>Name</h3>
            </label>
            <input type="text" placeholder="Enter your full name " name="Name" required />
            <label for="Email">
              <h3>Email</h3>
            </label>
            <input type="email" placeholder="Enter your mail addresss " name="Email" required /><br />
            <label for="Mobile">
              <h3>Mobile</h3>
            </label>
            <input type="tel" placeholder="Enter your mob no." name="Mobile" required />
            <br />
            <label for="Password">
              <h3>Password</h3>
            </label>
            <input type="password" placeholder="Create your password" name="password" id="password" required />
            <br />
            <button type="submit">Sign up</button>
          </form>
        </td>
      </tr>
    </table>
  </div>
  <script src="/javascript/signup.js"></script>
</body>

</html>