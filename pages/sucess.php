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

    header("Location: login-page.html");

    //close connection
    mysqli_close($conn);
?>
<html>
<body>
    //PARGAT HTML ADD KAR IDHAR
    <a href="index.php">AB CLICK KAR</a>
</body>
</html>