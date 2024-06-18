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
$sql="CREATE TABLE IF NOT EXISTS `professional_societies` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `name_of_society` VARCHAR(255) NOT NULL , `membership_status` VARCHAR(255) NOT NULL  , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

$sql="CREATE TABLE IF NOT EXISTS `professional_training` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `training_type` VARCHAR(255) NOT NULL , `organizations` VARCHAR(255) NOT NULL , `year` VARCHAR(255) NOT NULL , `duration` VARCHAR(255) NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

$sql="CREATE TABLE IF NOT EXISTS `award_recognition` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `award_name` VARCHAR(255) NOT NULL , `award_by` VARCHAR(255) NOT NULL , `year` VARCHAR(255) NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

$sql="CREATE TABLE IF NOT EXISTS`sponsored_projects` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `agency` VARCHAR(255) NOT NULL , `title` VARCHAR(255) NOT NULL , `amount` VARCHAR(255) NOT NULL , `period` VARCHAR(255) NOT NULL , `role` VARCHAR(255) NOT NULL , `status` VARCHAR(255) NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);

$sql="CREATE TABLE IF NOT EXISTS`consultancy_projects` (`applicant_id` INT NOT NULL AUTO_INCREMENT , `agency` VARCHAR(255) NOT NULL , `title` VARCHAR(255) NOT NULL , `amount` VARCHAR(255) NOT NULL , `period` VARCHAR(255) NOT NULL , `role` VARCHAR(255) NOT NULL , `status` VARCHAR(255) NOT NULL , PRIMARY KEY (`applicant_id`)) ENGINE = InnoDB";
mysqli_query($conn,$sql);
?>

