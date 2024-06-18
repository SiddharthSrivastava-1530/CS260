<?php
$server = "localhost";
$username = "root";
$password = "mysql123";
$database = "mydatabase";

session_start(); 

$conn = mysqli_connect($server, $username, $password, $database,3307);

// Check if connection to MySQL server is successful
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
$sql="CREATE TABLE IF NOT EXISTS `mydatabase`.`personal_details` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `first_name` VARCHAR(255) NOT NULL , `middle_name` VARCHAR(255)  , `last_name` VARCHAR(255) NOT NULL , `dob` DATE NOT NULL , `marital_status` VARCHAR(255) NOT NULL , `id_proof` VARCHAR(255) NOT NULL , `father_name` VARCHAR(255) NOT NULL , `nationality` VARCHAR(255) NOT NULL , `gender` VARCHAR(255) NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);
$sql="CREATE TABLE IF NOT EXISTS `mydatabase`.`correspondence_address` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `street` VARCHAR(255) NOT NULL , `city` VARCHAR(255) NOT NULL , `state` VARCHAR(255) NOT NULL , `country` VARCHAR(255) NOT NULL , `pin/zip` VARCHAR(255) NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);
$sql="CREATE TABLE IF NOT EXISTS `mydatabase`.`permanent_address` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `street` VARCHAR(255) NOT NULL , `city` VARCHAR(255) NOT NULL , `state` VARCHAR(255) NOT NULL , `country` VARCHAR(255) NOT NULL , `pin/zip` VARCHAR(255) NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);
$sql="CREATE TABLE IF NOT EXISTS `mydatabase`.`mobile_email` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `mobile` VARCHAR(255) NOT NULL , `alternate_mobile` VARCHAR(255)  , `landline` VARCHAR(255)  , `email` VARCHAR(255)  , `alternate_email` VARCHAR(255)  , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);
?>

<?php
if(isset($_POST['fname'], $_POST['lname'], $_POST['dob'], $_POST['mstatus'], $_POST['id_proof'], $_POST['father_name'],$_POST['nationality'],$_POST['gender'])) {
    $first_name = $_POST['fname'];
    $middle_name = $_POST['mname'];
    $last_name=$_POST['lname'];
    $dob = date('Y-m-d', strtotime($_POST['dob'])); // Convert date format
    $marital_status = $_POST['mstatus'];
    $id_proof=$_POST['id_proof'];
    $father=$_POST['father_name'];
    $nationality=$_POST['nationality'];
    $gender=$_POST['gender'];
    // $username = "root";
    // $password = "Harry@3015";
    // $servername = "localhost";
    // $database = "mydatabase";

    // // Establish connection
    // $conn = mysqli_connect($servername, $username, $password, $database);

    // // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }

    // Prepare and execute query
    $sql = "INSERT INTO `personal_details` (`first_name`, `middle_name`, `last_name`, `dob`, `marital_status`, `id_proof`, `father_name`,`nationality`,`gender` )
            VALUES ('$first_name', '$middle_name', '$last_name', '$dob', '$marital_status', '$id_proof', '$father','$nationality','$gender')";
    if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // File upload handling
    if(isset($_FILES['userfile2'])&& $_FILES['userfile2']['type'] === 'application/pdf') {
        $userfile2 = $_FILES['userfile2'];
        $filename = $_FILES['userfile2']['name'];
        $temp = $_FILES['userfile2']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
        $fileext = explode('.', $filename);
        $fileactual = strtolower(end($fileext));
        $newfilename = uniqid('', true) . "." . $fileactual;
        $filedest = 'files_proj/' . $newfilename;
        move_uploaded_file($temp, $filedest);
    }
    if(isset($_FILES['userfile'])&& $_FILES['userfile']['type'] === 'image/jpeg') {
        $userfile = $_FILES['userfile'];
        $filename = $_FILES['userfile']['name'];
        $temp = $_FILES['userfile']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
        $fileext = explode('.', $filename);
        $fileactual = strtolower(end($fileext));
        $newfilename = uniqid('', true) . "." . $fileactual;
        $filedest = 'files_proj/' . $newfilename;
        move_uploaded_file($temp, $filedest);
    }

    // // Close connection
    // mysqli_close($conn);
} else {
    echo "All fields are required.";
}

