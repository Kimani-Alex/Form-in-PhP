<?php

$servername = "localhost";
$Username = "root";
$Password = "";
$dbname = "Form3";

$conn = mysqli_connect($servername, $Username, $Password, $dbname);

if (!$conn) {
    echo "Connection failed";
} else {
    $user_full_name = $_POST['user_full_name'];
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];


    $sql = "SELECT `Full Name`, `Username`, `Password` FROM `login` WHERE `Full Name` = '$user_full_name' and `Username`='$user_username' AND `Password`='$user_password'";


    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Password'] == $user_password) {
                echo "Login Successful";
            } else {
                echo "Wrong Password";
            }
        }
    } else {
        echo "User Doesn't exist";
    }
}
