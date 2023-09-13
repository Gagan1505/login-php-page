<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <form class="mt-5" method="GET" action="login.php">
        <div class="row mt-5">
            <div class="col col-lg-4"></div>
            <div class="col col-lg-4">
                <h1>Welcome,user</h1>
                <div class="mt-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div>
                <div class="mt-3">
                    <label for="pwd" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
                <button type="submit" name="login" class="btn btn-primary mt-4">Login</button>
            </div>
            <div class="col col-lg-4"></div>
        </div>
    </form>
<?php
if(isset($_GET['login'])){
    $email = $_GET["email"];
    $password = $_GET["pwd"];
    $sql = "SELECT * FROM `users` WHERE email = '$email' AND pwd = '$password'";
    $res = mysqli_query($conn,$sql);
    $rowcount = mysqli_num_rows($res);
    if($rowcount == 1){
        echo '<script>
        window.location.href="login.php";
        alert("Successfully Logged In");
        </script>';
    }
    else{
        echo '<script>
        window.location.href="login.php";
        alert("Entered the wrong email or password");
        </script>';

    }
}
?>           
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>