?>

<?php 
if(isset($_POST['padd'], $_POST['padd1'], $_POST['padd2'], $_POST['padd3'], $_POST['padd4'])) {
    $street = $_POST['padd'];
    $city = $_POST['padd1'];
    $state=$_POST['padd2'];
    $country=$_POST['padd3'];
    $pin = $_POST['padd4'];
    // $username = "root";
    // $password = "Harry@3015";
    // $servername = "localhost";
    // $database = "mydatabase";

    // // Establish connection
    // $conn = mysqli_connect($servername, $username, $password, $database);

    // // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }

    // Prepare and execute query
    $sql = "INSERT INTO `permanent_address` (`street`, `city`, `state`, `country`, `pin/zip` )
            VALUES ('$street', '$city', '$state', '$country', '$pin')";
    if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    // mysqli_close($conn);
} else {
    echo "All fields are required.";
}
?>
<?php 
if(isset($_POST['cadd'], $_POST['cadd1'], $_POST['cadd2'], $_POST['cadd3'], $_POST['cadd4'])) {
    $street = $_POST['cadd'];
    $city = $_POST['cadd1'];
    $state=$_POST['cadd2'];
    $country=$_POST['cadd3'];
    $pin = $_POST['cadd4'];
    // $username = "root";
    // $password = "Harry@3015";
    // $servername = "localhost";
    // $database = "mydatabase";

    // // Establish connection
    // $conn = mysqli_connect($servername, $username, $password, $database);

    // // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }

    // Prepare and execute query
    $sql = "INSERT INTO `correspondence_address` (`street`, `city`, `state`, `country`, `pin/zip` )
            VALUES ('$street', '$city', '$state', '$country', '$pin')";
    if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    // mysqli_close($conn);
} else {
    echo "All fields are required.";
}
?>
<?php 
if(isset($_POST['mobile'])) {
    $mobile = $_POST['mobile'];
    $mobile_2 = $_POST['mobile_2'];
    $landline=$_POST['landline'];
    $email=$_POST['email'];
    $email_2 = $_POST['email_2'];
    // $username = "root";
    // $password = "Harry@3015";
    // $servername = "localhost";
    // $database = "mydatabase";

    // // Establish connection
    // $conn = mysqli_connect($servername, $username, $password, $database);

    // // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }

    // Prepare and execute query
    $sql = "INSERT INTO `mobile_email` (`mobile`, `alternate_mobile`, `landline`, `email`, `alternate_email` )
            VALUES ('$mobile', '$mobile_2', '$landline', '$email', '$email_2')";
    if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header("location: page2edu.php");

    // Close connection
    mysqli_close($conn);
} else {
    echo "All fields are required.";
}
?>
<html>
<head>
	<title>Update your personal details</title>
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
			<h3 style=" 
                font-weight: bold;
               
                font-family: 'Sintony', sans-serif;
                text-align:center; color:#515e5e;
                text-align: center;
               "class="blink_me">Application for Faculty Position</h3>

<!-- <body onload="updateAb()">  -->

<style type="text/css">
body { padding-top:30px; }
.floating-box {
display: inline-block;
width: 150px;
height: 75px;
margin: 10px;
border: 3px solid #73AD21;  
}
</style>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 20px; }
label{
padding: 0 !important;
text-align: left!important;
font-family: 'Noto Serif', serif;
}

span{
font-size: 1.2em;
font-family: 'Oswald', sans-serif!important;
text-align: left!important;
padding: 0px 10px 0px 0px!important;
/*font-family: 'Noto Serif', serif;*/
font-weight: bold;
color: #414002;
/*margin-bottom: 20px!important;*/

}
hr{
border-top: 1px solid #025198 !important;
border-style: dashed!important;
border-width: 1.2px;
}

.panel-heading{
font-size: 1.3em;
font-family: 'Oswald', sans-serif!important;
letter-spacing: .5px;
}
.btn-primary{
padding: 9px;
}
</style>


