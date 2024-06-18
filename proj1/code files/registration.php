<?php
$server = "localhost";
$username = "root";
$password = "mysql123";
$database = "mydatabase";

$conn = mysqli_connect($server, $username, $password, $database,3307);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create the database if it doesn't exist
$sql="CREATE DATABASE IF NOT EXISTS mydatabase";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
// Establish connection to the newly created database
$conn=mysqli_connect($server,$username,$password,$database,3307);

// Check if connection to the database is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create tables in the database
$sql="CREATE TABLE IF NOT EXISTS `mydatabase`.`users` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `fname` VARCHAR(20) NOT NULL , `lname` VARCHAR(20) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , PRIMARY KEY (`sno`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);


$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["re_password"];
    $category = $_POST["cast"];
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
        // $exists = false; 
        if(($password == $cpassword)){
            // creating hash - a one way func, can check the hash of object but not object of hash
            //$hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `mydatabase`.`users` (`fname`, `lname`, `email`, `password`, `category`) VALUES ('$fname', '$lname', '$email', '$password', '$category');";
            $result = mysqli_query($conn, $sql);
   

            if ($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}

?>

<html>
<head>
	<title>Faculty Register | IIT Patna</title>
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/css/bootstrap-datepicker.css">
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/jquery.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/js/bootstrap-datepicker.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">


	
</head>
<style type="text/css">
	body {
background: #CEDCA6;
background: linear-gradient(135deg, #CEDCA6, #f0f7ee); padding-top:0px!important;}

</style>
<body>
    <?php
        if($showAlert){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your account is now created and you can login
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
    <div class="container-fluid" style="background-color: cornsilk; margin-bottom: 10px;">
	<div class="container">
        <div class="row" style="margin-bottom:10px; ">
        	<div class="col-md-8 col-md-offset-2">

        		<!--  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITIndorelogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

        		<h3 style="text-align:center;color:#414002!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: 'Noto Sans', sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
    			<h3 style="text-align:center;color: #414002!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>
    			

        	</div>
        	

    	   
        </div>
		    <!-- <h3 style="text-align:center; color: #414002; font-weight: bold;  font-family: 'Fjalla One', sans-serif!important; font-size: 2em;">Application for Academic Appointment</h3> -->
    </div>
   </div> 
   <h3 style="color: #515e5e; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="blink_me">Application for Faculty Position</h3>

<style type="text/css">

.form-control { margin-bottom: 10px; }

.back-imgs{
      /*background-position: center; */
      background-size: cover; /* Resize the background image to cover the entire container */
    }

    h3{
  font-weight: bold;
  color:green;
  font-family: 'Sintony', sans-serif;
  text-align:center; color:green;
  text-align: center;
}
</style>

<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
<div class="container" style=" border-radius:10px; margin-top:20px;">
    <div class="row" style="border-width: 2px; border-style: solid; border-radius: 10px; box-shadow: 0px 1px 30px 1px #284d7a; height:500px; background-color:#F7FFFF;">

        <div class="col-md-6"style=" height:403px; border-radius: 10px 0px 0px 10px; padding-top:0px; padding-bottom:0px;"><img src="https://www.pngkit.com/png/full/270-2702179_iit-patna-logo-png.png" style="margin-top: 12%; margin-left: 15%; height: 75%">

            <p style="text-align: center;">
                                        </p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
          <h3>CREATE YOUR PROFILE</h3><br />
            <form action="registration.php" method="post" class="form" role="form">
                
                <input type="hidden" name="ci_csrf_token" value="" />
            <div class="row">
                                <div class="col-xs-6 col-md-6">
                    <input class="form-control" value='' name="firstname" id="firstname" placeholder="First name" type="text"
                         required="" autofocus />
                                    </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="lastname" id="lastname" value='' required="" placeholder="Last name" type="text" />
                                    </div>
            </div>
             <div class="row">
              <div class="col-xs-6 col-md-6">
               <input class="form-control" name="email" id="email" placeholder="Your email"  value='' required="" type="email" />
                              </div>

                  <div class="col-xs-6 col-md-6">
                  <select id="cast" name="cast" class="form-control input-md" required="">
                    <option value="">Select Category</option>
                      <option value="UR">UR</option>
                      <option value="OBC">OBC</option>
                      <option value="SC">SC</option>
                      <option value="ST">ST</option>
                      <option value="PWD">PWD</option>
                      <option value="EWS">EWS</option>
                  </select>
                  </div>
             </div>
           
           <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">

            <input class="form-control" name="password" placeholder="New password" id="password" required="" type="password" />
                              </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">

            <input class="form-control" name="re_password" id="re_password"placeholder="Retype - new password" required="" type="password" />
                              </div></div>
                  
          

        <div class="row">

          <input id="created_at" name="created_at" type="hidden">

            <div class="col-xs-6 col-md-6">
                  
                  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/viewcaptcha?t=0.53048700+1712405663" alt="CAPTCHA security code" />
                <!-- <input class="form-control" name="firstname" placeholder="First Name" type="text" require autofocus /> -->
                
                            </div>

            <div class="col-xs-6 col-md-6" >
                <input class="form-control" name="captcha" placeholder="Insert image text" required="" type="text" />
           </div>

          
            <div class="col-xs-12 col-md-12" >
                <h5><strong><font color="red">Note:</font>
                <br />  
                <br />  
                  <br />
                <font color="#515e5e">
                1. Applicant should kindly check their email for activation link to access the portal. 
                <br />  
                2. Please check SPAM folder also, in case activation link is not received in INBOX.<br />
                3. Applicant applying for more than one position/ department should use <strong><font color="red">different email id</font></strong> for each application.</font> </strong>
                  <br />
                  <br />
                  <br />
                  </h5>
                <button class="btn btn-sm btn-primary" type="submit" name="submit" value="Submit" href = "loginpage.php">Register</button>

                <strong class=" pull-right" style="color: green;">If registered <a href='loginpage.php' class="btn btn-sm btn-success"> Login Here</a></strong>
           </div>

           
            

             
            </div>

            </form>

        </div>
    </div>

</div>
<br />
<div class="container">
    <div class="col-md-8 col-md-offset-2" style="text-align: center!important; font-weight: bold; color: black!important;">
      
    </div>
</div>

<div id="footer"></div>
</body>
</html>

<script type="text/javascript">
	
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script>