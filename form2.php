<?php
$servername="localhost";
$username="root";
$password="";
$dbname="new_form";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    echo "Connection Failed";
}
else{
    $user_full_name=$_POST["user_full_name"];
    $user_username=$_POST["user_username"];
    $user_password=$_POST["user_password"];
}


$sql="INSERT INTO `login`(`full_name`, `username`, `password`) VALUES ('$user_full_name', '$user_username', '$user_password')";


if(mysqli_query($conn,$sql)){
    echo "Data Inserted Successfully!!!";
}

else{
    echo "Error inserting the data";
}
?>