<?php

$server = "localhost";
$username = "root";
$password = "mysql123";
$database = "mydatabase";

$conn = mysqli_connect($server, $username, $password, $database,3307);
session_start();


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
$sql="CREATE TABLE IF NOT EXISTS `refrees` (`applicant_id` INT(5) NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `position` VARCHAR(50) NOT NULL , `assosciation` VARCHAR(50) NOT NULL , `institution` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `contact` VARCHAR(11) NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB;";
mysqli_query($conn,$sql);

?>



<?php
if(isset($_FILES['userfile7'])&& $_FILES['userfile2']['type'] === 'application/pdf') {
    $userfile7 = $_FILES['userfile7'];
    $filename = $_FILES['userfile7']['name'];
    $temp = $_FILES['userfile7']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile'])&& $_FILES['userfile']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile'];
    $filename = $_FILES['userfile']['name'];
    $temp = $_FILES['userfile']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile1'])&& $_FILES['userfile1']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile1'];
    $filename = $_FILES['userfile1']['name'];
    $temp = $_FILES['userfile1']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile2'])&& $_FILES['userfile2']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile2'];
    $filename = $_FILES['userfile2']['name'];
    $temp = $_FILES['userfile2']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile3'])&& $_FILES['userfile3']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile3'];
    $filename = $_FILES['userfile3']['name'];
    $temp = $_FILES['userfile3']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile4'])&& $_FILES['userfile4']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile4'];
    $filename = $_FILES['userfile4']['name'];
    $temp = $_FILES['userfile4']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile9'])&& $_FILES['userfile9']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile9'];
    $filename = $_FILES['userfile9']['name'];
    $temp = $_FILES['userfile9']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile10'])&& $_FILES['userfile10']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile10'];
    $filename = $_FILES['userfile10']['name'];
    $temp = $_FILES['userfile10']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile8'])&& $_FILES['userfile8']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile8'];
    $filename = $_FILES['userfile8']['name'];
    $temp = $_FILES['userfile8']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile6'])&& $_FILES['userfile6']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile6'];
    $filename = $_FILES['userfile6']['name'];
    $temp = $_FILES['userfile6']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
if(isset($_FILES['userfile5'])&& $_FILES['userfile5']['type'] === 'application/pdf') {
    $userfile = $_FILES['userfile5'];
    $filename = $_FILES['userfile5']['name'];
    $temp = $_FILES['userfile5']['tmp_name']; // Corrected index from 'temp' to 'tmp_name'
    $fileext = explode('.', $filename);
    $fileactual = strtolower(end($fileext));
    $newfilename = uniqid('', true) . "." . $fileactual;
    $filedest = 'files_proj/' . $newfilename;
    move_uploaded_file($temp, $filedest);
}
?>

<?php

