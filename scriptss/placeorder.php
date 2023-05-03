<?php
//connect to database
include('../scriptss/connection.php');
// include('../scriptss/authentication.php');

//query to get the max orderid
$query = "SELECT MAX(order_id) as maxid FROM orders";
$result = mysqli_query($conn, $query);
$row3 = mysqli_fetch_assoc($result);

$query1 = "SELECT MAX(reciever_id) as maxid1 FROM reciever";
$result1 = mysqli_query($conn, $query1);
$row1 = mysqli_fetch_assoc($result1);

$query2 = "SELECT MAX(sender_id) as maxid2 FROM sender";
$result2 = mysqli_query($conn, $query2);
$row4 = mysqli_fetch_assoc($result2);

//increment the userid by 1
$maxid = $row3['maxid'];
$newid = $maxid + 1;

$maxid1 = $row1['maxid1'];
$newid1 = $maxid1 + 1;

$maxid2 = $row4['maxid2'];
$newid2 = $maxid2 + 1;

//get data from form
$sender_name = $_POST["sender_name"];
$saddresss = $_POST["saddresss"];
$spostcode = $_POST["spostcode"];
$spnumber = $_POST["spnumber"];
$semail = $_POST["semail"];
$weight = $_POST["weight"];
$type = $_POST["type"];
$reciever_name = $_POST["reciever_name"];
$addresss = $_POST["addresss"];
$post_code = $_POST["postcode"];
$pnumber = $_POST["pnumber"];
$email = $_POST["email"];

//insert data into database
$sql = "INSERT INTO reciever (reciever_id, reciever_name, addresss, postcode, pnumber, email)
    VALUES ('$newid1', '$reciever_name', '$addresss', '$post_code','$pnumber', '$email');
    
    INSERT INTO orders (order_id, reciever_id,sender_id,weights, types)
    VALUES ('$newid','$newid1','$newid2', '$weight', '$type');
    
    INSERT INTO sender (sender_id, sender_name, saddresss, spostcode, spnumber, semail)
    VALUES ('$newid2', '$sender_name', '$saddresss', '$spostcode', '$spnumber', '$semail')";

//execute the SQL statement
if (mysqli_multi_query($conn, $sql)) {
    echo "Record created";
} else {
    //error message
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

//close connection
mysqli_close($conn);
?>