<body>

<script type="text/javascript">  
//   $("#dob").focusout(function(){
//     alert();
//   ageCalculator();
// });
function ageCalculator() 
{
// alert('HI');  

debugger;  
var birthdate = document.getElementById('dob').value; // in "dd/MM/yyyy" format  
var senddate = document.getElementById('Date').value; // in "dd/MM/yyyy" format  
var x = birthdate.split("/");  
var y = senddate.split("/");  
var bdays = x[0];  
var bmonths = x[1];  
var byear = x[2];  
//alert(bdays);  
var sdays = y[0];  
var smonths = y[1];  
var syear = y[2];  
// alert(sdays);  
if (sdays < bdays) {  
sdays = parseInt(sdays) + 30;  
smonths = parseInt(smonths) - 1;  
//alert(sdays);  
var fdays = sdays - bdays;  
//alert(fdays);  
}  
else {  
var fdays = sdays - bdays;  
}  
if (smonths < bmonths) {  
smonths = parseInt(smonths) + 12;  
syear = syear - 1;  
var fmonths = smonths - bmonths;  
}  
else {  
var fmonths = smonths - bmonths;  
}  
var fyear = syear - byear; 
var year_to_days = fyear*365; 
var month_to_days = fmonths*30;
var newage = (fyear + ' years ' + fmonths + ' months ' + fdays + ' days');


var newage_year = (year_to_days+month_to_days+fdays);

document.getElementById("age").value = newage;
document.getElementById("age_days").value = newage_year;
// alert(newage);  
// document.getElementById("btnClickedValue").value = newage;
// window.location.href = window.location.href+'?newage='+newage;
}  


</script> 

<script type="text/javascript">
function updateAb(){     

alert('hi');   
}
</script>
<script type="text/javascript">
$(function () 
{
// $('#dob').datepicker({
//     format: 'dd/mm/yyyy',
//     autoclose: true,
//     onSelect: function() {
//              updateAb(selected);
//         }

// });
});
</script>
<!-- all bootstrap buttons classes -->
<!-- 
class="btn btn-sm, btn-lg, "
color - btn-success, btn-primary, btn-default, btn-danger, btn-info, btn-warning
-->



<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container">

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 well">
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="ci_csrf_token" value="" />
    <fieldset>
     
         <legend>

          <div class="row">
            <div class="col-md-8">
              <h4>Welcome : <font color="#025198"><strong>q w <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></strong></font></h4>

            </div>
             
            <div class="col-md-3">

             <a href='#' class='btn btn-sm btn-info pull-right' onclick="get_username('Ma&nbsp;Agarwal', 711)" data-target='#passModal' data-toggle='modal' style="background-color:rgb(25, 226, 25)">Change Password</a>


            </div>
            <div class="col-md-1">
              <a href="logout.php" class="btn btn-sm btn-success  pull-right" style="background-color:rgb(202, 39, 71)">Logout</a>
            </div>
          </div>
        
        
</legend>


      
     
    
<div id="project_show">

<div class="row">
  <div class="col-md-12">

      <label class="col-md-2 control-label" for="adv_num">Advertisement Number *</label>    
      <div class="col-md-4">

      <select id="adv_num" name="adv_num" class="form-control input-md" required="">

          <option value="">Select</option>
          <option selected='selected' value="IITP/FAC-CHEM/2024/MAY/09">IITP/FAC-CHEM/2024/MAY/09</option>
      </select>
        
      </div>

      <label class="col-md-2 control-label" for="doa">Date of Application </label>  
      <div class="col-md-4">
      <input id="doa" name="doa" type="text" readonly="readonly" value="09/05/2024" placeholder="" class="form-control input-md" required="">
     </div>

      <label class="col-md-2 control-label" for="ref_num">Application Number</label>  
      <div class="col-md-4">

      <input id="ref_num" name="ref_num" type="text" readonly="readonly" value="<?php echo $_SESSION['applicant_id']; ?>" placeholder="" class="form-control input-md" required="">
     </div>

      <label class="col-md-2 control-label" for="post">Post Applied for *</label>  
      <div class="col-md-4">
      <select id="post" name="post" class="form-control input-md" required="">
          <option value="">Select</option>
          <option  selected='selected' value="Professor">Professor</option>
          <option   value="Associate Professor">Associate Professor</option>
          <option   value="Assistant Professor Grade I">Assistant Professor Grade I</option>
          <option   value="Assistant Professor Grade II">Assistant Professor Grade II</option>
      </select>
      </div>

      <label class="col-md-2 control-label" for="dept">Department/School *</label>  
      <div class="col-md-4">
      <select id="dept" name="dept" class="form-control input-md" required="">
          <option value="">Select</option>
          <option selected='selected' value="Chemical Engineering">Chemical Engineering</option>
      </select>
        
      </div>
