<?php
$server = "localhost";
$username = "root";
$password = "mysql123";
$database = "mydatabase";

$conn = mysqli_connect($server, $username, $password, $database,3307);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = $_POST["email"];
    $password = $_POST["password"];

    
     
    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from users where email='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if ($password== $row['password']){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['applicant_id'] = $row['applicant_id'];
                header("location: page1persondet.php");
            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Application Form</title>
    <link rel="icon" href="IITP_logo.svg.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="loginpagestyle.css">
    <script src="https://kit.fontawesome.com/5c6f422bf6.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <header>
        <div class="navigationbar" width= 100%>
            <h1 class="hindi">भारतीय प्रौद्योगिकी संस्थान पटना</h1>
            <h1>Indian Institute of Technology Patna</h1>
        </div>
    </header>
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <main>
        <h3 class="blinkText" >Application for Faculty Position</h3>
        <div class="box">
            <div class="col-md-6"style=" height:403px; border-radius: 10px 0px 0px 10px;"><img src="https://www.pngkit.com/png/full/270-2702179_iit-patna-logo-png.png" style="margin-top: 12%; margin-left: 15%; height: 75%">

                <p style="text-align: center;">
                                            </p>
            </div>
            <div class="col-md-6" style="border-radius: 0px 10px 10px 0px; height: 403px;">
                <br />
                 <div class="col-md-10 col-md-offset-1">
                  <h3 class="login-heading" style="text-align: center;top: 25px;left: 20px;"  ><strong><u>LOGIN HERE</u></strong></h3><br />
                  
                  <form role="form" method="post" action="loginpage.php">
                   <input type="hidden" name="ci_csrf_token" value="" />
                     
                        <div class="inner-addon left-addon">
                            <i class="fa-regular fa-envelope" style ="margin:auto; padding-left: 10px;"></i>
                            <!-- <i class="glyphicon glyphicon-envelope"></i> -->
                            <input type="text" name="email" placeholder="Your email" autofocus="" style="margin: auto;" required/>
                        </div>
                        
       
                        <div class="inner-addon left-addon">
                            <i class="fa-solid fa-lock" style ="margin: auto; ;"></i>
                            <!-- <i class="glyphicon glyphicon-envelope"></i> -->
                            <input type="password" name="password" placeholder="Enter Password" autofocus="" style="margin-right: 30px;padding-right:88px;"  required/>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-3" >
                              <button type="submit" name="submit" value="Submit">Login</button>
        
                            </div>
                            <div class="col-md-9 ">
                              <a href="loginpage.php"><button type="button" class="cancelbtn pull-right" name="reset password">Reset Password</button></a>
                            </div>
                          </div>
                        </form>
                        <br />
                        <p style="text-align: center; color: green; font-size: 1.3em;" ><strong>NOT REGISTERED? </strong> <a href='registration.php' class="btn-sm btn-primary signup" > SIGN UP</a>
                         
                        </p>
                        </div>
                        </div>  
    
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>