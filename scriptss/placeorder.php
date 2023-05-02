<?php
    //connect to database
    include('../scriptss/connection.php');  

    //query to get the max userid
    $query = "SELECT MAX(order_id) as maxid FROM orders";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $query1 = "SELECT MAX(reciever_id) as maxid1 FROM reciever";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result1);

    //increment the userid by 1
    $maxid = $row['maxid'];
    $newid = $maxid + 1;

    $maxid1 = $row1['maxid1'];
    $newid1 = $maxid1 + 1;

    //get data from form
    $weight = $_POST["weight"];
    $type = $_POST["type"];
    $reciever_name = $_POST["reciever_name"];
    $addresss = $_POST["addresss"];
    $post_code=$_POST["postcode"];
    $pnumber = $_POST["pnumber"];
    $email = $_POST["email"];

    //hash the password
    // $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    //insert data into database
    $sql = "INSERT INTO reciever (reciever_id,reciever_name , addresss , postcode, pnumber, email)
    VALUES ('$newid1', '$reciever_name', '$addresss', '$post_code','$pnumber', '$email')";
    
    //just hear cause it doesn't work without this
    if (mysqli_query($conn, $sql)) {}

    //close connection
    mysqli_close($conn);
?>