</div>
</div>
<hr>


    <!-- Form Name -->
    
      
    <!-- Text input-->
<!-- <h5><font color="#025198"><strong>1. Name:</strong></font></h5>             -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-success" >
        <div class="panel-heading" style="color: #252527; background-color: #f99090;" >1. Personal Details <small class="pull-right">Upload/Update Photo *</small></div>
          <div class="panel-body" style="height: 390px">
              <div class="col-md-10">
                <div class="row">

                  <span class="col-md-2 control-label" for="fname">First Name *</span>  
                    <div class="col-md-4">
                    <input id="fname"  value = "a" name="fname" type="text" placeholder="First name" class="form-control input-md" maxlength="15" required="">
                  </div>
                

                  <span class="col-md-2 control-label" for="mname">Middle Name</span>  
                    <div class="col-md-4">
                    <input id="mname" value="b" name="mname" name="mname" type="text" placeholder="Middle name" class="form-control input-md" maxlength="12">
                    </div>

                  <span class="col-md-2 control-label" for="lname">Last Name *</span>  
                    <div class="col-md-4">
                    <input id="lname" value="c" name="lname"name="lname" type="text" placeholder="Last name" class="form-control input-md" maxlength="15" required="">
                    </div>


                  <span class="col-md-2 control-label" for="nationality">Nationality *</span>
                  <div class="col-md-4"> 
                    <select id="nationality" name="nationality" class="form-control input-md" required="">
                      <option value="">Select</option>
                      <!-- <option  value=" India"> India</option> -->
                      <option selected='selected' value=" Indian"> Indian</option>
                      <!-- <option  value="PIO">PIO</option> -->
                      <option  value="OCI">OCI</option>
                    </select>
                  </div>



                 <!--  <span class="col-md-2 control-label" for="nationality">Nationality </span>  
                  <div class="col-md-4">
                  <input id="nationality" value=" Indian" name="nationality" type="text" placeholder="Nationality" class="form-control input-md" maxlength="15" required="">
                  </div> -->

                  <span class="col-md-2 control-label" for="dob">Date of Birth DD/MM/YYYY *</span>  
                  <div class="col-md-4">
                   <!--  <p id="dobdiv"> -->
                  <input id="dob" name="dob" value="25/10/1991"  type="text" placeholder="DD/MM/YYYY" class="form-control input-md" required="" onfocusout = "ageCalculator()">
                <!-- </p> -->

                  <input type="hidden" name="Date" id="Date" value ="31/08/2023" />
                  <!-- <br/> 
                  <input type="hidden" id="btnClickedValue" name="btnClickedValue" value="" />
                  <button type="Button" onclick="ageCalculator()">Calculate</button >   -->

                    
                  </div>

                 <!--  <span class="col-md-2 control-label" for="age">Age</span>  
                  <div class="col-md-4">
                  <input id="age" name="age"  value="" type="text" class="form-control input-md" readonly>

                  <input id="age_days" name="age_days"  value="0" type="hidden" class="form-control input-md" readonly>
                  </div> -->

                 
                  <span class="col-md-2 control-label" for="gender">Gender *</span>
                  <div class="col-md-4"> 
                    <select id="gender" name="gender" class="form-control input-md" required="">
                      <option value="">Select</option>
                      <option selected='selected' value="Male">Male</option>
                      <option  value="Female">Female</option>
                      <option  value="Other">Other</option>
                    </select>
                  </div>


                  <span class="col-md-2 control-label" for="mstatus">Marital Status *</span>
                  <div class="col-md-4"> 
                    <select id="mstatus" name="mstatus" class="form-control input-md" required="">
                      <option value="">Select</option>
                      <option selected='selected' value="Married">Married</option>
                      <option  value="Unmarried">Unmarried</option>
                      <option  value="Other">Other</option>
                    </select>
                  </div>

                  <span class="col-md-2 control-label" for="cast">Category</span>
                  <div class="col-md-4"> 
                    <input id="cast" name="cast" type="text" placeholder="cast" readonly='readonly' value="UR" class="form-control input-md" required="">
                  </div>

                 <!--  <span class="col-md-2 control-label" for="disability_type">Type of Disability</span>
                  <div class="col-md-4"> 
                    <input id="disability_type" value="" name="disability_type"name="disability_type" type="text" placeholder="Type of Disability" class="form-control input-md" required="">
                  </div>
                     -->

                 <!--  <div class="col-md-6"> 
                  </div> -->
                </div>

                <div class="row">
                  <span class="col-md-2 control-label" for="mstatus">ID Proof *</span>
                  <div class="col-md-4"> 
                   
                      <select id="id_proof" name="id_proof" class="form-control input-md" required="">
                      <option value="">Select</option>
                       <!-- <option value="">Select</option> -->
                      <!--  <option value="AADHAR">AADHAR</option>
                       <option value="PAN-CARD">PAN-CARD</option>
                       <option value="DRIVING-LICENSE">DRIVING-LICENSE</option>
                       <option value="PASSPORT">PASSPORT</option>
                       <option value="OTHER">OTHER</option> -->


                      <option selected='selected' value="AADHAR">AADHAR</option>
                      <option  value="PAN-CARD">PAN-CARD</option>
                      <option  value="DRIVING-LICENSE">
                      DRIVING-LICENSE</option>
                      <option  value="VOTER ID">VOTER ID</option>
                      <option  value="PASSPORT">PASSPORT</option>
                      <option  value="RATION CARD">RATION CARD</option>
                      
                      <option  value="OTHERS">OTHERS</option>
                    </select>
                  </div>

                 
                  
                                        <span class="col-md-2 control-label" for="cast">Update ID Proof</span>
                    <div class="col-md-2"> 
                         <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_1712499883641930.png" class="btn btn-sm btn-success" target="_blank">View Uploaded File </a>
                    </div>
                     <div class="col-md-2"> 
                       <input id="id_card_file" name="userfile2" type="file" class="form-control input-md">
                    </div>
                     
                    
                    <span class="col-md-2 control-label" for="father_name">Father's Name *</span>  
                      <div class="col-md-4">
                      <input id="father_name" value="e" name="father_name"name="father_name" type="text" placeholder="Father's Name" class="form-control input-md" maxlength="30" required="">
                      </div>
                  </div>
            </div>

        <div class="col-md-2 pull-right">
                      <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_1712509741119618.png" class="thumbnail pull-right" height="150" width="130" />
            <input id="photo" name="userfile" type="file" class="form-control input-md">
          
         
        </div>
        </div>
      </div>
    </div>
  </div>




