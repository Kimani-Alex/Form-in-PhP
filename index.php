<?php
//Create Connection to the database

$servername ="localhost";
$username = "root";
$password = "";
$dbname = "form";

$conn = mysqli_connect($servername,$username,$password,$dbname);


if(!$conn){
    echo "Connection Failed";
}
else{
     //Fetch data from our form
    $user_full_name = $_POST["User_full_name"];
    $user_username = $_POST["user_username"];
    $user_password = $_POST["user_password"];

    $sql = "INSERT INTO `users`(`full_name`, `username`, `password`) VALUES ('$user_full_name','$user_username','$user_password')";

    if($result = mysqli_query($conn,$sql)){
        echo "Data Inserted Successfully";
    }
    else{
        echo "Error inserting the data";
    }   
}
?>