<?php
  
include("connect.php");
  
if(isset($_POST['Sign_Up']))	//save is name of the sumbit button in html file
{
	//name is same as given in name to each lebal
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $pass1 = $_POST['pass1'];
	//For Inserting the values to the mysql databasse tabble  registration_details
	$sql_query = "INSERT INTO sign_up (name,phone,email,address,username,pass,pass1)
	VALUES ('$name','$phone','$email','$address','$username','$pass','$pass1')";

		if  (mysqli_query($conn, $sql_query))
	{
        echo "<script>alert('Registered Successfully');</script>";
    }
	else
	{
		echo "Error: " . $sql . "" . mysqli_error($conn);
	}
	mysqli_close($conn);
}
      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="Sign_Up&Sign_In.css"> 
    <!--Box Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <a href="index.html" class="logo"><img src="images/" alt=""></a>
    
        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="index.html">Home</a></li>
            <li><a href="#ride">Ride</a></li>
            <li><a href="Car_Shortlist.html">Services</a></li>
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
        <form action="Sign_Up.php" name="myform" onsubmit="return ValidateForm()" method="post">
            <h4 class="title">Sign Up</h4>
            <div class="single-form">
                <label>Fullname</label>
                <input type="text" placeholder="Please write fullname" name="name">
                <i class='bx bx-user'></i>
            </div>
            <div class="single-form">
                <label>Phone Number</label>
                <input type="tel" placeholder="Please write phone number" name="phone">
                <i class='bx bx-phone'></i>
            </div>
            <div class="single-form">
                <label>Email Id</label>
                <input type="email" placeholder="Please write Email ID" name="email">
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="single-form">
                <label>Address</label>
                <input type="address" placeholder="Please write Address" name="address">
                <i class='bx bxs-map'></i>
            </div>
            <div class="single-form">
                <label>User Name</label>
                <input type="text" placeholder="Please write username" name="username">
                <i class='bx bxs-user'></i>
            </div>
            <div class="single-form">
                <label>Set Password</label>
                <input type="password" placeholder="Password" id="password" name="pass">
                <img src="images/pass-hide.png" onclick="pass()" class="pass-icon" id="pass-icon">
           </div>

           <div class="single-form">
            <label>Confirm Password</label>
            <input type="password" placeholder="Please write password" name="pass1">
            <i class='bx bx-key'></i>
       </div>
            <!--<div class="single-form">
                <label>Kindly choose the car type you would like to rent</label>
                <div class="single-form">
                <select>
                    <option class="single-form" value="Standard Cars">Standard Cars</option>
                    <option class="single-form" value="Convertibles">Convertibles</option>
                    <option class="single-form" value="Luxury Cars">Luxury Cars</option>
                    <option class="single-form" value="SUV">SUV</option>
                    <option class="single-form" value="Van">Van</option>
                </select>
            </div>
            </div>
            <div class="single-form">
                <label>Additional Notes & request</label>
                <input type="comment" placeholder="Write Notes & request">
                <i class='bx bxs-comment'></i>
            </div>
            <div class="single-form">
                <label>Type your question here</label>
                <input type="text" placeholder="Write question here">
                <i class='bx bx-question-mark' ></i>
            </div>-->
            <input type="submit" name="Sign_Up" value="Sign Up" >
        </form>
        <!--<form action="#">
            <h4 class="title">Login</h4>
            <div class="single-form">
                <label>Email</label>
                <input type="email" placeholder="Please write email">
                <i class='bx bx-envelope' ></i>
            </div>
            <div class="single-form">
                <label>Password</label>
                <input type="password" placeholder="Please write password">
                <i class='bx bx-key' ></i>
            </div>
            <input type="submit" value="Login">
        </form>-->
    </div>
     <!-- Link To JS-->
     <script src="JS.js">
     </script>
     
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['Sign_Up']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    require ("PHPMailer/PHPMailer.php");
    require ("PHPMailer/SMTP.php");
    require ("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'jadavdivyesh234@gmail.com';                     //SMTP username
        $mail->Password   = 'xlgjeeeehsxqflpd';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('jadavdivyesh234@gmail.com', 'DKN Car Rental Service');
        $mail->addAddress($email);     //Add a recipient
        
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirmation Email By DKN Car Rental Service ';
        $mail->Body    = "Dear $name <br> 
                          <b>Thanks for Signing Up!</b> <br>
                          If you have any Query freely mail us on jadavdivyesh243@gmail.com";
        
    
        $mail->send();
            echo "<script>alert('Sign In Now!!');</script>";
            echo "<script>window.location='SignIn.php';</script>";
        }
        catch (Exception $e) {
            echo "<script>alert('Not Registered!!!');</script>";
        }
}


?>