<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<!-- <div class="panel-heading">2. Address *</div> -->
<div class="panel-body">
    <div class="row">
      <div class="col-md-6">
        <span class="control-label" for="cadd">Correspondence Address </span>
        <br />
        <br />
       <textarea style="height:40px" placeholder="Street" class="form-control input-md" name="cadd" maxlength="200" required="">3082 Armand Course</textarea>

       <textarea style="height:40" placeholder="City" class="form-control input-md" name="cadd1" maxlength="200" required="">Severn</textarea>

       <textarea style="height:40" placeholder="State" class="form-control input-md" name="cadd2" maxlength="200" required="">New York</textarea>

       <textarea style="height:40" placeholder="Country" class="form-control input-md" name="cadd3" maxlength="200" required="">Nepal</textarea>

       <textarea style="height:40;" placeholder="PIN/ZIP" class="form-control input-md" name="cadd4" maxlength="6" required="">68812-</textarea>


      </div>


      <div class="col-md-6">
        <span class="control-label" for="padd">Permanent Address </span>
        <br />
        <br />
       <textarea style="height:40px" placeholder="Street" class="form-control input-md" name="padd" maxlength="200" required="">3977 Bogan Spurs</textarea>

       <textarea style="height:40" placeholder="City" class="form-control input-md" name="padd1" maxlength="200" required="">Bozeman</textarea>

       <textarea style="height:40" placeholder="State" class="form-control input-md" name="padd2" maxlength="200" required="">California</textarea>

       <textarea style="height:40" placeholder="Country" class="form-control input-md" name="padd3" maxlength="200" required="">Papua New Guinea</textarea>


       <textarea style="height:40;" placeholder="PIN/ZIP" class="form-control input-md" name="padd4" maxlength="6" required="">55087-</textarea>

    
      </div>

    </div>

      
    </div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<!-- <div class="panel-heading">3. Contact Details (with STD/ISD code)</div> -->
