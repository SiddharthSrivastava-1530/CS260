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
$sql="CREATE TABLE IF NOT EXISTS `edu_pg_details` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `college` VARCHAR(255) NOT NULL , `subjects` VARCHAR(255) NOT NULL , `degree` VARCHAR(255) NOT NULL , `yog` VARCHAR(255) NOT NULL , `yoj` VARCHAR(255)  NOT NULL , `duration` INT NOT NULL , `percentage` INT NOT NULL , `rank` INT NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

$sql="CREATE TABLE IF NOT EXISTS `edu_ug_details` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `college` VARCHAR(255) NOT NULL , `subjects` VARCHAR(255) NOT NULL , `degree` VARCHAR(255) NOT NULL , `yog` VARCHAR(255) NOT NULL , `yoj` VARCHAR(255) NOT NULL , `duration` INT NOT NULL , `percentage` INT NOT NULL , `rank` INT NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

$sql="CREATE TABLE IF NOT EXISTS`edu_school_details` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `hsc` VARCHAR(255) , `percentage` INT NOT NULL , `rank` INT NOT NULL , `passing_year` INT NOT NULL , `school` VARCHAR(255) NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

$sql="CREATE TABLE IF NOT EXISTS`edu_additional_details` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `college` VARCHAR(255) NOT NULL , `subjects` VARCHAR(255) NOT NULL , `degree` VARCHAR(255) NOT NULL , `yog` VARCHAR(255) NOT NULL , `yoj` VARCHAR(255) NOT NULL , `duration` INT NOT NULL , `percentage` INT NOT NULL , `rank` INT NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

$sql="CREATE TABLE IF NOT EXISTS`edu_phd_details` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `university/institute` VARCHAR(255) NOT NULL , `phd_supervisor` VARCHAR(255) NOT NULL , `title` VARCHAR(255) NOT NULL , `dept` VARCHAR(255) NOT NULL , `yoj` VARCHAR(255) NOT NULL , `date_of_award` DATE NOT NULL , `date_of_defence` DATE NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);
?>
<?php
if(isset($_POST['college_phd'], $_POST['supervisor'], $_POST['phd_title'], $_POST['stream'], $_POST['yoj_phd'], $_POST['doa_phd'], $_POST['dod_phd'])) {
    $phd_college = $_POST['college_phd'];
    $phd_supervisor = $_POST['supervisor'];
    $title = $_POST['phd_title'];
    $dept = $_POST['stream'];
    $yoj = $_POST['yoj_phd'];
    $date_of_award = date('Y-m-d', strtotime($_POST['doa_phd']));
    $date_of_defence = date('Y-m-d', strtotime($_POST['dod_phd']));
    

    // Prepare and execute query
    $sql = "INSERT INTO `edu_phd_details` (`university/institute`, `phd_supervisor`, `title`, `dept`, `yoj`, `date_of_award`, `date_of_defence`)
            VALUES ('$phd_college', '$phd_supervisor', '$title', '$dept', '$yoj', '$date_of_award', '$date_of_defence')";
    if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    
} else {
    echo "All fields are required.";
}
?>
<?php
if(isset($_POST['pg_college'], $_POST['pg_subjects'], $_POST['pg_degree'], $_POST['pg_yog'], $_POST['pg_yoj'], $_POST['pg_duration'], $_POST['pg_perce'], $_POST['pg_rank'])) {
    $college = $_POST['pg_college'];
    $subjects = $_POST['pg_subjects'];
    $degree=$_POST['pg_degree'];
    $yog=$_POST['pg_yog'];
    $yoj = $_POST['pg_yoj'];
    $duration=$_POST['pg_duration'];
    $percentage=$_POST['pg_perce'];
    $rank=$_POST['pg_rank'];
    

    // Prepare and execute query
    $sql = "INSERT INTO `edu_pg_details` (`college`, `subjects`, `degree`, `yog`, `yoj`, `duration`, `percentage`,`rank` )
            VALUES ('$college', '$subjects', '$degree', '$yog', '$yoj', '$duration', '$percentage','$rank')";
    if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    
} else {
    echo "All fields are required.";
}
?>
<?php
if(isset($_POST['ug_college'], $_POST['ug_subjects'], $_POST['ug_degree'], $_POST['ug_yog'], $_POST['ug_yoj'], $_POST['ug_duration'], $_POST['ug_perce'],$_POST['ug_rank'])) {
    $college = $_POST['ug_college'];
    $subjects = $_POST['ug_subjects'];
    $degree=$_POST['ug_degree'];
    $yog=$_POST['ug_yog'];
    $yoj = $_POST['ug_yoj'];
    $duration=$_POST['ug_duration'];
    $percentage=$_POST['ug_perce'];
    $rank=$_POST['ug_rank'];
    

    // Prepare and execute query
    $sql = "INSERT INTO `edu_ug_details` (`college`, `subjects`, `degree`, `yog`, `yoj`, `duration`, `percentage`,`rank` )
            VALUES ('$college', '$subjects', '$degree', '$yog', '$yoj', '$duration', '$percentage','$rank')";
    if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    
} else {
    echo "All fields are required.";
}
?>

