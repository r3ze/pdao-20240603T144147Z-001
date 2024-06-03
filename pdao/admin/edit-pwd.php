<?php

  require_once "../controller.php";
  error_reporting(0);

  if (!isset($_SESSION['id_number'])) {
    header('location: ../index.php');
  }
  if (isset($_GET['barangay'])) {
    $barangay = $_GET['barangay'];
  }
  
  $pwd_number = $_SESSION['pwd_number'];

  $disability_string = $_SESSION['pwd_disability_type'];
  $disability_array = explode(',',$disability_string);

  $cause_string = $_SESSION['pwd_disability_cause'];
  $cause_array = explode(',',$cause_string);
  
  $support = $_SESSION["pwd_support"];
  $pensioner = $_SESSION["pwd_pensioner"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit PWD Information</title>
  <!-- Favicon-->
  <link rel="icon" href="../dist/img/pdao_logo.png" type="image/ico">

  <link rel="stylesheet" type="text/css" href="../css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" type="text/css" href="../css/Source-Sans-Pro.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- SweetAlert -->
  <script src="../js/sweetalert.min.js"></script>



  
</head>
<body class="hold-transition sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <span class="navbar-brand mb-0 h2">Pagsanjan Disability Data Management System</span>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle" src='../dist/img/profile1.jpg' height='30px' width='30px' alt='Profile Picture'> 

            <?php echo $_SESSION['username']; ?>
            

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <a class="dropdown-item" href="change_pass_validation.php">Change Password</a>
            <a class="dropdown-item" href="developer.php">Developer</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-target=".bs-example-modal-sm" data-toggle="modal">Logout</a>
          </div>
          
        </li>

      <!-- FULLSCREEN -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>

    
  </nav>
  <!-- /.navbar -->
  <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header"><h4>Sign Out <i class="fa fa-sign-out"></i></h4></div>
        <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to log-off?</div>
        <div class="modal-footer"><a href="../logout.php" class="btn btn-primary btn-block">Sign out</a></div>
      </div>
    </div>
  </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../dist/img/pdao_logo.png" alt="PDAO Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold">PDAO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar pt-5 ">
      


      <!-- Sidebar Menu -->
      <nav class="mt-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">Navigation</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="fas fa-tachometer-alt" aria-hidden="true"></i>&nbsp
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="add-pwd.php" class="nav-link">
              <i class="fa fa-users"></i>&nbsp
              <p>
                Add PWD
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pwd.php" class="nav-link active">
              <i class="fa fa-users"></i>&nbsp
              <p>
                List of PWD
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="account.php" class="nav-link">
              <i class="fa fa-user"></i> &nbsp
              <p>
                Account
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="history.php" class="nav-link">
              <i class="fa fa-history"></i> &nbsp
              <p>
                History Log
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report.php" class="nav-link">
              <i class="far fa-file-alt"></i> &nbsp
              <p>
                Report
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="backup.php" class="nav-link">
              <i class="fa fa-database"></i> &nbsp
              <p>
                Backup
              </p>
            </a>
          </li>
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-12">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <li class="breadcrumb-item"><a href="pwd.php">List of PWD</a></li>
              <li class="breadcrumb-item active"><a href="barangay-page.php?barangay=<?php echo $_SESSION['barangay'];?>"><?php echo $_SESSION['barangay'];?></a></li>
              <li class="breadcrumb-item active">Edit PWD</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-4 shadow-lg">
              <div class="card-header">
                <h1 class="card-title">Edit PWD Information</h1>
              </div>
              <!-- /.card-header -->
              <form id="myForm" method="POST">
              <div class="card-body">
                
                <div class="row pb-3">
                  <div class="form-group col-sm-9">
                    <label>1. Person w/ Disability Number</label>
                    <input type="text" class="form-control form-control-border checking-number" id="pwd_unique" placeholder="RR-PPMM-BBB-NNNNNNN" name="pwd_number">
                    <span class="error-message text-danger"></span>
                  </div>
                  <!-- Date -->
                  <div class="form-group col-sm-3">
                    <label>2. Date Issued</label>
                    <input class="form-control" type="date" name="date_applied" value="<?php echo $_SESSION['date_applied'];?>">
                  </div>

                </div>
                <label>3. Personal Information</label>
                <div class="row pb-3">
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Last Name" name="pwd_lastname" value="<?php echo $_SESSION['pwd_lastname'];?>" required>
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="First Name" name="pwd_firstname" value="<?php echo $_SESSION['pwd_firstname'];?>" required>
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Middle Name" name="pwd_middlename" value="<?php echo $_SESSION['pwd_middlename'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Suffix" name="pwd_suffix" value="<?php echo $_SESSION['pwd_suffix'];?>">
                  </div>
                </div>
                
                <div class="row pb-3">
                  <!-- Date -->
                  <div class="form-group col-sm-3">
                    <label>4. Date of Birth</label>
                    <input class="form-control calculate-age" type="date" name="pwd_birthday" value="<?php echo $_SESSION['pwd_birthday'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <label> Age</label>
                    <input type="number" class="form-control form-control-border calculated-age" id="exampleInputBorder" min="0" placeholder="(If date of birth is not available)" name="pwd_age" value="<?php echo $_SESSION['pwd_age'];?>" required>
                  </div>
                  <div class="form-group col-sm-3">
                    <label> Place of Birth</label>
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Place of Birth" name="pwd_birthplace" value="<?php echo $_SESSION['pwd_birthplace'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <label>5. Sex</label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="customRadio1" name="sex" value="Male" required>
                      <label for="customRadio1" class="custom-control-label">Male</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="customRadio2" name="sex" value="Female">
                      <label for="customRadio2" class="custom-control-label">Female</label>
                    </div>
                  </div>
                </div>

                <div class="row pb-3">
                  <div class="form-group col-sm-3">
                    <label>6. Religion</label>
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Religion" name="pwd_religion" value="<?php echo $_SESSION['pwd_religion'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <label>7. Ethnic Group</label>
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Ethnic Group" name="pwd_ethnic" value="<?php echo $_SESSION['pwd_ethnic_group'];?>">
                  </div>
                  
                
                  <div class="form-group col-sm-3">
                  <label>8. Civil Status</label>
                    <select class="custom-select form-control-border" name="pwd_civilStatus" id="select_civil">
                      <option selected value="" disabled>Select</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Separated">Separated</option>
                      <option value="Widow/er">Widow/er</option>
                      <option value="Cohabitation (live-in)">Cohabitation (live-in)</option>
                    </select>
                  </div>

                  <div class="form-group col-sm-3">
                  <label>9. Blood Type</label>
                    <select class="custom-select form-control-border" name="pwd_bloodType" id="select_blood">
                      <option selected value="" disabled>Select</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      
                    </select>
                  </div>
                </div>

                <div class="row pb-3">

                  <div class="form-group col-sm-8">
                    <label>10. Type of Disability</label>
                    <div class="row">
                      <div class="col-6">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="disability_type[]" value="Deaf or Hard of Hearing" id="disability_1">
                          <label class="form-check-label">Deaf or Hard of Hearing</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="disability_type[]" value="Intellectual" id="disability_2">
                          <label class="form-check-label">Intellectual Disability</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="disability_type[]" value="Learning" id="disability_3">
                          <label class="form-check-label">Learning Disability</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="disability_type[]" value="Mental" id="disability_4">
                          <label class="form-check-label">Mental Disability</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="disability_type[]" value="Orthopedic" id="disability_5">
                          <label class="form-check-label">Orthopedic Disability</label>
                        </div>
                      </div>
                      <div class="col-6">
                          <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="disability_type[]" value="Physical" id="disability_6">
                        <label class="form-check-label">Physical Disability</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="disability_type[]" value="Psychosocial" id="disability_7">
                        <label class="form-check-label">Psychosocial Disability</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="disability_type[]" value="Speech and Language Impairment" id="disability_8">
                        <label class="form-check-label">Speech and Language Impairment</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="disability_type[]" value="Visual" id="disability_9">
                        <label class="form-check-label">Visual Disability</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="disability_type[]" value="Cancer (RA11215)" id="disability_10">
                        <label class="form-check-label">Cancer (RA11215)</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="disability_type[]" value="Rare Disease (RA10747)" id="disability_11">
                        <label class="form-check-label">Rare Disease (RA10747)</label>
                      </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-sm-4">
                    <label>11. Cause of Disability</label>
                    <div class="row">
                    <div class="col-6">
                      <div class="form-check">

                        <input class="form-check-input" type="checkbox" name="disability_cause[]" value="Acquired" id="cause_1">
                        <label class="form-check-label">Acquired</label>
                      </div>
                      
                      <div class="form-check">
                        &emsp;
                        <input class="form-check-input" type="checkbox" name="disability_cause[]" value="Chronic Illiness" id="cause_3">
                        <label class="form-check-label">Chronic Illiness</label>
                      </div>
                      <div class="form-check">
                        &emsp;
                        <input class="form-check-input" type="checkbox" name="disability_cause[]" value="Cerebral Palsy (Acquired)" id="cause_2">
                        <label class="form-check-label">Cerebral Palsy (Acquired)</label>
                      </div>
                      <div class="form-check">
                        &emsp;
                        <input class="form-check-input" type="checkbox" name="disability_cause[]" value="Injury" id="cause_5">
                        <label class="form-check-label">Injury</label>
                      </div>
                    </div>


                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="disability_cause[]" value="Congenital/Inborn" id="cause_4">
                        <label class="form-check-label">Congenital/Inborn</label>
                      </div>
                      
                      
                      <div class="form-check">
                         &emsp;
                        <input class="form-check-input" type="checkbox" name="disability_cause[]" value="Autism" id="cause_7">
                        <label class="form-check-label">Autism</label>
                      </div>

                      <div class="form-check">
                        &emsp;
                        <input class="form-check-input" type="checkbox" name="disability_cause[]" value="ADHD" id="cause_6">
                        <label class="form-check-label">ADHD</label>
                      </div>
                      <div class="form-check">
                        &emsp;
                        <input class="form-check-input" type="checkbox" name="disability_cause[]" value="Cerebral Palsy (Inborn)" id="cause_9">
                        <label class="form-check-label">Cerebral Palsy (Inborn)</label>  
                      </div>
                      <div class="form-check">
                        &emsp;
                        <input class="form-check-input" type="checkbox" name="disability_cause[]" value="Down Syndrome" id="cause_10">
                        <label class="form-check-label">Down Syndrome</label>
                      </div>
                      
                    </div>
                  </div>
                  &emsp;
                  <div class="form-check" align="center">
                        <input class="form-check-input" type="checkbox" name="disability_cause_others[]" value="Others" id="cause_8">
                        <label class="form-check-label">Others, Specify:</label>
                  </div>
                 </div>



                 
                </div>

                <label>12. Residence Address</label>
                <div class="row pb-3">
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="House No. & Street" name="pwd_street" value="<?php echo $_SESSION['pwd_house_street'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                  
                    <select class="custom-select form-control-border" name="pwd_barangay" id="select_barangay" required>
                      <option selected value="" disabled value="">Select Barangay</option>
                      <option value="Anibong">Anibong</option>
                      <option value="Biñan">Biñan</option>
                      <option value="Buboy">Buboy</option>
                      <option value="Cabanbanan">Cabanbanan</option>
                      <option value="Calusiche">Calusiche</option>
                      <option value="Dingin">Dingin</option>
                      <option value="Lambac">Lambac</option>
                      <option value="Layugan">Layugan</option>
                      <option value="Magdapio">Magdapio</option>
                      <option value="Maulawin">Maulawin</option>
                      <option value="Pinagsanjan">Pinagsanjan</option>
                      <option value="Barangay I">Barangay I</option>
                      <option value="Barangay II">Barangay II</option>
                      <option value="Sabang">Sabang</option>
                      <option value="Sampaloc">Sampaloc</option>
                      <option value="San Isidro">San Isidro</option>
                    </select>

                  </div>
                  <div class="form-group col-sm-2">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Municipality" value="Pagsanjan" disabled>
                  </div>
                  <div class="form-group col-sm-2">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Province" value="Laguna" disabled>
                  </div>
                  <div class="form-group col-sm-1">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Region" value="4A" disabled>
                  </div>
                </div>

                <label>13. Contact Details</label>
                <div class="row pb-3">
                  
                  <div class="form-group col-sm-3">
                    <input type="number" class="form-control form-control-border" id="exampleInputBorder" placeholder="Mobile No." name="pwd_mobile" value="<?php echo $_SESSION['pwd_mobile'];?>" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" minlength="11">

                  </div>
                  <div class="form-group col-sm-3">
                    <input type="email" class="form-control form-control-border" id="exampleInputBorder" placeholder="E-mail Address" name="pwd_email" value="<?php echo $_SESSION['pwd_email'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Landline No." name="pwd_landline" value="<?php echo $_SESSION['pwd_landline'];?>" maxlength="11">
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="number" class="form-control form-control-border" id="exampleInputBorder" placeholder="Parent/Guardian Contact No." name="pwd_guardian_contact" value="<?php echo $_SESSION['pwd_guardian_contact'];?>" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="11" minlength="11">
                  </div>
                </div>

                
                <div class="row pb-3">
                  
                  <div class="form-group col-sm-4">
                    <label>14. Educational Attainment</label><br>
                    <select class="custom-select form-control-border" name="pwd_education" id="select_education">
                      <option selected value="" disabled>Select</option>
                      <option value="None">None</option>
                      <option value="Elementary Education">Elementary Education</option>
                      <option value="High School Education">High School Education</option>
                      <option value="College">College</option>
                      <option value="Postgraduate Program">Postgraduate Program</option>
                      <option value="Non-Formal">Non-Formal</option>
                      <option value="Vocational">Vocational</option>
                    </select>
                    
                  </div>
                  
                  <div class="form-group col-sm-4">
                    <label>15. Status of Employment</label><br>
                    <select class="custom-select form-control-border" name="pwd_employmentStatus" id="select_employment">
                      <option selected value="" disabled>Select</option>
                      <option value="Employed">Employed</option>
                      <option value="Unemployed">Unemployed</option>
                      <option value="Self-Employed">Self-Employed</option>
                    </select>
                    <br><br><br>
                    <label>15a. Category of Employment</label><br>
                    <select class="custom-select form-control-border" name="pwd_employmentCategory" id="select_category">
                      <option selected value="" disabled>Select</option>
                      <option value="Government">Government</option>
                      <option value="Private">Private</option>
                    </select>
                    <br><br><br>
                    <label>15b. Types of Employment</label><br>
                    <select class="custom-select form-control-border" name="pwd_employmentType" id="select_type">
                      <option selected value="" disabled>Select</option>
                      <option value="Permanent/Regular">Permanent/Regular</option>
                      <option value="Seasonal">Seasonal</option>
                      <option value="Casual">Casual</option>
                      <option value="Emergency">Emergency</option>
                    </select>
                  </div>

                  <div class="form-group col-sm-4">
                    <label>16. Occupation</label><br>
                    <select class="custom-select form-control-border" name="pwd_occupation" id="select_occupation">
                      <option selected value="" disabled>Select</option>
                      <option value="Managers">Managers</option>
                      <option value="Professionals">Professionals</option>
                      <option value="Technician and Associate Professionals">Technician and Associate Professionals</option>
                      <option value="Clerical Support Workers">Clerical Support Workers</option>
                      <option value="Service and Sales Workers">Service and Sales Workers</option>
                      <option value="Skilled Agricultural, Forestry and Fishery Workers">Skilled Agricultural, Forestry and Fishery Workers</option>
                      <option value="Craft and Related Trade Workers">Craft and Related Trade Workers</option>
                      <option value="Plant and Machine Operators and Assemblers">Plant and Machine Operators and Assemblers</option>
                      <option value="Elementary Occupations">Elementary Occupations</option>
                      <option value="Armed Forces Occupations">Armed Forces Occupations</option>
                      <option value="Others">Others, specify: </option>

                    </select>
                  </div>

                  
                </div>


                <label>17. Organization Information</label>
                <div class="row pb-3">
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Organization Affiliated" name="pwd_organization" value="<?php echo $_SESSION['pwd_organization'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Contact Person" name="pwd_organizationPerson" value="<?php echo $_SESSION['pwd_organization_contact'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Office Address" name="pwd_organizationAddress" value="<?php echo $_SESSION['pwd_organization_address'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Tel Nos." name="pwd_organizationTelephone" value="<?php echo $_SESSION['pwd_organization_telephone'];?>">
                  </div>
                </div>


                <label>18. ID Reference No.</label>
                <div class="row pb-3">
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="SSS NO." name="pwd_sss" value="<?php echo $_SESSION['pwd_sss'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="GSIS NO." name="pwd_gsis" value="<?php echo $_SESSION['pwd_gsis'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Pag-IBIG NO." name="pwd_pagibig" value="<?php echo $_SESSION['pwd_pagibig'];?>">
                  </div>
                  <div class="form-group col-sm-3">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="PhilHealth NO." name="pwd_philhealth" value="<?php echo $_SESSION['pwd_philhealth'];?>">
                  </div>
                </div>

                <label>19. Family Background</label>
                <div class="row pb-3">
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Father's Last Name" name="pwd_fatherLastname" value="<?php echo $_SESSION['pwd_father_lastname'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Father's First Name" name="pwd_fatherFirstname"  value="<?php echo $_SESSION['pwd_father_firstname'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Father's Middle Name" name="pwd_fatherMiddlename"  value="<?php echo $_SESSION['pwd_father_middlename'];?>">
                  </div>  
                </div>

                <div class="row pb-3">
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Mother's Last Name" name="pwd_motherLastname" value="<?php echo $_SESSION['pwd_mother_lastname'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Mother's First Name" name="pwd_motherFirstname" value="<?php echo $_SESSION['pwd_mother_firstname'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Mother's Middle Name" name="pwd_motherMiddlename" value="<?php echo $_SESSION['pwd_mother_middlename'];?>">
                  </div>  
                </div>

                <div class="row pb-3">
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Guardian's Last Name" name="pwd_guardianLastname" value="<?php echo $_SESSION['pwd_guardian_lastname'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Guardian's First Name" name="pwd_guardianFirstname" value="<?php echo $_SESSION['pwd_guardian_firstname'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Guardian's Middle Name" name="pwd_guardianMiddlename" value="<?php echo $_SESSION['pwd_guardian_middlename'];?>">
                  </div>  
                </div>

                <label>20. Accomplished By</label>
                <div class="row pb-3">
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Last Name" name="accomplish_lastname" value="<?php echo $_SESSION['accomplished_lastname'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="First Name" name="accomplish_firstname" value="<?php echo $_SESSION['accomplished_firstname'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Middle Name" name="accomplish_middlename" value="<?php echo $_SESSION['accomplished_middlename'];?>">
                  </div>  
                </div>

                
                <div class="row pb-3">
                  <div class="form-group col-sm-6">
                    <label>20a. Name of Reporting Unit</label>
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Name" name="reportingUnit_name" value="<?php echo $_SESSION['reporting_unit'];?>">
                  </div>
                  <div class="form-group col-sm-6">
                    <label>21. Registration Number</label>
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Registration Number" name="registration_number" value="<?php echo $_SESSION['registration_number'];?>">
                  </div>
                </div>


                <label>22. Economic Conditions</label>
                <div class="row pb-3">
                  <div class="form-group col-sm-4">
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="customRadio3" name="living" value="Living Alone">
                      <label for="customRadio3" class="custom-control-label">Living Alone</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="customRadio4" name="living" value="Living w/ Husband">
                      <label for="customRadio4" class="custom-control-label">Living w/ Husband</label>
                    </div>
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Name of Spouse" name="pwd_spouseName" value="<?php echo $_SESSION['pwd_spouse_name'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="number" class="form-control form-control-border" id="exampleInputBorder" placeholder="Age" min="1" name="pwd_spouseAge" value="<?php if($_SESSION['pwd_spouse_age'] == 0){ echo ""; } else {echo $_SESSION['pwd_spouse_age'];}?>">
                  </div>
                    
                </div>

                <div class="row pb-3">
                  <div class="form-group col-sm-4">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pwd_support" value="Receiving Support from relatives/friends" id="economic_1">
                    <label class="form-check-label">Receiving Support from relatives/friends</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="pwd_pensioner" value="Pensioner" id="economic_2">
                    <label class="form-check-label">Pensioner</label>
                  </div>
                  </div>

                  <div class="form-group col-sm-4">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Type of Pensioner" name="pwd_pensionerType" value="<?php echo $_SESSION['pwd_pensioner_type'];?>">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="number" class="form-control form-control-border" id="exampleInputBorder" min="1" placeholder="Monthly Pension" name="pwd_pensionMonthly" value="<?php echo $_SESSION['pwd_pension_monthly'];?>">
                  </div>
                  
                </div>

                <div class="row pb-3">
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Source of Income" name="pwd_incomeSource" value="<?php echo $_SESSION['pwd_income_source'];?>">
                  </div>
                  <div class="form-group col-sm-6">
                    <input type="number" class="form-control form-control-border" id="exampleInputBorder" min="1" placeholder="Estimated Monthly Income" name="pwd_incomeMonthly" value="<?php echo $_SESSION['pwd_income_monthly'];?>">
                  </div>
                </div>

                <div class="row pb-3">
                  <div class="form-group col-6">
                    <label>Remarks</label>
                    <textarea class="form-control " name="pwd_remarks"><?php echo $_SESSION['pwd_remarks'];?></textarea>
                  </div>
                  <div class="form-group col-6">
                    <label>Interview by</label>
                    <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Interviewed By"  value="<?php echo $_SESSION['interviewed_by'];?>" disabled>
                    <input type="hidden" name="pwd_interviewer" value="<?php echo $_SESSION['interviewed_by'];?>">
                  </div>
                  
                </div>





                <div class="row pb-3">
                  <div class="form-group col-6">
                    <label>Accessibility Needs (e.g., Assistive Device, Mobility Aids, Communication Preferences)</label>
                    <textarea class="form-control " name="pwd_accessibility" required><?php echo $_SESSION['accessibility_needs'];?></textarea>
                  </div>

                  <div class="form-group col-6">
                    <label>Services Needs (e.g., Medical, Therapy, Education)</label>
                    <textarea class="form-control " name="pwd_services" required><?php echo $_SESSION['services_needs'];?></textarea>
                  </div>
                  
                </div>




               
                <br><br><br>
                <button type="submit" class="btn btn-primary" name="submit-edit-pwd">Submit</button> &nbsp <input class="btn btn-danger" type="button" value="Reset" onclick="confirm_reset()">
              </div>
              <!-- /.card-body -->
              </form>
              
            </div>
        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>PDDMS &copy; 2022-2023.</strong> All rights reserved.
  </footer>

  <?php
  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
  ?>
  <script>
    swal({
      title: "<?php echo($_SESSION['status_title'])?>", 
      text: "<?php echo($_SESSION['status'])?>", 
      icon: "<?php echo($_SESSION['status_code'])?>"});
  </script>



  <?php
  unset($_SESSION['status']);
  }

  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Popper  -->
<script src="../plugins/popper/popper.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
  function confirm_reset() {
    
    if (confirm("Are you sure you want to reset all text?")) {
      document.getElementById("myForm").reset();
      window.scrollTo({ top: 0, behavior: 'smooth' });
      var elem = document.getElementById("other_occupation_id");
      elem.parentNode.removeChild(elem);

    }
  }

</script>
<script type="text/javascript">
  jQuery(function($){                      //calling the code inside braces when document loads and passing jQuery object as '$' parameter;
   $("select[name='pwd_occupation']").change(function(){        //binding an event that fires every time select value changes
      var select = $(this);              //caching select, which value was changed
      if(select.val() == "Others" || ){     //checking if we selected the right option
          $("<input>").attr({type: "text", name: "pwd_occupationOther", class: "form-control form-control-border", id: "other_occupation_id", placeholder:"Other Occupation"}).appendTo(select.parent()).focus();   //creating new input element object, setting its value to "value4" and appending to select parent element or wherever you want it
      }
      else if(select.val() != "Others") {
        $('#other_occupation_id').remove();
      }
   });        
});
</script>

<script type="text/javascript">
  jQuery(function($){                      //calling the code inside braces when document loads and passing jQuery object as '$' parameter;
   $("input:checkbox[name='disability_cause_others[]']").change(function(){        //binding an event that fires every time select value changes
      var select2 = $(this);              //caching select, which value was changed

      if ($('#cause_8').is(":checked")) {
        $("<input>").attr({type: "text", name: "pwd_disability_cause_others", class: "form-control form-control-border", id: "other_disability_cause", placeholder:"Other Cause of Disability"}).appendTo(select2.parent()).focus();   //creating new input element object, setting its value to "value4" and appending to select parent element or wherever you want it
      } else {
        $('#other_disability_cause').remove();
      }
   });        
});
</script>






<script type="text/javascript">
$('button[type="submit"]').on('click', function() {
  $cbx_group = $("input:checkbox[name='disability_type[]']");
  

  $cbx_group.prop('required', true);
  if($cbx_group.is(":checked")){
    $cbx_group.prop('required', false);
  }
});

// $('button[type="submit"]').on('click', function() {
//   $cbx_group = $("input:checkbox[name='disability_cause[]']");
  

//   $cbx_group.prop('required', true);
//   if($cbx_group.is(":checked")){
//     $cbx_group.prop('required', false);
//   }
// });
$('button[type="submit"]').on('click', function() {
  return confirm('Are you sure you want to submit this form?');
});

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.checking-number').keyup(function(e){
        // alert("Hellow");
        var pwd_number = $('.checking-number').val();
        // alert(pwd_number);
        $.ajax({
          type: "POST",
          url: "../controller.php",
          data: {
                "check-pwd-number": 1, 
                "pwdnumber": pwd_number,
          },
          
          success: function (response){
              
              $('.error-message').text(response);
          }
        });
    });

  $('.calculate-age').focusout(function(e){
    var birthday = $(this).val();
    let yourDate = new Date()
    var today = yourDate.toISOString().split('T')[0];
    var new_today = new Date(today);
    var new_birthday = new Date(birthday);
    
    var age = new_today.getFullYear() - new_birthday.getFullYear();
    var m = new_today.getMonth() - new_birthday.getMonth();
    if (m < 0 || (m === 0 && new_today.getDate() < new_birthday.getDate())) {
        age--;
    }
    $('.calculated-age').val(age);

  });
  // Gender Selection
  var gender = "<?php echo $_SESSION['pwd_sex'];?>";
  if (gender == "Male") {
    $("#customRadio1").prop("checked", true);
  }
  else if (gender == "Female") {
    $("#customRadio2").prop("checked", true);
  }
  
  // Civil Status Selection
  var civil = "<?php echo $_SESSION['pwd_civil_status'];?>";
  if (civil == "Single") {
    $("#select_civil").val("Single");
  }
  else if (civil == "Married") {
    $("#select_civil").val("Married");
  }
  else if (civil == "Separated") {
    $("#select_civil").val("Separated");
  }
  else if (civil == "Widow/er") {
    $("#select_civil").val("Widow/er");
  }
  else if (civil == "Cohabitation (live-in)") {
    $("#select_civil").val("Cohabitation (live-in)");
  }

  // Blood Selection
  var blood = "<?php echo $_SESSION['pwd_blood_type'];?>";
  if (blood == "A+") {
    $("#select_blood").val("A+");
  }
  else if (blood == "A-") {
    $("#select_blood").val("A-");
  }
  else if (blood == "AB+") {
    $("#select_blood").val("AB+");
  }
  else if (blood == "AB-") {
    $("#select_blood").val("AB-");
  }
  else if (blood == "B+") {
    $("#select_blood").val("B+");
  }
  else if (blood == "B-") {
    $("#select_blood").val("B-");
  }
  else if (blood == "O+") {
    $("#select_blood").val("O+");
  }
  else if (blood == "O-") {
    $("#select_blood").val("O-");
  }

  // Disability types
  <?php
    foreach ($disability_array as $disability_string) {
    if ($disability_string == "Psychosocial") {
    ?>
      $("#disability_7").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Physical") {
    ?>
      $("#disability_6").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Deaf or Hard of Hearing") {
    ?>
      $("#disability_1").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Intellectual") {
    ?>
      $("#disability_2").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Learning") {
    ?>
      $("#disability_3").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Mental") {
    ?>
      $("#disability_4").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Orthopedic") {
    ?>
      $("#disability_5").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Speech and Language Impairment") {
    ?>
      $("#disability_8").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Visual") {
    ?>
      $("#disability_9").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Cancer"){
    ?>
      $("#disability_10").prop( "checked", true );
    <?php
    }
    else if ($disability_string == "Rare Disease"){
    ?>
      $("#disability_11").prop( "checked", true );
    <?php
    }
    ?>

  <?php
    }
  ?>


  // Disability Cause
  <?php
    foreach ($cause_array as $cause_string) {
    if ($cause_string == "Acquired") {
    ?>
      $("#cause_1").prop( "checked", true );
    <?php
    }
    else if ($cause_string == "Cerebral Palsy (Acquired)") {
    ?>
      $("#cause_2").prop( "checked", true );
    <?php
    }
    else if ($cause_string == "Chronic Illiness") {
    ?>
      $("#cause_3").prop( "checked", true );
    <?php
    }
    else if ($cause_string == "Congenital/Inborn") {
    ?>
      $("#cause_4").prop( "checked", true );
    <?php
    }
    else if ($cause_string == "Injury") {
    ?>
      $("#cause_5").prop( "checked", true );
    <?php
    }
    else if ($cause_string == "ADHD") {
    ?>
      $("#cause_6").prop( "checked", true );
    <?php
    }
    else if ($cause_string == "Cerebral Palsy (Congenital/Inborn)") {
    ?>
      $("#cause_9").prop( "checked", true );
    <?php
    }
    else if ($cause_string == "Down Syndrome") {
    ?>
      $("#cause_10").prop( "checked", true );
    <?php
    }
    else if ($cause_string == "Autism") {
    ?>
      $("#cause_7").prop( "checked", true );
    <?php
    }
    ?>


  <?php
    }
  ?>
// Barangay Selection
  var barangay = "<?php echo $_SESSION['pwd_barangay'];?>";
  if (barangay == "Anibong") {
    $("#select_barangay").val("Anibong");
  }
  else if (barangay == "Biñan") {
    $("#select_barangay").val("Biñan");
  }
  else if (barangay == "Buboy") {
    $("#select_barangay").val("Buboy");
  }
  else if (barangay == "Cabanbanan") {
    $("#select_barangay").val("Cabanbanan");
  }
  else if (barangay == "Calusiche") {
    $("#select_barangay").val("Calusiche");
  }
  else if (barangay == "Dingin") {
    $("#select_barangay").val("Dingin");
  }
  else if (barangay == "Lambac") {
    $("#select_barangay").val("Lambac");
  }
  else if (barangay == "Layugan") {
    $("#select_barangay").val("Layugan");
  }
  else if (barangay == "Magdapio") {
    $("#select_barangay").val("Magdapio");
  }
  else if (barangay == "Maulawin") {
    $("#select_barangay").val("Maulawin");
  }
  else if (barangay == "Pinagsanjan") {
    $("#select_barangay").val("Pinagsanjan");
  }
  else if (barangay == "Biñan") {
    $("#select_barangay").val("Biñan");
  }
  else if (barangay == "Barangay I") {
    $("#select_barangay").val("Barangay I");
  }
  else if (barangay == "Barangay II") {
    $("#select_barangay").val("Barangay II");
  }
  else if (barangay == "Sabang") {
    $("#select_barangay").val("Sabang");
  }
  else if (barangay == "Sampaloc") {
    $("#select_barangay").val("Sampaloc");
  }
  else if (barangay == "San Isidro") {
    $("#select_barangay").val("San Isidro");
  }


  // Education Selection
  var education = "<?php echo $_SESSION['pwd_education'];?>";
  if (education == "None") {
    $("#select_education").val("None");
  }
  else if (education == "Elementary Education") {
    $("#select_education").val("Elementary Education");
  }
  else if (education == "High School Education") {
    $("#select_education").val("High School Education");
  }
  else if (education == "College") {
    $("#select_education").val("College");
  }
  else if (education == "Postgraduate Program") {
    $("#select_education").val("Postgraduate Program");
  }
  else if (education == "Non-Formal") {
    $("#select_education").val("Non-Formal");
  }
  else if (education == "Vocational") {
    $("#select_education").val("Vocational");
  }

  // Employment Status Selection
  var status = "<?php echo $_SESSION['pwd_employment_status'];?>";
  if (status == "Employed") {
    $("#select_employment").val("Employed");
  }
  else if (status == "Unemployed") {
    $("#select_employment").val("Unemployed");
  }
  else if (status == "Self-Employed") {
    $("#select_employment").val("Self-Employed");
  }

  // Employment Category Selection
  var category = "<?php echo $_SESSION['pwd_employment_category'];?>";
  if (category == "Government") {
    $("#select_category").val("Government");
  }
  else if (category == "Private") {
    $("#select_category").val("Private");
  }

  // Employment Type Selection
  var type = "<?php echo $_SESSION['pwd_employment_type'];?>";
  if (type == "Permanent/Regular") {
    $("#select_type").val("Permanent/Regular");
  }
  else if (type == "Seasonal") {
    $("#select_type").val("Seasonal");
  }
  else if (type == "Casual") {
    $("#select_type").val("Casual");
  }
  else if (type == "Emergency") {
    $("#select_type").val("Emergency");
  }
  

  // Other Cause Selection
  var other = "<?php echo $_SESSION['pwd_disability_cause_others'];?>";
  if (other != "") {
    var select2 = $("#cause_8");
    $("<input>").attr({type: "text", name: "pwd_disability_cause_others", class: "form-control form-control-border", id: "other_disability_cause", placeholder:"Other Cause of Disability"}).appendTo(select2.parent()).val(other);
    $("#cause_8").prop("checked", true);
  }



  // Occupation Selection
  var occupation = "<?php echo $_SESSION['pwd_occupation'];?>";
  if (occupation == "Managers") {
    $("#select_occupation").val("Managers");
  }
  else if (occupation == "Professionals") {
    $("#select_occupation").val("Professionals");
  }
  else if (occupation == "Technician and Associate Professionals") {
    $("#select_occupation").val("Technician and Associate Professionals");
  }
  else if (occupation == "Clerical Support Workers") {
    $("#select_occupation").val("Clerical Support Workers");
  }
  else if (occupation == "Service and Sales Workers") {
    $("#select_occupation").val("Service and Sales Workers");
  }
  else if (occupation == "Skilled Agricultural, Forestry and Fishery Workers") {
    $("#select_occupation").val("Skilled Agricultural, Forestry and Fishery Workers");
  }
  else if (occupation == "Craft and Related Trade Workers") {
    $("#select_occupation").val("Craft and Related Trade Workers");
  }
  else if (occupation == "Plant and Machine Operators and Assemblers") {
    $("#select_occupation").val("Plant and Machine Operators and Assemblers");
  }
  else if (occupation == "Elementary Occupations") {
    $("#select_occupation").val("Elementary Occupations");
  }
  else if (occupation == "Armed Forces Occupations") {
    $("#select_occupation").val("Armed Forces Occupations");
  }
  else if (occupation == "") {
    $("#select_occupation").val();
  }
  else {
    $("#select_occupation").val("Others");
    var select = $("#select_occupation");    //caching select, which value was changed
      if(select.val() == "Others"){     //checking if we selected the right option
          $("<input>").attr({type: "text", name: "pwd_occupationOther", class: "form-control form-control-border", id: "other_occupation_id", placeholder:"Other Occupation"}).appendTo(select.parent()).focus();   //creating new input element object, setting its value to "value4" and appending to select parent element or wherever you want it
          $("#other_occupation_id").val("<?php echo $_SESSION['pwd_occupation'] ?>");
      }
      else if(select.val() != "Others") {
        $('#other_occupation_id').remove();
      }
  }


  // Gender Selection
  var living = "<?php echo $_SESSION['pwd_living'];?>";
  if (living == "Living Alone") {
    $("#customRadio3").prop("checked", true);
  }
  else if (living == "Living w/ Husband") {
    $("#customRadio4").prop("checked", true);
  }


  // Economic Condition Checkboxes
  <?php
  if ($support != "" || $support != NULL) {
  ?>
    $("#economic_1").prop( "checked", true );
  <?php
  }
  if ($pensioner != "" || $pensioner != NULL ) {
  ?>
    $("#economic_2").prop( "checked", true );
  <?php
  }
  ?>

  <?php 
  if ($pwd_number == " " or $pwd_number===NULL) {
  ?>
    $("#pwd_unique").prop('disabled', true);

  <?php
  }
  else{
  ?>
    $("#pwd_unique").prop('disabled', false);
    $("#pwd_unique").val("<?php echo $_SESSION['pwd_number'];?>");
  <?php  
  }
  ?>

  $('#pwd_unique').keyup(function(e){
        // alert("Hellow");
        var pwd_number = $(this).val();
        // alert(pwd_number);
        $.ajax({
          type: "POST",
          url: "../controller.php",
          data: {
                "check-pwd-number": 1, 
                "pwdnumber": pwd_number,
          },
          
          success: function (response){
              
              $('.error-message').text(response);
          }
        });
    });
  
  
  
  


  });
</script>




</body>
</html>