<div class="panel-body">
  <span class="col-md-2 control-label" for="mobile">Mobile *</span>  
  <div class="col-md-4">
  <input id="mobile" value="84639204" name="mobile" type="text" placeholder="Mobile" class="form-control input-md" required="" maxlength="20">
  </div>

  

  <span class="col-md-2 control-label" for="email">Email</span>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="email" readonly='readonly' value= "<?php echo $_SESSION['email']; ?>" class="form-control input-md" required="">
  </div>

  <span class="col-md-2 control-label" for="mobile_2">Alternate Mobile </span>  
  <div class="col-md-4">
  <input id="mobile_2" value="123235345" name="mobile_2" type="text" placeholder="Alternate Mobile " class="form-control input-md" maxlength="20">
  </div>

  <span class="col-md-2 control-label" for="email_2">Alternate Email </span>  
  <div class="col-md-4">
  <input id="email_2" value="email123@gmail.com" name="email_2" type="email" placeholder="Alternate Email" class="form-control input-md">
  </div> 
  
 
  <span class="col-md-2 control-label" for="landline">Landline Number</span>  
  <div class="col-md-4">
  <input id="landline" value="5113523" name="landline" type="text" placeholder="Landline Number" class="form-control input-md" maxlength="20">
  </div> 
  
  

</div>
</div>
</div>
</div>

<div class="form-group">

<div class="col-md-12">
<button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE & NEXT</button>
</div>

</div>

<!-- add the div for hide -->
</div>
</div>

</fieldset>
</form>


</div>
</div>


<div id="passModal" class="modal fade" role="dialog">
<form action="loginpage.php" method="post">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h2>Change Password</h2>

    </div>
    <div class="modal-body">
        <h3>Change Password For : <font color="#3377a0"><strong id="username_mod"></strong></font></h3>
        <input type="hidden" name="fid" id="fid" value="" />
        <div class="form-group">
            <label>Current Password</label>
            <input type="password" name="cr_password" placeholder="Current Password" class="form-control"/>
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" name="n_password" placeholder="New Password" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="cn_password" placeholder="New Confirm Password" class="form-control"/>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" name="submit" value="Submit" class="btn btn-info" >Submit</button>
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
</form>
</div>


<script type="text/javascript">
  $(document).ready(function(){

    var show_status = '0';
    if(show_status==1){
      show1();
    }

  });
function get_username(u, fid)
{
document.getElementById("username_mod").innerHTML=u;
// document.getElementById("fname").value=u;
document.getElementById("fid").value=fid;
}
// function form_submit(a, b)
// {
//     window.location="https://ofa.iiti.ac.in/facrec_che_2023_july_02/news/change/"+a+"/"+b;
// }
</script>


<script type="text/javascript">
   function show_none()
   {
   // alert("Hello! I am an alert box!!");
   document.getElementById('project_show').style.display ='none';
   }

   function show1()
   {
   // alert("Hello! I am an alert box!!");
   document.getElementById('project_show').style.display = 'block';
   }
</script>

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