<?php
if(isset($_POST['s_perce'], $_POST['s_rank'], $_POST['passing_year'], $_POST['school'])) {
  $hsc = $_POST['hsc_ssc'];
  $percentage = $_POST['s_perce'];
  $rank = $_POST['s_rank'];
  $passing_year = $_POST['passing_year'];
  $school = $_POST['school'];

  

  // Iterate over the arrays and insert each value individually
  foreach ($percentage as $key => $value) {
      // Prepare and execute query
      $sql = "INSERT INTO `edu_school_details` (`hsc`, `percentage`, `rank`, `passing_year`, `school` )
              VALUES ('$hsc[$key]', '$value', '$rank[$key]', '$passing_year[$key]', '$school[$key]')";
      if(mysqli_query($conn, $sql)) {
          echo "Record inserted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  }

  
} else {
  echo "All fields are required.";
}


?>
<?php
if(isset($_POST['add_college'], $_POST['add_subjects'], $_POST['add_degree'], $_POST['add_yog'], $_POST['add_yoj'], $_POST['add_duration'], $_POST['add_perce'],$_POST['add_rank'])) {
  $college = $_POST['add_college'];
  $subjects = $_POST['add_subjects'];
  $degree = $_POST['add_degree'];
  $yog = $_POST['add_yog'];
  $yoj = $_POST['add_yoj'];
  $duration = $_POST['add_duration'];
  $percentage = $_POST['add_perce'];
  $rank = $_POST['add_rank'];
    

    // Prepare and execute query
    foreach ($percentage as $key => $value) {
    $sql = "INSERT INTO `edu_additional_details` (`college`, `subjects`, `degree`, `yog`, `yoj`, `duration`, `percentage`,`rank` )
            VALUES ('$college[$key]', '$subjects[$key]', '$degree[$key]', '$yog[$key]', '$yoj[$key]', '$duration[$key]', '$percentage[$key]','$rank[$key]')";
    if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
  header("location: page3empdet.php");
    
} else {
    echo "All fields are required.";
}
?>

<html>
<head>
	<title>Academic Details</title>
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
			<h3 style="color: #515e5e; margin-bottom: 20px; font-weight: bold; text-align: center;font-family: 'Noto Serif', serif;" class="blink_me">Application for Faculty Position</h3>


<script type="text/javascript">
var tr="";
var counter_acde=4;
  $(document).ready(function(){
    $("#add_more_acde").click(function(){
        create_tr();
        create_input('add_degree[]', 'Degree','add_degree'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_college[]', 'College', 'add_college'+counter_acde,'acde', counter_acde, 'acde');
        create_input('add_subjects[]', 'Subjects', 'add_subjects'+counter_acde,'acde', counter_acde, 'acde');
        create_input('add_yoj[]', 'Year Of Joining', 'add_yoj'+counter_acde,'acde', counter_acde, 'acde');
        create_input('add_yog[]', 'Year Of Graduation','add_yog'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_duration[]', 'Duration','add_duration'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_perce[]', 'Percentage','add_perce'+counter_acde, 'acde', counter_acde, 'acde');
        create_input('add_rank[]', 'Rank', 'add_rank'+counter_acde,'acde', counter_acde,'acde',true);
        counter_acde++;
        return false;
    });
    
  });

  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

  }
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, datepicker_set=false, length=80)
  {
    var input=document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("name", t_name);
    input.setAttribute("id", id);
    input.setAttribute("placeholder", place_value);
    input.setAttribute("class", "form-control input-md");
    input.setAttribute("required", "");
    if(datepicker_set==true)
    {
      input=for_date_picker(input);
    }
    var td=document.createElement("td");
    td.appendChild(input);
    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"')");
      but.innerHTML="<span style='color:red; font-weight:bold;'>x</span>";
      td.appendChild(but);
    }
    tr.setAttribute("id", "row"+counter);
    tr.appendChild(td);
    document.getElementById(tbody_id).appendChild(tr);
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });
  } 
  function remove_row(remove_name, n)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
  }