if(isset($_POST['ref_name'], $_POST['position'], $_POST['association_referee'], $_POST['org'], $_POST['email'],$_POST['phone'])) {
    $names = $_POST['ref_name'];
    $positions = $_POST['position'];
    $associations = $_POST['association_referee'];
    $orgs = $_POST['org'];
    $emails = $_POST['email'];
    $phones = $_POST['phone'];
    

    // Prepare and execute query
    foreach ($names as $key => $author) {
        $name = $names[$key];
        $position = $positions[$key];
        $association=$associations[$key];
        $org=$orgs[$key];
        $email=$emails[$key];
        $phone = $phones[$key];
       

        $sql ="INSERT INTO `refrees` (`name`, `position`, `assosciation`, `institution`, `email`, `contact`)
                VALUES ('$name', '$position', '$association', '$org', '$email', '$phone')";

        if(mysqli_query($conn, $sql)) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    header("location: page9payment.php");
}
?>

<html>
<head>
	<title>Referees & Upload</title>
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
            text-align: center;" class="blink_me">Application for Faculty Position</h3>

<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
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
.form-control { margin-bottom: 10px; }
label{
  padding: 10 !important;
  text-align: left!important;
  margin-top: -5px;
  font-family: 'Noto Serif', serif;
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

.panel-info .panel-heading{
  font-size: 1.1em;
  font-family: 'Oswald', sans-serif!important;
  padding-top: 5px;
  padding-bottom: 5px;
}

.panel-danger .panel-heading{
  font-size: 1.1em;
  font-family: 'Oswald', sans-serif!important;
  padding-top: 5px;
  padding-bottom: 5px;
}

.btn-primary {
  padding: 9px;
}

.Acae_data
{
  font-size: 1.1em;
  font-weight: bold;
  color: #414002;
}


.upload_crerti
{
  font-size: 1.1em;
  font-weight: bold;
  color: red;
  text-align: center;
}

.update_crerti
{
  font-size: 1.1em;
  font-weight: bold;
  color: green;
  text-align: center;
}
p
{
  padding-top: 10px;
}
</style>

<!-- all bootstrap buttons classes -->
<!-- 
  class="btn btn-sm, btn-lg, "
  color - btn-success, btn-primary, btn-default, btn-danger, btn-info, btn-warning
-->



<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container">
  
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 well">
            
              
            <fieldset>
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                        <h4>Welcome : <font color="#025198"><strong>q w <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></strong></font></h4>
                    </div>
                    <div class="col-md-2">
                      <a href="logout.php" class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>
       </fieldset>



<!-- publication file upload           -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">


   <!-- Reprints of 5 Best Research Papers  -->

  <h4 style="text-align:center; font-weight: bold;color: #252527;">20. Reprints of 5 Best Research Papers *</h4>
   <div class="row">

                        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading" style="color: #252527; background-color: #f99090;">Upload 5 Best Research Papers in a single PDF < 6MB 
             <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_best_5_1698348500400839.pdf" class="btn-sm btn-info " target="_blank" style="background-color: #4dad32;">View Uploaded File </a>
              <br />
              <br />
             
           </div>
              <div class="panel-body">
                <div class="col-md-5">
                <p class="update_crerti">Update 5 best papers</p>
                </div>
                <div class="col-md-7">
                 <input id="full_5_paper" name="userfile7" type="file" class="form-control input-md">
               </div>
            </div>
          </div>
        </div>

                
  </div>

 
 
<!-- certificate file code start -->
<h4 style="text-align:center; font-weight: bold;color: #252527;">21. Check List of the documents attached with the online application *</h4>

<div class="row">
  <div class="col-md-12">
  <div class="panel panel-success">
  <div class="panel-heading" style="color: #252527; background-color: #f99090;">Check List of the documents attached with the online application (Documents should be uploaded in PDF format only):
    <br />
    <small style="color: red;">Uploaded PDF files will not be displayed as part of the printed form.</small>
  </div>
    <div class="panel-body">
      <div class="row">
  
        <!-- <form action="https://ofa.iiti.ac.in/facrec_che_2023_july_02/submission_complete/upload" method="post" enctype="multipart/form-data"> -->
        <input type="hidden" name="ci_csrf_token" value="" />
     
     <!-- phd certificate  -->
      <div class="col-md-4">
    <div class="panel panel-info">
      <div class="panel-heading" style="color: #252527; background-color: #f99090;">PHD Certificate <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_phd_1710217017606200.txt" class="btn-sm btn-info " target="_blank" style="background-color: #4dad32;">View Uploaded File </a></div>
        <div class="panel-body">
          <p class="update_crerti" style="color: #252527;">Update PHD Certificate</p>
           <input id="phd" name="userfile" type="file" class="form-control input-md">
      </div>
    </div>
  </div>

        
         

     <!-- Master certificate  -->


                  <div class="col-md-4">
        <div class="panel panel-info">
          <div class="panel-heading" style="color: #252527; background-color: #f99090;">PG Documents <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_pg_1698348500301777.pdf" class="btn-sm btn-info " target="_blank" style="background-color: #4dad32;">View Uploaded File </a></div>
            <div class="panel-body">
              <p class="update_crerti" style="color: #252527;">Update All semester/year-Marksheets and degree certificate</p>
               <input id="post_gr" name="userfile1" type="file" class="form-control input-md">
          </div>
        </div>
      </div>

            
              

 
 <!-- Bachelor certificate  -->


      <div class="col-md-4">
    <div class="panel panel-info">
      <div class="panel-heading" style="color: #252527; background-color: #f99090;">UG Documents <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_ug_1698348500524069.pdf" class="btn-sm btn-info " target="_blank" style="background-color: #4dad32;">View Uploaded File </a></div>
        <div class="panel-body">
          <p class="update_crerti" style="color: #252527;">Update All semester/year-Marksheets and degree certificate  </p>
           <input id="under_gr" name="userfile2" type="file" class="form-control input-md">
      </div>
    </div>
  </div>

             


      <!-- 12th certificate  -->


                     <div class="col-md-4">
         <div class="panel panel-info">
           <div class="panel-heading" style="color: #252527; background-color: #f99090;">12th/HSC/Diploma Documents <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_higher_sec_1698348500466228.pdf" class="btn-sm btn-info " target="_blank" style="background-color: #4dad32;">View Uploaded File </a></div>
             <div class="panel-body">
               <p class="update_crerti" style="color: #252527;">Update 12th/HSC/Diploma/Marksheet(s) and passing certificate</p>
                <input id="higher_sec" name="userfile3" type="file" class="form-control input-md">
           </div>
         </div>
       </div>

                  



   <!-- 10th certificate  -->


            <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading" style="color: #252527; background-color: #f99090;">10th/SSC Documents <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_ssc_1698348500412346.pdf" class="btn-sm btn-info " target="_blank" style="background-color: #4dad32;">View Uploaded File </a></div>
          <div class="panel-body">
            <p class="update_crerti" style="color: #252527;">Update 12th/HSC/Diploma/Marksheet(s) and passing certificate</p>
             <input id="high_school" name="userfile4" type="file" class="form-control input-md">
        </div>
      </div>
    </div>

            


    <!-- Pay Slip -->

            <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading" style="color: #252527; background-color: #f99090;">Pay Slip <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_pay_slip_1698348500435939.pdf" class="btn-sm btn-info " target="_blank" style="background-color: #4dad32;">View Uploaded File </a></div>
          <div class="panel-body">
            <p class="update_crerti" style="color: #252527;">Update Pay Slip</p>
             <input id="pay_slip" name="userfile9" type="file" class="form-control input-md">
        </div>
      </div>
    </div>

            

<!-- Under Taking NOC -->

<!-- Pay Slip -->

<div class="col-md-6">
  <div class="panel panel-info">
    <div class="panel-heading" style="color: #252527; background-color: #f99090;">NOC or Undertaking <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_noc_under_1698348500805484.pdf" class="btn-sm btn-info " target="_blank" style="background-color: #4dad32;">View Uploaded File </a></div>
      <div class="panel-body">
        <p class="update_crerti" style="color: #252527;">Undertaking-in case, NOC is not available at the time of application but will be provided at the time of interview</p>
         <input id="noc_under" name="userfile10" type="file" class="form-control input-md">
    </div>
  </div>
</div>

       
        <!-- 10 years post phd exp certificate  -->

                           <div class="col-md-5">
           <div class="panel panel-info">
             <div class="panel-heading" style="color: #252527; background-color: #f99090;">Post phd Experience Certificate/All Experience Certificates/ Last Pay slip/ 
              <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_post_phd_1698348500762045.pdf" class="btn-sm btn-info " target="_blank" style="background-color: #4dad32;">View Uploaded File </a>
              <br />

             </div>
               <div class="panel-body">
                 <p class="update_crerti" style="color: #252527; background-color: #f99090;">Update Certificate</p>
                  <input id="post_phd_10" name="userfile8" type="file" class="form-control input-md">
             </div>
           </div>
         </div>

                 


       

     <!-- Misc certificate  -->


            
          <div class="col-md-12">
            <div class="panel panel-info">
          <div class="panel-heading" style="color: #252527; background-color: #f99090;" >Upload any other relevant document in a single PDF (For example award certificate, experience certificate etc) . If there are multiple documents, combine all the documents in a single PDF) <1MB. </div>
              <div class="panel-body">
                <div class="col-md-5">
                  <p class="upload_crerti" style="color: #252527;" >Upload any other document</p>
                </div>
                <div class="col-md-7">
                <input id="misc_certi" name="userfile6" type="file" class="form-control input-md">
                </div>
            </div>
          </div>
        </div>
              





        <div class="col-md-2"> 
        <!-- <input type="submit" value="Upload" name="upload_submit" class="btn btn-danger" required="" /> -->
        <!-- <br /><br /> -->
        </div>
      <!-- </form> -->
      </div> 

      
    
   </div>
  </div>
<!-- </div> -->

</div>
</div>



<!-- Signature certificate  -->

<div class="row">
   <div class="col-md-4">
   <div class="panel panel-danger">
     <div class="panel-heading" style="color: #252527; background-color: #f99090;">Upload your Signature in JPG only 
      <!-- <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_sign_1698348500838566.jpg" class="btn-sm btn-info " target="_blank">View Uploaded File </a> -->
    </div>
       <div class="panel-body">
         <!-- <p class="update_crerti">Update your signature</p> -->
         <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/attach/711_Ma_Agarwal_1698348165/711_sign_1698348500838566.jpg" style="height: 52px; width: 100px; margin-top: -10px;">
          <input id="signature" name="userfile5" type="file" class="form-control input-md">
     </div>
     <p class="upload_crerti"></p>
   </div>
 </div>

         

   <div class="col-md-12">
  
   </div>

</div>

<h4 style="text-align:center; font-weight: bold;color: #252527;">22. Referees *</h4>

       <div class="row">
       <div class="col-md-12">
         <div class="panel panel-success">
         <div class="panel-heading" style="color: #252527; background-color: #f99090;">Fill the Details</div>
           <div class="panel-body">
             <table class="table table-bordered">
                 <tbody id="acde">
                 
                 <tr height="30px">
                   <th class="col-md-2"> Name </th>
                   <th class="col-md-3"> Position </th>
                   <th class="col-md-3"> Association with Referee</th>
                   <th class="col-md-3"> Institution/Organization</th>
                   <th class="col-md-2"> E-mail </th>
                   <th class="col-md-2"> Contact No.</th>
                 </tr>
                 
                 
               

                 <tr height="60px">
                   <td class="col-md-2">  
                       <input id="ref_name1" name="ref_name[]" type="text" value="uYolanda Cummerata" placeholder="Name" class="form-control input-md" required="" autofocus=""> 
                   </td>

                   <td class="col-md-2"> 
                       <input id="position1" name="position[]" type="text" value="Ullam illum alias neque."  placeholder="Position" class="form-control input-md" required=""> 
                     </td>

                   <td class="col-md-2"> 
                     <select id="association_referee1" name="association_referee[]" class="form-control input-md" required="">

                       <option value="">Select</option>
                       <option  value="Thesis Supervisor">Thesis Supervisor</option>
                       <option  value="Postdoc Supervisor">Postdoc Supervisor</option>
                       <option selected='selected' value="Research Collaborator">Research Collaborator</option>
                       <option  value="Other">Other</option>
                     </select>
                     </td>

                 
                    <td class="col-md-2"> 
                     <input id="org1" name="org[]" type="text" value="Vitae voluptate temporibus minima architecto nisi assumenda."  placeholder="Institution/Organization" class="form-control input-md" required=""> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="email1" name="email[]" type="email" value="your.email+fakedata18670@gmail.com"  placeholder="E-mail" class="form-control input-md" required=""> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="phone1" name="phone[]" type="text" value="656-293-5557"  placeholder="Contact No." class="form-control input-md" maxlength="20" required=""> 
                   </td>

                   
                 </tr>
                 
               

                 <tr height="60px">
                   <td class="col-md-2">  
                       <input id="ref_name2" name="ref_name[]" type="text" value="Ansel Hamill" placeholder="Name" class="form-control input-md" required="" autofocus=""> 
                   </td>

                   <td class="col-md-2"> 
                       <input id="position2" name="position[]" type="text" value="Architecto placeat saepe qui consectetur doloremque hic."  placeholder="Position" class="form-control input-md" required=""> 
                     </td>

                   <td class="col-md-2"> 
                     <select id="association_referee2" name="association_referee[]" class="form-control input-md" required="">

                       <option value="">Select</option>
                       <option selected='selected' value="Thesis Supervisor">Thesis Supervisor</option>
                       <option  value="Postdoc Supervisor">Postdoc Supervisor</option>
                       <option  value="Research Collaborator">Research Collaborator</option>
                       <option  value="Other">Other</option>
                     </select>
                     </td>

                 
                    <td class="col-md-2"> 
                     <input id="org2" name="org[]" type="text" value="Harum quidem similique sint."  placeholder="Institution/Organization" class="form-control input-md" required=""> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="email2" name="email[]" type="email" value="your.email+fakedata30661@gmail.com"  placeholder="E-mail" class="form-control input-md" required=""> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="phone2" name="phone[]" type="text" value="420-771-6231"  placeholder="Contact No." class="form-control input-md" maxlength="20" required=""> 
                   </td>

                   
                 </tr>
                                  
              
               </tbody>
             </table>

         </div>
       </div>
       </div>
       </div>

<!-- Payment file upload           -->



<!-- Referees Details -->


<input type="hidden" name="ci_csrf_token" value="" />
    
 
<hr> 
<div class="form-group">
<div class="col-md-10">
  <!-- <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/acde" class="btn btn-primary pull-left">BACK</a> -->
  <a href="page7relinfo.php" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-fast-backward"></i></a>
  
  <!-- <button type="submit" name="submit" value="Submit" class="btn btn-success">SAVE</button> -->


</div>

<div class="col-md-2">
  <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE & NEXT</button>
  <!-- <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">Final Submission</button> -->

</div>


</div>

</form>
</div> 
</div>
<script type="text/javascript">
function confirm_box()
{
  if(confirm("Dear Candidate, \n\nAre you sure that you are ready to submit the application? Press OK to submit the application. Press CANCEL to edit. \nOnce you press OK you cannot make any changes.\n\nThank you."))
  {
    return true;
  }
  else
  {
    return false;
  }
}
function submit_frm()
{
  alert();
  document.getElementById("upload_frm").submit();
}
</script>



<script type="text/javascript">
  $(document).ready(function () 
  {
   
    var list1 = document.getElementById('applicant_cate');
     
    list1.options[0] = new Option('Select/Category', '');
    list1.options[1] = new Option('Other Applicants', 'Other Applicants');
    list1.options[2] = new Option('OBC-NC, PwD, EWS and Female Applicants', 'OBC-NC, PwD, EWS and Female Applicants');
    list1.options[3] = new Option('SC, ST and Faculty Applicants from IIT Indore', 'SC, ST and Faculty Applicants from IIT Indore');
   

    $("#applicant_cate option").each(function()
    {

           if($(this).val()==selectoption){
        $(this).attr('selected', 'selected');
      }
      // Add $(this).val() to your list
    });

    getFoodItem();
      $("#payment_amount option").each(function()
    {

           if($(this).val()==selectsubthemeoption){
        $(this).attr('selected', 'selected');
      }
      // Add $(this).val() to your list
    });
  });

  
  function getFoodItem()
  {
 
    var list1 = document.getElementById('applicant_cate');
    var list2 = document.getElementById("payment_amount");
    var list1SelectedValue = list1.options[list1.selectedIndex].value;


    if (list1SelectedValue=='Other Applicants')
    {
         
        // list2.options.length=0;
        // list2.options[0] = new Option('Select Amount', '');
        list2.options[0] = new Option('INR 1000', 'INR 1000');
        
         
    }
    else if (list1SelectedValue=='OBC-NC, PwD, EWS and Female Applicants')
    {
         
        // list2.options.length=0;
        // list2.options[0] = new Option('Select Amount', '');
        list2.options[0] = new Option('INR 500', 'INR 500');
       
         
    }

    else if (list1SelectedValue=='SC, ST and Faculty Applicants from IIT Indore')
    {
         
        // list2.options.length=0;
        // list2.options[0] = new Option('Select Amount', '');
        list2.options[0] = new Option('NIL', 'NIL');
       
         
    }


    
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