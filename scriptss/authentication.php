<?php
    //connect to database
    include('../scriptss/connection.php');
    
    //start the session
    session_start();

    //get data from form
    $email = $_POST["email"];
    $pass = $_POST["password"];

    //queries to get the password and the userid
    $query = "SELECT pass FROM users WHERE email='$email'";
    $query2 = "SELECT userid FROM users WHERE email='$email'";
    $result = $conn->query($query);
    $result2 = $conn->query($query2);

    //check if the email exists
    if ($result->num_rows > 0) {
        //get the password and the userid from the result
        $row = $result->fetch_assoc();
        $row2 = $result2->fetch_assoc();
        $user_id = $row2["userid"];
        $hashed_password = $row["pass"];

        //verify the password
        if (password_verify($pass, $hashed_password)) {
            //set the session variable
            $_SESSION['user_id'] = $user_id;
            //navigate to home page
            header("Location: ../pages/home.html");
            exit();
        } else {
            //stay on the index page
            header("Location: ../pages/login-page.html");
        }
    } else {
        //stay on the index page
        header("Location: ../pages/login-page.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<body>
    //NO NEED FOR HTML HERE
</body>
</html>