<?php 
if(isset($_POST['mname'], $_POST['mstatus'])) {
    $mname = $_POST['mname'];
    $mstatus = $_POST['mstatus'];
    
      
  
      // Prepare and execute query
      foreach ($mname as $key => $value) {
      $sql = "INSERT INTO `professional_societies` (`name_of_society`, `membership_status` )
              VALUES ('$mname[$key]', '$mstatus[$key]')";
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
if(isset($_POST['trg'], $_POST['porg'], $_POST['pyear'], $_POST['pduration'])) {
    $trg = $_POST['trg'];
    $porg = $_POST['porg'];
    $pyear = $_POST['pyear'];
    $pduration = $_POST['pduration'];
      
  
      // Prepare and execute query
      foreach ($trg as $key => $value) {
      $sql = "INSERT INTO `professional_training` (`training_type`, `organizations`, `year`, `duration` )
              VALUES ('$trg[$key]', '$porg[$key]', '$pyear[$key]', '$pduration[$key]')";
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
if(isset($_POST['award_nature'], $_POST['award_org'], $_POST['award_year'])) {
    $award_nature = $_POST['trg'];
    $award_org = $_POST['porg'];
    $award_year = $_POST['pyear'];
      
  
      // Prepare and execute query
      foreach ($trg as $key => $value) {
      $sql =  "INSERT INTO `award_recognition` (`award_name`, `award_by` , `year`)
              VALUES ('$award_nature[$key]', '$award_org[$key]', '$award_year[$key]')"; 
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
if(isset($_POST['agency'], $_POST['stitle'], $_POST['samount'], $_POST['s_status'], $_POST['s_role'], $_POST['speriod'])) {
    $stitle = $_POST['stitle'];
    $samount = $_POST['samount'];
    $agency = $_POST['agency'];
    $s_status = $_POST['s_status'];
    $s_role = $_POST['s_role'];
    $speriod = $_POST['speriod'];
      
  
      // Prepare and execute query
      foreach ($stitle as $key => $value) {
      $sql = "INSERT INTO `sponsored_projects` (`agency`, `title`, `amount`, `period`,`role`, `status` )
              VALUES ('$agency[$key]','$stitle[$key]', '$samount[$key]', '$speriod[$key]' ,'$s_role[$key]','$s_status[$key]')";
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
if(isset($_POST['c_org'], $_POST['ctitle'], $_POST['camount'], $_POST['c_status'], $_POST['c_role'], $_POST['cperiod'])) {
    $ctitle = $_POST['ctitle'];
    $camount = $_POST['camount'];
    $c_org = $_POST['c_org'];
    $c_status = $_POST['c_status'];
    $c_role = $_POST['c_role'];
    $cperiod = $_POST['cperiod'];
      
  
      // Prepare and execute query
      foreach ($ctitle as $key => $value) {
      $sql = "INSERT INTO `consultancy_projects` (`agency`, `title`, `amount`, `period`,`role`, `status` )
              VALUES ('$c_org[$key]', '$ctitle[$key]', '$camount[$key]',  '$cperiod[$key]','$c_role[$key]', '$c_status[$key]')";
      if(mysqli_query($conn, $sql)) {
          echo "Record inserted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  
    header("location: page6thesis.php");
  } else {
      echo "All fields are required.";
  }
  ?>

<html>
<head>
	<title>Academic Industrial Experience</title>
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
    			<h3 style="text-align:center;color: #414002!important;font-weight: bold;font-family: 'Oswald', sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna </h3>
    			

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
  padding: 0 !important;
}

span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
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
.btn-primary {
  padding: 9px;
}
</style>
<script type="text/javascript">
             
            $(function () {
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
            });
</script>

<script type="text/javascript">
var tr="";
var counter_s_proj=1;
var counter_award=1;
var counter_prof_trg=1;
var counter_membership=1;
var counter_consultancy=1;

  $(document).ready(function(){
  

$("#add_more_s_proj").click(function(){
        create_tr();
        create_serial('s_proj');
        create_input('agency[]', 'Sponsoring Agency','agency'+counter_s_proj, 's_proj',counter_s_proj, 's_proj');
        create_input('stitle[]', 'Title of Project', 'stitle'+counter_s_proj,'s_proj',counter_s_proj, 's_proj');
        create_input('samount[]', 'Amount of grant', 'samount'+counter_s_proj,'s_proj',counter_s_proj, 's_proj');
        create_input('speriod[]', 'Period', 'speriod'+counter_s_proj,'s_proj',counter_s_proj, 's_proj');
        create_input('s_role[]', 'Role', 's_role'+counter_s_proj,'s_proj',counter_s_proj, 's_proj',false,true);
        create_input('s_status[]', 'Status', 's_status'+counter_s_proj,'s_proj',counter_s_proj, 's_proj',true);
        counter_s_proj++;
        return false;
  });
  
  $("#add_more_award").click(function(){
          create_tr();
          create_serial('award');
          create_input('award_nature[]', 'Name of Award','award_nature'+counter_award, 'award',counter_award, 'award');
          create_input('award_org[]', 'Granting body/Organization', 'award_org'+counter_award,'award',counter_award, 'award');
          create_input('award_year[]', 'Year', 'award_year'+counter_award,'award',counter_award, 'award',true);
          counter_award++;
          return false;
    });

  $("#add_more_prog_trg").click(function(){
          create_tr();
          create_serial('prof_trg');
          create_input('trg[]', 'Taining Received','trg'+counter_prof_trg, 'prof_trg',counter_prof_trg, 'prof_trg');
          create_input('porg[]', 'Organization', 'porg'+counter_prof_trg,'prof_trg',counter_prof_trg, 'prof_trg');
          create_input('pyear[]', 'Year', 'pyear'+counter_prof_trg,'prof_trg',counter_prof_trg, 'prof_trg');
          create_input('pduration[]', 'Duration', 'pduration'+counter_prof_trg,'prof_trg',counter_prof_trg, 'prof_trg',true);
          counter_prof_trg++;
          return false;
    });

  $("#add_membership").click(function(){
          create_tr();
          create_serial('membership');
          create_input('mname[]', 'Name of the Professional Society','mname'+counter_membership, 'membership',counter_membership, 'membership');
          create_input('mstatus[]', 'Membership Status (Lifetime/Annual)', 'mstatus'+counter_membership,'membership',counter_membership, 'membership',true);
          counter_membership++;
          return false;
    });

  $("#add_consultancy").click(function(){
          create_tr();
          create_serial('consultancy');
          create_input('c_org[]', 'Organization','c_org'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');
          create_input('ctitle[]', 'Title of Project','ctitle'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');
          create_input('camount[]', 'Amount of grant','camount'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');
          create_input('cperiod[]', 'Period','cperiod'+counter_consultancy, 'consultancy',counter_consultancy, 'consultancy');

          create_input('c_role[]', 'Role', 'c_role'+counter_consultancy,'consultancy',counter_consultancy, 'consultancy',false,true);
          create_input('c_status[]', 'Status', 'c_status'+counter_consultancy,'consultancy',counter_consultancy, 'consultancy',true);
          counter_consultancy++;
          return false;
    });


});
  function create_select()
  {
    
  }
  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function create_serial(tbody_id)
  {
    //console.log(tbody_id);
    var td=document.createElement("td");
    // var x=0;
     var x = document.getElementById(tbody_id).rows.length;
    // if(document.getElementById(tbody_id).rows)
    // {
    // }
    td.innerHTML=x;
     tr.appendChild(td);
  }
   function for_date_picker(obj)
  {
    obj.setAttribute("data-provide", "datepicker");
    obj.className += " datepicker";
    return obj;

  }
  function deleterow(e){
    var rowid=$(e).attr("data-id");
    var textbox=$("#id"+rowid).val();
    $.ajax({
            type: "POST",
            url  : "https://ofa.iiti.ac.in/facrec_che_2023_july_02/Acd_ind/deleterow/",
            data: {id: textbox},
                success: function(result) { 
                if(result.status=="OK"){
                $('.row_'+rowid).remove();
                            //remove_row('award',rowid, 'award');
                }
                   
                }});

   
    }
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, select=false, datepicker_set=false)
  {
    //console.log(counter);
    if(select==false)
    {

      var input=document.createElement("input");
      input.setAttribute("type", "text");
      input.setAttribute("name", t_name);
      input.setAttribute("id", id);
      input.setAttribute("placeholder", place_value);
      input.setAttribute("class", "form-control input-md");
      input.setAttribute("required", "");
      var td=document.createElement("td");
      td.appendChild(input);
    }
    if(select==true)
    {

      var sel=document.createElement("select");
      sel.setAttribute("name", t_name);
      sel.setAttribute("id", id);
      sel.setAttribute("class", "form-control input-md");
      sel.innerHTML+="<option>Select</option>";
      sel.innerHTML+="<option value='Principal Investigator'>Principal Investigator</option>";
      sel.innerHTML+="<option value='Co-investigator'>Co-investigator</option>";
      // sel.innerHTML+="<option value='in_preparation'>In-Preparation</option>";
      var td=document.createElement("td");
      td.appendChild(sel);
    }
    if(datepicker_set==true)
    {
      input=for_date_picker(input);
    }
    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"', '"+tbody_id+"')");
      but.innerHTML="x";
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
  function remove_row(remove_name, n, tbody_id)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
    var x = document.getElementById(tbody_id).rows.length;
    for(var i=0; i<=x; i++)
    {
      $("#"+tbody_id).find("tr:eq("+i+") td:first").text(i);
      
    }
    
  }
</script>




<a href='https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout'></a>

<div class="container">
  
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <fieldset>
              <input type="hidden" name="ci_csrf_token" value="" />
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                        <h4>Welcome : <font color="#025198"><strong>q w <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></strong></font></h4>
                    </div>
                    <div class="col-md-2">
                      <a href="logout.php" class="btn btn-sm btn-success  pull-right" style="background-color:rgb(202, 39, 71);">Logout</a>
                    </div>
                  </div>
                
                
        </legend>



<!-- Membership of Professional Societies -->

<h4 style="text-align:center; font-weight: bold;color: #252527;">9. Membership of Professional Societies </h4>

<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading" style="color: #252527; background-color: #f99090;">Fill the Details  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_membership" style="background-color: #4dad32;">Add Details</button></div>
  <div class="panel-body">

        <table class="table table-bordered">
            <tbody id="membership">
            
            <tr height="30px">
              <th class="col-md-1"> S. No.</th>
              <th class="col-md-3"> Name of the Professional Society </th>
              <th class="col-md-3"> Membership Status (Lifetime/Annual)</th>
              
            </tr>


                        
            <tr height="60px" class="row_1">
             
              <td class="col-md-1"> 
                1                </td>
              <td class="col-md-2"> 
                <input id="id1" name="id[]" type="hidden" value=""  class="form-control input-md" required=""> 
                  <input id="mname1" name="mname[]" type="text" value="Simone Camacho"  placeholder="Name of the Professional Society" class="form-control input-md" required=""> 
                </td>
              <td class="col-md-2"> 
                <input id="mstatus1" name="mstatus[]" type="text" value="Qui perspiciatis la"  placeholder="Membership Status (Lifetime/Annual)" class="form-control input-md" required=""> 
              </td>
              
             
            </tr>
                        
            <tr height="60px" class="row_2">
             
              <td class="col-md-1"> 
                2                </td>
              <td class="col-md-2"> 
                <input id="id2" name="id[]" type="hidden" value=""  class="form-control input-md" required=""> 
                  <input id="mname2" name="mname[]" type="text" value="Quintessa Strong"  placeholder="Name of the Professional Society" class="form-control input-md" required=""> 
                </td>
              <td class="col-md-2"> 
                <input id="mstatus2" name="mstatus[]" type="text" value="Tempore rerum vel i"  placeholder="Membership Status (Lifetime/Annual)" class="form-control input-md" required=""> 
              </td>
              
             
            </tr>
                        
            <tr height="60px" class="row_3">
             
              <td class="col-md-1"> 
                3                </td>
              <td class="col-md-2"> 
                <input id="id3" name="id[]" type="hidden" value=""  class="form-control input-md" required=""> 
                  <input id="mname3" name="mname[]" type="text" value="Slade Santos"  placeholder="Name of the Professional Society" class="form-control input-md" required=""> 
                </td>
              <td class="col-md-2"> 
                <input id="mstatus3" name="mstatus[]" type="text" value="Voluptatibus laborum"  placeholder="Membership Status (Lifetime/Annual)" class="form-control input-md" required=""> 
              </td>
              
             
            </tr>
                      </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Professional Training -->

<h4 style="text-align:center; font-weight: bold;color: #252527;">10. Professional Training </h4>

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-success">
    <div class="panel-heading" style="color: #252527; background-color: #f99090;">Fill the Details  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_prog_trg" style="background-color: #4dad32;">Add Details</button></div>
      <div class="panel-body">

            <table class="table table-bordered">
                <tbody id="prof_trg">
                
                <tr height="30px">
                  <th class="col-md-1"> S. No.</th>
                  <th class="col-md-3"> Type of Training Received </th>
                  <th class="col-md-3"> Organisation</th>
                  <th class="col-md-2"> Year</th>
                  <th class="col-md-2"> Duration (in years & months)</th>
                  
                </tr>


                                
                <tr height="60px" class="row_1">
                 
                  <td class="col-md-1"> 
                    1                    </td>
                  <td class="col-md-2"> 
                    <input id="id1" name="id[]" type="hidden" value=""  class="form-control input-md" required=""> 
                      <input id="trg1" name="trg[]" type="text" value="Qui commodi ut id et"  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                    </td>
                  <td class="col-md-2"> 
                    <input id="porg1" name="porg[]" type="text" value="Voluptas veniam dol"  placeholder="Title of Project" class="form-control input-md" required=""> 
                  </td>
                  <td class="col-md-2"> 
                    <input id="pyear1" name="pyear[]" type="text" value="1979"  placeholder="Amount of grant" class="form-control input-md" required=""> 
                  </td>
                  <td class="col-md-2"> 
                    <input id="pduration1" name="pduration[]" type="text" value="Quia eaque nemo debi"  placeholder="Amount of grant" class="form-control input-md" required=""> 
                  </td>
                 
                </tr>
                                
                <tr height="60px" class="row_2">
                 
                  <td class="col-md-1"> 
                    2                    </td>
                  <td class="col-md-2"> 
                    <input id="id2" name="id[]" type="hidden" value=""  class="form-control input-md" required=""> 
                      <input id="trg2" name="trg[]" type="text" value="Reprehenderit conse"  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                    </td>
                  <td class="col-md-2"> 
                    <input id="porg2" name="porg[]" type="text" value="Sed non deserunt com"  placeholder="Title of Project" class="form-control input-md" required=""> 
                  </td>
                  <td class="col-md-2"> 
                    <input id="pyear2" name="pyear[]" type="text" value="2007"  placeholder="Amount of grant" class="form-control input-md" required=""> 
                  </td>
                  <td class="col-md-2"> 
                    <input id="pduration2" name="pduration[]" type="text" value="Facere ipsa dolore "  placeholder="Amount of grant" class="form-control input-md" required=""> 
                  </td>
                 
                </tr>
                                
                <tr height="60px" class="row_3">
                 
                  <td class="col-md-1"> 
                    3                    </td>
                  <td class="col-md-2"> 
                    <input id="id3" name="id[]" type="hidden" value=""  class="form-control input-md" required=""> 
                      <input id="trg3" name="trg[]" type="text" value="Officia ea magna por"  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                    </td>
                  <td class="col-md-2"> 
                    <input id="porg3" name="porg[]" type="text" value="Labore quibusdam in "  placeholder="Title of Project" class="form-control input-md" required=""> 
                  </td>
                  <td class="col-md-2"> 
                    <input id="pyear3" name="pyear[]" type="text" value="1981"  placeholder="Amount of grant" class="form-control input-md" required=""> 
                  </td>
                  <td class="col-md-2"> 
                    <input id="pduration3" name="pduration[]" type="text" value="Architecto aute reic"  placeholder="Amount of grant" class="form-control input-md" required=""> 
                  </td>
                 
                </tr>
                              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<!-- Award(s) and Recognition(s) -->

<h4 style="text-align:center; font-weight: bold;color: #252527;">11. Award(s) and Recognition(s)</h4>
<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<div class="panel-heading" style="color: #252527; background-color: #f99090;">Fill the Details  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_award" style="background-color: #4dad32;">Add Details</button></div>
  <div class="panel-body">

        <table class="table table-bordered">
            <tbody id="award">
            
            <tr height="30px">
              <th class="col-md-1"> S. No.</th>
              <th class="col-md-3"> Name of Award </th>
              <th class="col-md-3"> Awarded By</th>
              <th class="col-md-2"> Year</th>
              
            </tr>
            <tr height="60px" class="row_1">
             
              <td class="col-md-1"> 
                1                </td>
              <td class="col-md-2"> 
                <input id="id1" name="id[]" type="hidden" value="1575"  class="form-control input-md" required=""> 
                  <input id="award_nature1" name="award_nature[]" type="text" value="sd"  placeholder= "Name of award"class="form-control input-md" required=""> 
                </td>
              <td class="col-md-2"> 
                <input id="award_org1" name="award_org[]" type="text" value="dsds"  placeholder="Awarded By" class="form-control input-md" required=""> 
              </td>
              <td class="col-md-2"> 
                <input id="award_year1" name="award_year[]" type="text" value="2012"  placeholder="Year" class="form-control input-md" required=""> 
                <a href="#" onclick="deleterow(this)" data-id="1" class="pull-right">X</a>
              </td>
             
            </tr>


                      </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<h4 style="text-align:center; font-weight: bold;color: #252527;">12. Sponsored Projects/ Consultancy Details</h4>
<!-- sponsored projects  -->
<div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
      <div class="panel-heading" style="color: #252527; background-color: #f99090;">(A) Sponsored Projects &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_s_proj" style="background-color: #4dad32;">Add Details</button></div>
        <div class="panel-body">

              <table class="table table-bordered">
                  <tbody id="s_proj">
                  
                  <tr height="30px">
                    <th class="col-md-1"> S. No.</th>
                    <th class="col-md-2"> Sponsoring Agency </th>
                    <th class="col-md-2"> Title of Project</th>
                    <th class="col-md-2"> Sanctioned Amount (&#8377) </th>
                    <th class="col-md-1"> Period</th>
                    <th class="col-md-2"> Role </th>
                    <th class="col-md-2"> Status (Completed/On-going)</th>
                    
                  </tr>


                                    
                  <tr height="60px">
                   
                    <td class="col-md-1"> 
                      1                      </td>
                    <td class="col-md-2"> 
                      
                        <input id="agency1" name="agency[]" type="text" value="Velit voluptate vel"  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="stitle1" name="stitle[]" type="text" value="Nihil elit exercita"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td>
                    <td class="col-md-2"> 
                      <input id="samount1" name="samount[]" type="text" value="Quos perferendis fug"  placeholder="Amount of grant" class="form-control input-md" required=""> 
                    </td>
                    <td class="col-md-1"> 
                      <input id="speriod1" name="speriod[]" type="text" value="Irure similique volu"  placeholder="Period" class="form-control input-md" required=""> 
                    </td>

                    <td class="col-md-2"> 
                      <select id="s_role" name="s_role[]" class="form-control input-md" required="">
                          <option value="">Select</option>
                          <option selected='selected' value="Principal Investigator">Principal Investigator</option>
                          <option  value="Co-investigator">Co-investigator</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="s_status1" name="s_status[]" type="text" value="Voluptates sunt dolo"  placeholder="Status" class="form-control input-md" required=""> 
                    </td>
                    
                   
                  </tr>
                                    
                  <tr height="60px">
                   
                    <td class="col-md-1"> 
                      2                      </td>
                    <td class="col-md-2"> 
                      
                        <input id="agency2" name="agency[]" type="text" value="Nihil vel saepe haru"  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="stitle2" name="stitle[]" type="text" value="Non cumque quo expli"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td>
                    <td class="col-md-2"> 
                      <input id="samount2" name="samount[]" type="text" value="Occaecat distinctio"  placeholder="Amount of grant" class="form-control input-md" required=""> 
                    </td>
                    <td class="col-md-1"> 
                      <input id="speriod2" name="speriod[]" type="text" value="Sed dicta impedit a"  placeholder="Period" class="form-control input-md" required=""> 
                    </td>

                    <td class="col-md-2"> 
                      <select id="s_role" name="s_role[]" class="form-control input-md" required="">
                          <option value="">Select</option>
                          <option  value="Principal Investigator">Principal Investigator</option>
                          <option selected='selected' value="Co-investigator">Co-investigator</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="s_status2" name="s_status[]" type="text" value="Non quia ipsum dolor"  placeholder="Status" class="form-control input-md" required=""> 
                    </td>
                    
                   
                  </tr>
                                    
                  <tr height="60px">
                   
                    <td class="col-md-1"> 
                      3                      </td>
                    <td class="col-md-2"> 
                      
                        <input id="agency3" name="agency[]" type="text" value="Blanditiis sapiente "  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                      </td>
                    <td class="col-md-2"> 
                      <input id="stitle3" name="stitle[]" type="text" value="Consequuntur autem i"  placeholder="Title of Project" class="form-control input-md" required=""> 
                    </td>
                    <td class="col-md-2"> 
                      <input id="samount3" name="samount[]" type="text" value="Eiusmod eaque qui se"  placeholder="Amount of grant" class="form-control input-md" required=""> 
                    </td>
                    <td class="col-md-1"> 
                      <input id="speriod3" name="speriod[]" type="text" value="Et nostrud tempora a"  placeholder="Period" class="form-control input-md" required=""> 
                    </td>

                    <td class="col-md-2"> 
                      <select id="s_role" name="s_role[]" class="form-control input-md" required="">
                          <option value="">Select</option>
                          <option  value="Principal Investigator">Principal Investigator</option>
                          <option selected='selected' value="Co-investigator">Co-investigator</option>
                      </select>
                    </td>

                    <td class="col-md-2"> 
                      <input id="s_status3" name="s_status[]" type="text" value="Doloremque corporis "  placeholder="Status" class="form-control input-md" required=""> 
                    </td>
                    
                   
                  </tr>
                                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

     <!-- Consultancy Details -->
             <div class="row">
                 <div class="col-md-12">
                   <div class="panel panel-success">
                   <div class="panel-heading" style="color: #252527; background-color: #f99090;">(B) Consultancy Projects  &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_consultancy"style="background-color: #4dad32;">Add Details</button></div>
                     <div class="panel-body">

                           <table class="table table-bordered">
                               <tbody id="consultancy">
                               
                               <tr height="30px">
                                 <th class="col-md-1"> S. No.</th>
                                 <th class="col-md-3"> Organization </th>
                                 <th class="col-md-2"> Title of Project</th>
                                 <th class="col-md-2"> Amount of Grant</th>
                                 <th class="col-md-1"> Period</th>
                                 <th class="col-md-2"> Role</th>
                                 <th class="col-md-2"> Status</th>
                                 
                               </tr>


                                                              
                               <tr height="60px" class="row_1">
                                
                                 <td class="col-md-1"> 
                                   1                                   </td>
                                 <td class="col-md-2"> 
                                   <input id="id1" name="id[]" type="hidden" value=""  class="form-control input-md" required=""> 

                                     <input id="c_org1" name="c_org[]" type="text" value="Omnis esse deleniti"  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                                   </td>
                                 <td class="col-md-2"> 
                                   <input id="ctitle1" name="ctitle[]" type="text" value="Nihil nulla omnis bl"  placeholder="Title of Project" class="form-control input-md" required=""> 
                                 </td>
                                 <td class="col-md-2"> 
                                   <input id="camount1" name="camount[]" type="text" value="Quaerat neque beatae"  placeholder="Title of Project" class="form-control input-md" required=""> 
                                 </td>
                                 <td class="col-md-1"> 
                                   <input id="cperiod1" name="cperiod[]" type="text" value="Amet non atque inci"  placeholder="Title of Project" class="form-control input-md" required=""> 
                                 </td>

                                 <td class="col-md-2"> 
                                   <select id="c_role" name="c_role[]" class="form-control input-md" required="">
                                       <option value="">Select</option>
                                       <option  value="Principal Investigator">Principal Investigator</option>
                                       <option selected='selected' value="Co-investigator">Co-investigator</option>
                                   </select>
                                 </td>

                                 <td class="col-md-2"> 
                                   <input id="c_status1" name="c_status[]" type="text" value="Voluptatibus similiq"  placeholder="Status" class="form-control input-md" required=""> 
                                 </td>
                                 
                                
                               </tr>
                                                              
                               <tr height="60px" class="row_2">
                                
                                 <td class="col-md-1"> 
                                   2                                   </td>
                                 <td class="col-md-2"> 
                                   <input id="id2" name="id[]" type="hidden" value=""  class="form-control input-md" required=""> 

                                     <input id="c_org2" name="c_org[]" type="text" value="Alias harum iure ali"  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                                   </td>
                                 <td class="col-md-2"> 
                                   <input id="ctitle2" name="ctitle[]" type="text" value="Velit qui quis vel e"  placeholder="Title of Project" class="form-control input-md" required=""> 
                                 </td>
                                 <td class="col-md-2"> 
                                   <input id="camount2" name="camount[]" type="text" value="Repellendus Excepte"  placeholder="Title of Project" class="form-control input-md" required=""> 
                                 </td>
                                 <td class="col-md-1"> 
                                   <input id="cperiod2" name="cperiod[]" type="text" value="Cupidatat molestias "  placeholder="Title of Project" class="form-control input-md" required=""> 
                                 </td>

                                 <td class="col-md-2"> 
                                   <select id="c_role" name="c_role[]" class="form-control input-md" required="">
                                       <option value="">Select</option>
                                       <option selected='selected' value="Principal Investigator">Principal Investigator</option>
                                       <option  value="Co-investigator">Co-investigator</option>
                                   </select>
                                 </td>

                                 <td class="col-md-2"> 
                                   <input id="c_status2" name="c_status[]" type="text" value="Quas cumque quo even"  placeholder="Status" class="form-control input-md" required=""> 
                                 </td>
                                 
                                
                               </tr>
                                                              
                               <tr height="60px" class="row_3">
                                
                                 <td class="col-md-1"> 
                                   3                                   </td>
                                 <td class="col-md-2"> 
                                   <input id="id3" name="id[]" type="hidden" value=""  class="form-control input-md" required=""> 

                                     <input id="c_org3" name="c_org[]" type="text" value="Recusandae Quo hic "  placeholder="Sponsoring Agency" class="form-control input-md" required=""> 
                                   </td>
                                 <td class="col-md-2"> 
                                   <input id="ctitle3" name="ctitle[]" type="text" value="Facere qui voluptate"  placeholder="Title of Project" class="form-control input-md" required=""> 
                                 </td>
                                 <td class="col-md-2"> 
                                   <input id="camount3" name="camount[]" type="text" value="Explicabo Explicabo"  placeholder="Title of Project" class="form-control input-md" required=""> 
                                 </td>
                                 <td class="col-md-1"> 
                                   <input id="cperiod3" name="cperiod[]" type="text" value="Est aliquid iusto de"  placeholder="Title of Project" class="form-control input-md" required=""> 
                                 </td>

                                 <td class="col-md-2"> 
                                   <select id="c_role" name="c_role[]" class="form-control input-md" required="">
                                       <option value="">Select</option>
                                       <option selected='selected' value="Principal Investigator">Principal Investigator</option>
                                       <option  value="Co-investigator">Co-investigator</option>
                                   </select>
                                 </td>

                                 <td class="col-md-2"> 
                                   <input id="c_status3" name="c_status[]" type="text" value="Ipsum alias voluptat"  placeholder="Status" class="form-control input-md" required=""> 
                                 </td>
                                 
                                
                               </tr>
                                                            </tbody>
                           </table>
                         </div>
                       </div>
                     </div>

                   </div>
 
    


      




            <!-- Button -->

            <div class="form-group">
              
              <div class="col-md-1">
                <a href="page4publication.php" btn btn-primary pull-left"><i class="glyphicon glyphicon-fast-backward"></i></a>
              </div>

              <div class="col-md-11">
                <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE & NEXT</button>
                
              </div>
              
            </div>

            <!-- <div class="form-group">
              <label class="col-md-5 control-label" for="submit"></label>
              <div class="col-md-4">
                <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-primary">SUBMIT</button>

              </div>
            </div> -->

            </fieldset>
            </form>
            
            

        </div>
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