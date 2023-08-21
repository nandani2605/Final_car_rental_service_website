<?php
    
    include("connect.php");
    session_start();
    
    if(isset($_POST['login'])) 
    {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $query="SELECT * FROM sign_up WHERE username='$username' AND
        pass='$pass'";
        /*$query="SELECT * FROM sign_up WHERE username='"
        . $_POST["username"] . "' AND
        pass='" . $_POST["pass"] . "'    ";*/
        $result = mysqli_query($conn,$query);
        $num = mysqli_num_rows($result);   
       
        if($num > 0) {
            $row = mysqli_fetch_array($result);  
            echo "<script>alert('SignIn Successfully!!');</script>";
            $_SESSION['username']=$username;
            echo "<script>window.location='index.php';</script>";
            //header("location:index.html");
            
            exit();
        }
        else {
            echo "<script>alert('Sorry Invalid Username and Password!!!');</script>";
            
            echo "<script>window.location='SignIn.php';</script>";

        }    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="Sign_Up&Sign_In.css">
    <!--Box Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <!-- Header -->
    <header>
        <a href="index.html" class="logo"><img src="images/logo.jpg" alt=""></a>

        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="#ride">Ride</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#reviews">Review</a></li>
        </ul>
        <div class="header-btn">
            <a href="Sign_Up.php" class="sign-up">Sign Up</a>
            <a href="SignIn.php" class="sign-in">Sign In</a>
        </div>
    </header>
    <!--SignUp and SignIn -->
    <div class="form">
        <form action="SignIn.php" name="myform" onsubmit="return ValidateForm()" method="post">
            <h4 class="title">Sign In</h4>
            <div class="single-form">
                <label>User Name</label>
                <input type="text" placeholder="Please write Username" name="username">
                <i class='bx bxs-user'></i>
            </div>
            <div class="single-form">
                <label>Password</label>
                <input type="password" placeholder="Please write password" name="pass">
                <i class='bx bx-key'></i>
            </div>
            <input type="submit" value="Sign In" name="login">
        </form>
    </div>
     <!-- Link To JS-->
     <script src="JS.js"></script>
</body>
</html>