<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <form class="mt-5" action="index.php" method="POST">
            <div class="row mt-5">
                <div class="col col-lg-4"></div>
                <div class="col col-lg-4">
                    <h1>Sign up here</h1>
                    <div class="mt-1">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mt-1">
                        <label for="user_name" class="form-label">User_Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name">
                    </div>
                    <div class="mt-1">
                        <label for="mail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp">
                    </div>
                    <div class="mt-1">
                        <label for="phno" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phno" name="phno">
                    </div>
                    <div class="mt-1">
                        <label for="password" class="form-label">Create Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <a href="login.php">Already an user ? Please login</a><br>
                    <button type="submit" name="signup" class="btn btn-primary mt-4">Signup</button>
                </div>
                <div class="col col-lg-4"></div>
            </div>
    </form>
    </form>
<?php
if(isset($_POST['signup'])){
    $name = $_POST['name']; 
    $user_name = $_POST['user_name'];
    $email = $_POST['mail'];
    $phone = $_POST['phno'];
    $pwd = $_POST['password'];
    
    $check = "SELECT * FROM users WHERE email = '$email'";
    $mail = mysqli_query($conn,$check);
    $result = mysqli_num_rows($mail);

    if($result == 0){
        $sql = "INSERT INTO users(name,user_name,email,phone,pwd) VALUES ('$name','$user_name','$email','$phone','$pwd')";
        $res = mysqli_query($conn,$sql);
        if($res){
           echo '<script>
           window.location.href="login.php";
           alert("Registered Successfully !!!!");
           </script>';
        }
    }
    else{
            echo '<script>
            window.location.href="index.php";
            alert("User already exist !!!!");
            </script>';
    }
}
?>
    
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>