</script>

<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    });
</script>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
.floating-box {
    display: inline-block;
    width: 150px;
    height: 75px;
    margin: 10px;
    border: 3px solid #57bf71;  
}
</style>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
label{
  padding: 0 !important;
}
hr{
  border-top: 1px solid #0c0c0c !important;
}
span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
  margin-bottom: 20px!important;/

}
hr{
  border-top: 1px solid #090909 !important;
  border-style: dashed!important;
  border-width: 1.2px;
}

.panel-heading{
  font-size: 1.3em;
  font-family: 'Oswald', sans-serif!important;
  letter-spacing: .5px;
}
.btn-primary {
  padding: 9px;
}
</style>





<div class="container">




<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 well">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="ci_csrf_token" value="" />
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

<h4 style="text-align:center; font-weight: bold; color: #060606;">2. Educational Qualifications</h4>
<div class="row">
    <div class="col-md-12" >
      <div class="panel panel-success" >
      <div class="panel-heading" style="color: #252527;">(A) Details of PhD</div>
        <div class="panel-body">
          
          <span class="col-md-2 control-label" for="college_phd">University/Institute</span>  
          <div class="col-md-4">
          <input id="college_phd" name="college_phd" type="text" placeholder="University/Institute" class="form-control input-md" action="page2.php" method="post" autofocus="" required="">
          </div>

          <span class="col-md-2 control-label" for="stream">Department</span>  
          <div class="col-md-4">
          <input id="stream" name="stream" type="text" placeholder="Department" class="form-control input-md" autofocus="">
          </div> 
          
          <span class="col-md-2 control-label" for="duration_phd">Name of PhD Supervisor</span>  
          <div class="col-md-4">
          <input id="supervisor" name="supervisor" type="text" placeholder="Name of Ph. D. Supervisor" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="yoj_phd">Year of Joining</span>  
          <div class="col-md-4">
          <input id="yoj_phd" name="yoj_phd" type="text" placeholder="Year of Joining" class="form-control input-md" required="">
          </div>
          
          <div class="row">
          <div class="col-md-12">
          <span class="col-md-2 control-label" for="dod_phd">Date of Successful Thesis Defence</span>  
          <div class="col-md-4">
          <input id="dod_phd" name="dod_phd" type="text" data-provide="datepicker" placeholder="Date of Defence" class="form-control input-md datepicker" required="">
          </div>

          <span class="col-md-2 control-label" for="doa_phd">Date of Award</span>  
          <div class="col-md-4">
          <input id="doa_phd" name="doa_phd" type="text" data-provide="datepicker" placeholder="Date of Award" class="form-control input-md datepicker" required="">
          </div>
          </div>
          </div>
          <br />
          <span class="col-md-2 control-label" for="phd_title">Title of PhD Thesis</span>  
          <div class="col-md-10">
          <input id="phd_title" name="phd_title" type="text" placeholder="Title of PhD Thesis" class="form-control input-md" required="">
          </div>

      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading" style="color: #252527;">(B) Academic Details - M. Tech./ M.E./ PG Details</div>
        <div class="panel-body">
          
          <span class="col-md-2 control-label" for="pg_degree">Degree/Certificate</span>  
          <div class="col-md-4">
          <input id="pg_degree" name="pg_degree" type="text" placeholder="Degree/Certificate" class="form-control input-md" autofocus="">
          </div>

          <span class="col-md-2 control-label" for="pg_college">University/Institute</span>  
          <div class="col-md-4">
          <input id="pg_college" name="pg_college" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="">
          </div> 
          
          <span class="col-md-2 control-label" for="pg_subjects">Branch/Stream</span>  
          <div class="col-md-4">
          <input id="pg_subjects" name="pg_subjects" type="text" placeholder="Branch/Stream" class="form-control input-md" >
          </div>

          <span class="col-md-2 control-label" for="pg_yoj">Year of Joining</span>  
          <div class="col-md-4">
          <input id="pg_yoj" name="pg_yoj" type="text" placeholder="Year of Joining" class="form-control input-md" >
          </div>
          
          <div class="row">
          <div class="col-md-12">
          <span class="col-md-2 control-label" for="pg_yog">Year of Completion</span>  
          <div class="col-md-4">
          <input id="pg_yog" name="pg_yog" type="text" placeholder="Year of Completion" class="form-control input-md" >
          </div>

          <span class="col-md-2 control-label" for="pg_duration">Duration (in years)</span>  
          <div class="col-md-4">
          <input id="pg_duration" name="pg_duration" type="text" placeholder="Duration" class="form-control input-md" >
          </div>

          <span class="col-md-2 control-label" for="pg_perce">Percentage/ CGPA</span>  
          <div class="col-md-4">
          <input id="pg_perce" name="pg_perce" type="text" placeholder="Percentage/ CGPA" class="form-control input-md" >
          </div>

          <span class="col-md-2 control-label" for="pg_rank">Division/Class</span>  
          <div class="col-md-4">
          <input id="pg_rank" name="pg_rank" type="text" placeholder="Division/Class" class="form-control input-md" >
          </div>

          </div>
          </div>
          <br />
          

      </div>
    </div>
  </div>
