<?php
  
  require_once "../controller.php";
  

  if (!isset($_SESSION['id_number'])) {
    header('location: ../index.php');
  }

  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Report</title>
  <!-- Favicon-->
  <link rel="icon" href="../dist/img/pdao_logo.png" type="image/ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" type="text/css" href="../css/Source-Sans-Pro.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- DataTables Css -->
  <!-- <link rel="stylesheet" type="text/css" href="../plugins/datatables/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="../plugins/css/bootstrap.min.css"> -->

  <!-- SweetAlert -->
  <script src="../js/sweetalert.min.js"></script>
  
  <style type="text/css">
   .pdao, .pagsanjan{
      width: 120px;
      height: 120px;
   }
   
  </style>
  
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
      <img src="../dist/img/pdao_logo.png" alt="PDAO Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
      <span class="brand-text font-weight-bold">PDAO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar pt-5">
      


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
            <a href="pwd.php" class="nav-link ">
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
            <a href="report.php" class="nav-link active">
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
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card mx-4 shadow-lg">
        <div class="card-header">
          <h1 class="card-title">Number of Persons With Disability (12-18 years Old)</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered" id="myTable">
            <thead class="border">
              <tr>
                <th class="text-center">Type of Disability</th>
                <th class="text-center">Male</th>
                <th class="text-center">Female</th>
                <th class="text-center">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $disability_query = mysqli_query($con, "SELECT DISTINCT(pwd_disability_type) FROM pwd_table where pwd_number!=''");
                while($col = mysqli_fetch_assoc($disability_query)){
                  $disability = $col['pwd_disability_type'];
              ?> 
              <tr>
                <td ><?php echo $disability; ?></td>
                

                


              
                <?php 
                  $male = mysqli_query($con, "SELECT count(pwd_sex) as count_male from pwd_table where pwd_disability_type='$disability' and pwd_sex='Male' and pwd_age between 12 and 18 and pwd_number!=''");
                  $fetch_male = mysqli_fetch_assoc($male);
                ?>
                <td class="text-center"><?php echo $fetch_male['count_male']; ?></td>

                <?php 
                  $female = mysqli_query($con, "SELECT count(pwd_sex) as count_female from pwd_table where pwd_disability_type='$disability' and pwd_sex='Female' and pwd_age between 12 and 18 and pwd_number!=''");
                  $fetch_female = mysqli_fetch_assoc($female);
                ?>
                <td class="text-center"><?php echo $fetch_female['count_female']; ?></td>

                <?php
                  $male_female = mysqli_query($con, "SELECT count(pwd_sex) as count_male_female from pwd_table where pwd_disability_type='$disability' and pwd_age between 12 and 18 and pwd_number!=''");
                  $fetch_male_female = mysqli_fetch_assoc($male_female);
                ?>
                <td class="text-center"><?php echo $fetch_male_female['count_male_female']; ?></td>


              </tr>
              <?php } ?>
              <tr>
                <td><b>TOTAL</b></td>
                
                <?php
                  $total_disability_m = mysqli_query($con, "SELECT COUNT(pwd_id) as total_count from pwd_table where pwd_sex='Male' and pwd_age between 12 and 18 and pwd_number!=''");
                  $fetch_total_disability1 = mysqli_fetch_assoc($total_disability_m);
                ?>
                <td class="text-center"><b><?php echo $fetch_total_disability1['total_count'];?></b></td>

                <?php
                  $total_disability_f = mysqli_query($con, "SELECT COUNT(pwd_id) as total_count from pwd_table where pwd_sex='Female' and pwd_age between 12 and 18 and pwd_number!=''" );
                  $fetch_total_disability2 = mysqli_fetch_assoc($total_disability_f);
                ?>
                <td class="text-center"><b><?php echo $fetch_total_disability2['total_count'];?></b></td>

                <?php
                  $total_disability_mf = mysqli_query($con, "SELECT COUNT(pwd_id) as total_count from pwd_table where pwd_age between 12 and 18 and pwd_number!=''");
                  $fetch_total_disability3 = mysqli_fetch_assoc($total_disability_mf);
                ?>
                <td class="text-center"><b><?php echo $fetch_total_disability3['total_count'];?></b></td>
                


              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        
      </div>



      <div class="card mx-4 shadow-lg">
        <div class="card-header">
          <h1 class="card-title">DILG Report</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered" id="myTable">
            <thead class="border">
              <tr>
                <th rowspan="2">Type of Disability</th>
                <th rowspan="2" class="text-center">Total No. of Individuals with this type of Disability</th>
                <th rowspan="2">Age Range</th>
                <th colspan="2">Sex (Disaggregated Total No.)</th>
                <th rowspan="2">Total No. of Persons with Disabilities Within Jurisdiction</th>
              </tr>
              <tr>
                
                <th class="text-center">Male</th>
                <th class="text-center">Female</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $disability_query = mysqli_query($con, "SELECT DISTINCT(pwd_disability_type) FROM pwd_table where pwd_number!=''");
                while($col = mysqli_fetch_assoc($disability_query)){
                  $disability = $col['pwd_disability_type'];
              ?> 
              <tr>
                <td ><?php echo $disability; ?></td>
                

                <?php 
                  $count_per_disability_array = mysqli_query($con, "SELECT COUNT(pwd_disability_type) as count from pwd_table where pwd_disability_type='$disability' and pwd_number!=''");
                  $fetch_disability = mysqli_fetch_assoc($count_per_disability_array);
                ?>
                <td class="text-center"><?php echo $fetch_disability['count']; ?></td>


                <?php 
                  $age_range = mysqli_query($con, "SELECT MIN(pwd_age) as lowest_age, MAX(pwd_age) as highest_age from pwd_table where pwd_disability_type='$disability' and pwd_number!=''");
                  $fetch_age = mysqli_fetch_assoc($age_range);
                ?>
                <td><?php echo $fetch_age['lowest_age']."-".$fetch_age['highest_age'];?></td>
                

                <?php 
                  $male = mysqli_query($con, "SELECT count(pwd_sex) as count_male from pwd_table where pwd_disability_type='$disability' and pwd_sex='Male' and pwd_number!=''");
                  $fetch_male = mysqli_fetch_assoc($male);
                ?>
                <td class="text-center"><?php echo $fetch_male['count_male']; ?></td>

                <?php 
                  $female = mysqli_query($con, "SELECT count(pwd_sex) as count_female from pwd_table where pwd_disability_type='$disability' and pwd_sex='Female' and pwd_number!=''");
                  $fetch_female = mysqli_fetch_assoc($female);
                ?>
                <td class="text-center"><?php echo $fetch_female['count_female']; ?></td>
                <td class="text-center"><?php echo $fetch_disability['count']; ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td><b>TOTAL</b></td>
                
                <?php
                  $total_disability = mysqli_query($con, "SELECT COUNT(pwd_id) as total_count from pwd_table where pwd_number!=''");
                  $fetch_total_disability = mysqli_fetch_assoc($total_disability);
                ?>
                <td class="text-center"><b><?php echo $fetch_total_disability['total_count'];?></b></td>
                <td></td>

                <?php 
                  $total_male = mysqli_query($con, "SELECT COUNT(pwd_sex) as total_male from pwd_table where pwd_sex='Male' and pwd_number!=''");
                  $fetch_total_male = mysqli_fetch_assoc($total_male);
                ?>
                <td class="text-center"><b><?php echo $fetch_total_male['total_male']?></b></td>

                <?php
                  $total_female = mysqli_query($con, "SELECT COUNT(pwd_sex) as total_female from pwd_table where pwd_sex='Female' and pwd_number!=''");
                  $fetch_total_female = mysqli_fetch_assoc($total_female);
                ?>
                <td class="text-center"><b><?php echo $fetch_total_female['total_female']?></b></td>
                <td class="text-center"><b><?php echo $fetch_total_disability['total_count'];?></b></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        
      </div>
      <br>
      <div class="card mx-4 shadow-lg">
        <div class="card-header">
          <h1 class="card-title">Disability Data (LGU Disability Data Compliance Report)</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered" id="myTable2">
            <thead>
              <tr>
                <th>Data Field</th>
                <th class="text-center">Male</th>
                <th class="text-center">Female</th>
                <th class="text-center">Total</th>
                <th class="text-center">Description or additional information</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>No. of children with disabilities issued with IDs (below 18 years old)</td>
                <?php 
                  $children = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_male from pwd_table where pwd_sex='Male' and pwd_age < 18 and pwd_number!=''");
                  $fetch_children = mysqli_fetch_assoc($children);

                  $children2 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_female from pwd_table where pwd_sex='Female' and pwd_age < 18 and pwd_number!=''");
                  $fetch_children2 = mysqli_fetch_assoc($children2);

                  $children3 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_children from pwd_table where pwd_age < 18 and pwd_number!=''");
                  $fetch_children3 = mysqli_fetch_assoc($children3);

                ?>
                <td><?php echo $fetch_children['count_male'];?></td>
                <td><?php echo $fetch_children2['count_female'];?></td>
                <td><?php echo $fetch_children3['count_children'];?></td>
                <td></td>
              </tr>
              <tr>
                <td>No. of youth with disabilities issued with IDs (18-30 years old)</td>

                <?php
                  $youth = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_male from pwd_table where pwd_sex='Male' and pwd_age >= 18 and pwd_age <= 30 and pwd_number!=''");
                  $fetch_youth = mysqli_fetch_assoc($youth);

                  $youth2 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_female from pwd_table where pwd_sex='Female' and pwd_age >= 18 and pwd_age <= 30 and pwd_number!=''");
                  $fetch_youth2 = mysqli_fetch_assoc($youth2);

                  $youth3 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_youth from pwd_table where pwd_age >= 18 and pwd_age <= 30 and pwd_number!=''");
                  $fetch_youth3 = mysqli_fetch_assoc($youth3);
                ?>
                <td><?php echo $fetch_youth['count_male']?></td>
                <td><?php echo $fetch_youth2['count_female']?></td>
                <td><?php echo $fetch_youth3['count_youth']?></td>
                <td></td>
              </tr>
              <tr>
                <td>No. of persons with disabilities issued with IDs aged(31-59 years old)</td>

                <?php
                  $person = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_male from pwd_table where pwd_sex='Male' and pwd_age >= 31 and pwd_age <= 59 and pwd_number!=''");
                  $fetch_person = mysqli_fetch_assoc($person);

                  $person2 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_female from pwd_table where pwd_sex='Female' and pwd_age >= 31 and pwd_age <= 59 and pwd_number!=''");
                  $fetch_person2 = mysqli_fetch_assoc($person2);

                  $person3 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_person from pwd_table where pwd_age >= 31 and pwd_age <= 59 and pwd_number!=''");
                  $fetch_person3 = mysqli_fetch_assoc($person3);
                ?>
                <td><?php echo $fetch_person['count_male']?></td>
                <td><?php echo $fetch_person2['count_female']?></td>
                <td><?php echo $fetch_person3['count_person']?></td>
                <td></td>
              </tr>
              <tr>
                <td>No. of senior with disabilities issued with IDs (60 years old and above)</td>

                <?php
                  $senior = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_male from pwd_table where pwd_sex='Male' and pwd_age >= 60 and pwd_number!=''");
                  $fetch_senior = mysqli_fetch_assoc($senior);

                  $senior2 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_female from pwd_table where pwd_sex='Female' and pwd_age >= 60 and pwd_number!=''");
                  $fetch_senior2 = mysqli_fetch_assoc($senior2);

                  $senior3 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_senior from pwd_table where pwd_age >= 60 and pwd_number!=''");
                  $fetch_senior3 = mysqli_fetch_assoc($senior3);
                ?>
                <td><?php echo $fetch_senior['count_male']?></td>
                <td><?php echo $fetch_senior2['count_female']?></td>
                <td><?php echo $fetch_senior3['count_senior']?></td>
                <td></td>
              </tr>
              <tr>
                <td>Total No. of Persons with Disabilities issued with IDs (RA 9442)</td>

                <?php
                  $total = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_male from pwd_table where pwd_sex='Male' and pwd_number!=''");
                  $fetch_total = mysqli_fetch_assoc($total);

                  $total2 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_female from pwd_table where pwd_sex='Female' and pwd_number!=''");
                  $fetch_total2 = mysqli_fetch_assoc($total2);

                  $total3 = mysqli_query($con, "SELECT COUNT(pwd_sex) as count_total from pwd_table where pwd_number!=''");
                  $fetch_total3 = mysqli_fetch_assoc($total3);
                ?>
                <td><?php echo $fetch_total['count_male']?></td>
                <td><?php echo $fetch_total2['count_female']?></td>
                <td><?php echo $fetch_total3['count_total']?></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        
      </div>

      <div class="card mx-4 shadow-lg">
        <div class="card-header">
          <h1 class="card-title">DOLE Form</h1>
        </div>
        <form method="POST">
        <div class="card-body">
          
          <div class="row">
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary" id="birthday_button" name="generate-dole"><i class="fas fa-file-excel"></i> &nbsp Excel</button>
            </div>
          </div>
          
          
        </div>
        </form>
      </div>
      <br>

      <div class="card mx-4 shadow-lg">
        <div class="card-header">
          <h1 class="card-title">Raw Data</h1>
        </div>
        <form method="POST">
        <div class="card-body">
          
          <div class="row">
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary" id="birthday_button" name="generate-raw"><i class="fas fa-file-excel"></i> &nbsp Raw Excel</button>
            </div>
          </div>
          
          
        </div>
        </form>
      </div>
      <br>




      
      <div class="card mx-4 shadow-lg">
        <div class="card-header">
          <h1 class="card-title">Birthday Report</h1>
        </div>
        <form method="POST">
        <div class="card-body">
          
          <div class="row">
            <div class="col-sm-4">
            <select class="form-control" name="month" id="select_birthday" required>
              <option selected disabled value="">Select Month</option>
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>
            </div>
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary" id="birthday_button" name="generate-birthday"><i class="fas fa-print"></i> &nbsp Generate</button>
            </div>
          </div>
          
          
        </div>
        </form>
      </div>
      <br>
      <div class="card mx-4 shadow-lg">
        <form method="POST">
        <div class="card-header">
          <h1 class="card-title">Custom Report</h1>
        </div>
        
        <div class="card-body">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-filter"></i> 
            Customize Report
          </button>

          <!-- Modal -->
          <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Customize Report</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">

                    <div class="form-group">
                      <input type="radio" id="with" name="filter_pwd_number" value="With PWD Number" required>
                      <label for="with">With PWD Number</label>
                    </div>
                    &nbsp &nbsp &nbsp

                    <div class="form-group">
                      <input type="radio" id="without" name="filter_pwd_number" value="Without PWD Number">
                      <label for="without">Without PWD Number</label>
                    </div>
                    &nbsp &nbsp &nbsp

                    <div class="form-group">
                      <input type="radio" id="all" name="filter_pwd_number" value="All PWD">
                      <label for="all">All</label>
                    </div>
                    
                  </div>


                  <div class="row">
                    <div class="col-sm-6">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox1" value="pwd_number">
                        <label for="customCheckbox1" class="custom-control-label">PWD Number</label>
                      </div>
                    
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox2" value="pwd_lastname">
                        <label for="customCheckbox2" class="custom-control-label">Lastname</label>
                      </div>
                    
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox3" value="pwd_firstname">
                        <label for="customCheckbox3" class="custom-control-label">Firstname</label>
                      </div>
                    
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox4" value="pwd_middlename">
                        <label for="customCheckbox4" class="custom-control-label">Middlename</label>
                      </div>
                    
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox5" value="pwd_suffix">
                        <label for="customCheckbox5" class="custom-control-label">Suffix</label>
                      </div>
                    
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox6" value="date_applied">
                        <label for="customCheckbox6" class="custom-control-label">Date Applied</label>
                      </div>
                    
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox7" value="pwd_birthday">
                        <label for="customCheckbox7" class="custom-control-label">Birthday</label>
                      </div>
                    
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox8" value="pwd_age">
                        <label for="customCheckbox8" class="custom-control-label">Age</label>
                      </div>
                    
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox9" value="pwd_birthplace">
                        <label for="customCheckbox9" class="custom-control-label">Birthplace</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox10" value="pwd_sex">
                        <label for="customCheckbox10" class="custom-control-label">Sex</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox11" value="pwd_religion">
                        <label for="customCheckbox11" class="custom-control-label">Religion</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox12" value="pwd_ethnic_group">
                        <label for="customCheckbox12" class="custom-control-label">Ethnic Group</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox13" value="pwd_civil_status">
                        <label for="customCheckbox13" class="custom-control-label">Civil Status</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox14" value="pwd_blood_type">
                        <label for="customCheckbox14" class="custom-control-label">Blood Type</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox15" value="pwd_disability_type">
                        <label for="customCheckbox15" class="custom-control-label">Type of Disability</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox16" value="pwd_disability_cause">
                        <label for="customCheckbox16" class="custom-control-label">Cause of Disability</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox17" value="pwd_house_street">
                        <label for="customCheckbox17" class="custom-control-label">House No. & Street </label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox18" value="pwd_barangay">
                        <label for="customCheckbox18" class="custom-control-label">Barangay</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox19" value="pwd_landline">
                        <label for="customCheckbox19" class="custom-control-label">Landline No.</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox20" value="pwd_mobile">
                        <label for="customCheckbox20" class="custom-control-label">Mobile No.</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox21" value="pwd_email">
                        <label for="customCheckbox21" class="custom-control-label">Email</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox22" value="pwd_education">
                        <label for="customCheckbox22" class="custom-control-label">Educational Attainment</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox23" value="pwd_employment_status">
                        <label for="customCheckbox23" class="custom-control-label">Status of Employment</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox24" value="pwd_employment_category">
                        <label for="customCheckbox24" class="custom-control-label">Category of Employment</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox25" value="pwd_employment_type">
                        <label for="customCheckbox25" class="custom-control-label">Type of Employment</label>
                      </div>


                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox26" value="pwd_occupation">
                        <label for="customCheckbox26" class="custom-control-label">Occupation</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox27" value="pwd_organization">
                        <label for="customCheckbox27" class="custom-control-label">Organization Affiliated</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox28" value="pwd_organization_contact">
                        <label for="customCheckbox28" class="custom-control-label">Contact Person</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox29" value="pwd_organization_address">
                        <label for="customCheckbox29" class="custom-control-label">Office Address</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox30" value="pwd_organization_telephone">
                        <label for="customCheckbox30" class="custom-control-label">Telephone Nos.</label>
                      </div>


                    </div>


                    <div class="col-sm-6">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox31" value="pwd_sss">
                        <label for="customCheckbox31" class="custom-control-label">SSS No.</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox32" value="pwd_gsis">
                        <label for="customCheckbox32" class="custom-control-label">GSIS No.</label>
                      </div> 

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox33" value="pwd_pagibig">
                        <label for="customCheckbox33" class="custom-control-label">Pag-Ibig No.</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox34" value="pwd_philhealth">
                        <label for="customCheckbox34" class="custom-control-label">PhilHealth No.</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox35" value="pwd_father_lastname">
                        <label for="customCheckbox35" class="custom-control-label">Father's Lastname</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox36" value="pwd_father_firstname">
                        <label for="customCheckbox36" class="custom-control-label">Father's Firstname</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox37" value="pwd_father_middlename">
                        <label for="customCheckbox37" class="custom-control-label">Father's Middlename</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox38" value="pwd_mother_lastname">
                        <label for="customCheckbox38" class="custom-control-label">Mother's Lastname</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox39" value="pwd_mother_firstname">
                        <label for="customCheckbox39" class="custom-control-label">Mother's Firstname</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox40" value="pwd_mother_middlename">
                        <label for="customCheckbox40" class="custom-control-label">Mother's Middlename</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox41" value="pwd_guardian_lastname">
                        <label for="customCheckbox41" class="custom-control-label">Guardian's Lastname</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox42" value="pwd_guardian_firstname">
                        <label for="customCheckbox42" class="custom-control-label">Guardian's Firstname</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox43" value="pwd_guardian_middlename">
                        <label for="customCheckbox43" class="custom-control-label">Guardian's Middlename</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox53" value="pwd_guardian_contact">
                        <label for="customCheckbox53" class="custom-control-label">Guardian's Contact</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox44" value="accomplished_lastname">
                        <label for="customCheckbox44" class="custom-control-label">Accomplished Lastname</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox45" value="accomplished_firstname">
                        <label for="customCheckbox45" class="custom-control-label">Accomplished Firstname</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox46" value="accomplished_middlename">
                        <label for="customCheckbox46" class="custom-control-label">Accomplished Middlename</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox47" value="reporting_unit">
                        <label for="customCheckbox47" class="custom-control-label">Reporting Unit</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox48" value="registration_number">
                        <label for="customCheckbox48" class="custom-control-label">Registration Number</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox49" value="pwd_living">
                        <label for="customCheckbox49" class="custom-control-label">Economic Condition</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox50" value="pwd_spouse_name">
                        <label for="customCheckbox50" class="custom-control-label">Spouse Name</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox51" value="pwd_spouse_age">
                        <label for="customCheckbox51" class="custom-control-label">Spouse Age</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox52" value="pwd_support">
                        <label for="customCheckbox52" class="custom-control-label">Receiving Support</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox54" value="pwd_pensioner">
                        <label for="customCheckbox54" class="custom-control-label">Pensioner</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox55" value="pwd_pensioner_type">
                        <label for="customCheckbox55" class="custom-control-label">Type of Pensioner </label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox56" value="pwd_pension_monthly">
                        <label for="customCheckbox56" class="custom-control-label">Monthly Pension </label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox57" value="pwd_income_source">
                        <label for="customCheckbox57" class="custom-control-label">Source of Income </label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox58" value="pwd_income_monthly">
                        <label for="customCheckbox58" class="custom-control-label">Monthly Income </label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox59" value="interviewed_by">
                        <label for="customCheckbox59" class="custom-control-label">Interviewed By </label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="custom_column[]" type="checkbox" id="customCheckbox60" value="pwd_remarks">
                        <label for="customCheckbox60" class="custom-control-label">Remarks </label>
                      </div>






                    </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="cust-report" id="custom-button">Submit</button>
                </div>
              </div>
            </div>
          </div>     
        </div>
        </form>
      </div>
      <br>

      <div class="card mx-4 shadow-lg">
        <div class="card-header">
          <h1 class="card-title">DOH Report</h1>
        </div>
        <form method="POST">
        <div class="card-body">
          
          <div class="row">
            <div class="col-sm-4">
            <select class="form-control" name="month" id="select_birthday" >
              <option selected disabled value="">Select Month</option>
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="July">July</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>
            </div>
            <div class="col-sm-8">
              <button type="submit" class="btn btn-primary" id="birthday_button" name="generate-doh"><i class="fas fa-print"></i> &nbsp Generate</button>
            </div>
          </div>
          
          
        </div>
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
<!-- ChartJs -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/chart.js/chartjs-plugin-datalabels.min.js"></script>
<!-- Popper  -->
<script src="../plugins/popper/popper.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>


<!-- DataTables -->

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
    
    $('#myTable, #myTable2').DataTable( {
      "bPaginate": false,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false,
      "searching": false,
      "ordering": false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#select_birthday').change(function(){
      
      

    });
});
</script>
<script type="text/javascript">
$(document).ready(function () {
    $('#custom-button').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});

</script>

<script type="text/javascript">
  jQuery(function($){                      //calling the code inside braces when document loads and passing jQuery object as '$' parameter;
   $("select[name='pwd_sex']").prop(function(){        //binding an event that fires every time select value changes
      var select = $(this);              //caching select, which value was changed
      if(select.val() == "Others"){     //checking if we selected the right option
          $("<input>").attr({type: "text", name: "pwd_occupationOther", class: "form-control form-control-border", id: "other_occupation_id", placeholder:"Other Occupation"}).appendTo(select.parent()).focus();   //creating new input element object, setting its value to "value4" and appending to select parent element or wherever you want it
      }
      else if(select.val() != "Others") {
        $('#other_occupation_id').remove();
      }
   });        
});
</script>

</body>
</html>
