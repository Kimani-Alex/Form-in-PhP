<?php
$message = '';
$username = "";
$password = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['password'] == $password) {
                    $message = '<div class="alert alert-success my-3" role="alert">
                    <strong><i class="fa fa-check-circle" aria-hidden="true"></i> Login Sucessful</strong>
                </div>';
                header("Location:admin/index.html");

                } else {
                    $message = '<div class="alert alert-danger my-3" role="alert">
                       <strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Wrong Password</strong>
                   </div>';
                }
            }
        } else {
            $message = '<div class="alert alert-danger my-3" role="alert">
            <strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> User Doesn\'t Exist</strong>
        </div>';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,regular,500,600,700,800,300italic,italic,500italic,600italic,700italic,800italic" rel="stylesheet" />
    <title>Login Form</title>
</head>
<style>
    body {
        font-family: 'open sans';
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #e0e0e0;
    }

    form {
        box-shadow: 2px 2px 8px gray, -2px -2px 8px white;
        padding: 20px;
    }

    img {
        display: block;
        margin: auto;
        width: 70%;
    }
</style>

<body>
    <form action="login.php" method="POST" class="col-lg-5 col-md-7 col-sm-10 col-11">
        <h2 class="text-center">Login Form</h2>
        <img src="https://images.creativemarket.com/0.1.0/ps/6617556/1820/1214/m1/fpnw/wm0/1-.png?1562013320&s=ce1439b9d366c76a81037e9f111cbed4" alt="" />

        <?php echo $message; ?>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="user_username" placeholder="Enter Username" value="<?php echo $username ?>" />
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" class="form-control" id="password" name="user_password" placeholder="Enter password" value="<?php echo $password ?>" />
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>