</div>



<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading" style="color: #252527;">(C) Academic Details - B. Tech /B.E. / UG Details *</div>
        <div class="panel-body">
          
          <span class="col-md-2 control-label" for="ug_degree">Degree/Certificate</span>  
          <div class="col-md-4">
          <input id="ug_degree"  name="ug_degree" type="text" placeholder="Degree/Certificate" class="form-control input-md" autofocus="" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_college">University/Institute</span>  
          <div class="col-md-4">
          <input id="ug_college" name="ug_college" type="text" placeholder="University/Institute" class="form-control input-md" autofocus="">
          </div> 
          
          <span class="col-md-2 control-label" for="ug_subjects">Branch/Stream</span>  
          <div class="col-md-4">
          <input id="ug_subjects" name="ug_subjects" type="text" placeholder="Branch/Stream" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_yoj">Year of Joining</span>  
          <div class="col-md-4">
          <input id="ug_yoj" name="ug_yoj" type="text" placeholder="Year of Joining" class="form-control input-md" required="">
          </div>
          
          <div class="row">
          <div class="col-md-12">
          <span class="col-md-2 control-label" for="ug_yog">Year of Completion</span>  
          <div class="col-md-4">
          <input id="ug_yog" name="ug_yog" type="text" placeholder="Year of Completion" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_duration">Duration (in years)</span>  
          <div class="col-md-4">
          <input id="ug_duration" name="ug_duration" type="text" placeholder="Duration" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_perce">Percentage/ CGPA</span>  
          <div class="col-md-4">
          <input id="ug_perce" name="ug_perce" type="text" placeholder="Percentage/ CGPA" class="form-control input-md" required="">
          </div>

          <span class="col-md-2 control-label" for="ug_rank">Division/Class</span>  
          <div class="col-md-4">
          <input id="ug_rank" name="ug_rank" type="text" placeholder="Division/Class" class="form-control input-md" required="">
          </div>

          

          </div>
          </div>
          <br />
          

      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading" style="color: #252527;">(D) Academic Details - School *
        
      </div>
        <div class="panel-body">
          <table class="table table-bordered">
              
              <tr height="30px">
                <th class="col-md-3"> 10th/12th/HSC/Diploma </th>
                <th class="col-md-3"> School </th>
                <th class="col-md-1"> Year of Passing</th>
                <th class="col-md-2"> Percentage/ Grade </th>
                <th class="col-md-2"> Division/Class </th>
              </tr>
              
              
              <tr height="60px">
                <td class="col-md-2">  
                    <input id="hsc_ssc1" name="hsc_ssc[]" type="text" placeholder="" class="form-control input-md"  required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="school1" name="school[]" type="text" placeholder="School" class="form-control input-md" maxlength="80" required=""> 
                  </td>
                <td class="col-md-2"> 
                  <input id="passing_year1" name="passing_year[]" type="text" placeholder="Passing Year" class="form-control input-md" maxlength="5" required=""> 
                </td>

              

                <td class="col-md-2"> 
                  <input id="s_perce1" name="s_perce[]" type="text" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                </td>

                 
                <td class="col-md-2"> 
                  <input id="s_rank1" name="s_rank[]" type="text" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                </td>


              </tr>
              
              <tr height="60px">
                <td class="col-md-2">  
                    <input id="hsc_ssc2" name="hsc_ssc[]" type="text" placeholder="" class="form-control input-md"  required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="school2" name="school[]" type="text" placeholder="School" class="form-control input-md" maxlength="80" required=""> 
                  </td>
                <td class="col-md-2"> 
                  <input id="passing_year2" name="passing_year[]" type="text" placeholder="Passing Year" class="form-control input-md" maxlength="5" required=""> 
                </td>

              

                <td class="col-md-2"> 
                  <input id="s_perce2" name="s_perce[]" type="text" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                </td>

                 
                <td class="col-md-2"> 
                  <input id="s_rank2" name="s_rank[]" type="text" placeholder="Percentage/Grade" class="form-control input-md" maxlength="5" required="">
                </td>


              </tr>
                            
           
          </table>

      </div>
    </div>
  </div>
