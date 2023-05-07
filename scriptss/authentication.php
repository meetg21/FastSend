<?php
    //connect to database
    include('../scriptss/connection.php');

    //start the session
    session_start();

    //get data from form
    $email = $_POST["email"];
    $pass = $_POST["password"];
    

    //queries to get the password and the userid
    $query = "SELECT pass,mobile FROM users WHERE email='$email'";
   
    // $query2 = "SELECT userid FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    // $result = $conn->query($query);
    // $result2 = $conn->query($query2);
    


    //check if the email exists
    // if ($result->num_rows > 0) {
        //get the password and the userid from the result
        // $row = $result->fetch_assoc();
        // $row2 = $result2->fetch_assoc();
        // $user_id = $row2["userid"];
        // $hashed_password = $row["pass"];
        echo $pass;
        echo $row['pass'];
       
        // echo $hashed_password;
        //verify the password
        if ($pass== $row['pass']) {
            //set the session variable
            // $_SESSION['user_id'] = $user_id;
            
            // echo $pass;
            // echo $row['pass'];
            //navigate to home page

            header("Location: ../pages/middle.php");
            exit();
        } else {
            //stay on the index page
            // echo ("byr");
            header("Location: ../pages/forgotpass.html");
        }
    //  header("Location: ../pages/forgotpass.html");
    
?>
<!DOCTYPE html>
<html lang="en">
<body>
    //NO NEED FOR HTML HERE
</body>
</html>