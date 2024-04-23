<?php
//connection to db
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "form";


$conn = new mysqli($server, $user, $pass, $dbname);

if (!$conn) {
    echo "Connection Failed";
} else {
    //Fetching Data from the form

    $username = $_POST['user_username'];
    $password = $_POST['user_password'];

    $sql = "SELECT `username`, `password` FROM `users` WHERE `username` = '$username'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            if($row['password']== $password){
                echo "Login Successful";
            }
            else{
                echo "Wrong Password";
            }
        }   
    }
    else{
        echo "User Doesn't exist";
    }
}