</div>
 
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading" style="color: #252527;">(E) Additional Educational Qualification (If any)
        <button class="btn btn-sm btn-danger" id="add_more_acde">Add More</button>
      </div>
        <div class="panel-body">
          <table class="table table-bordered">
              <tbody id="acde">
              
              <tr height="30px">
                <th class="col-md-2"> Degree/Certificate </th>
                <th class="col-md-2"> University/Institute </th>
                <th class="col-md-2"> Branch/Stream </th>
                <th class="col-md-1"> Year of Joining</th>
                <th class="col-md-1"> Year of Completion </th>
                <th class="col-md-1"> Duration (in years)</th>
                <th class="col-md-3"> Percentage/ CGPA </th>
                <th class="col-md-3"> Division/Class</th>
              </tr>
              
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree1" name="add_degree[]" type="text" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college1" name="add_college[]" type="text" placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects1" name="add_subjects[]" type="text" placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj1" name="add_yoj[]" type="text" placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog1" name="add_yog[]" type="text" placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration1" name="add_duration[]" type="text"  placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce1" name="add_perce[]" type="text" placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank1" name="add_rank[]" type="text" placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
            

              <tr height="60px">
                <td class="col-md-2">  
                    <input id="add_degree2" name="add_degree[]" type="text" placeholder="Degree" class="form-control input-md" maxlength="10" required=""> 
                </td>

                <td class="col-md-2"> 
                    <input id="add_college2" name="add_college[]" type="text" placeholder="College" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                 <td class="col-md-2"> 
                    <input id="add_subjects2" name="add_subjects[]" type="text" placeholder="Subjects" class="form-control input-md" maxlength="80" required=""> 
                  </td>

                <td class="col-md-2"> 
                  <input id="add_yoj2" name="add_yoj[]" type="text"  placeholder="Year of Joining" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_yog2" name="add_yog[]" type="text" placeholder="Year of Graduation" class="form-control input-md" maxlength="5" required=""> 
                </td>
                <td class="col-md-2"> 
                  <input id="add_duration2" name="add_duration[]" type="text" placeholder="Duration" class="form-control input-md" maxlength="4" required=""> 
                </td>

                <td class="col-md-2"> 
                  <input id="add_perce2" name="add_perce[]" type="text" placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>

                <td class="col-md-2"> 
                  <input id="add_rank2" name="add_rank[]" type="text" placeholder="Percentage" class="form-control input-md" maxlength="5" required="">
                </td>
                
              </tr>
              
                            
           
            </tbody>
          </table>

      </div>
    </div>
  </div>
</div>


            <!-- Form Name -->



<div class="form-group">
  
  <div class="col-md-1">
    <a href="page1persondet.php" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-fast-backward"></i></a>
  </div>

  <div class="col-md-11">
    <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right" style="margin-left: 75%;">SAVE & NEXT</button>
    
  </div>

    
</div>
          
</fieldset>
</form>

        </div>
    </div>
</div>

<script type="text/javascript">
  function yearcalc()
  { 
    // alert('hi');
    var num1=document.getElementById("yoj").value;
    var num2=document.getElementById("yog").value;

    var duration_year=parseFloat(num2)-parseFloat(num1);
    // alert(duration_year);
    document.getElementById("result_test").value = duration_year ;
   
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