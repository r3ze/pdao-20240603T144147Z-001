<?php
  include "../config.php";
  session_start();

  if (!isset($_SESSION['id_number'])) {
    header('location: ../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List of PWD</title>
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
              <li class="breadcrumb-item active">List of PWD</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-4 shadow-lg">
              <div class="card-header">
                <h1 class="card-title">List of PWD</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                      <a href="summary-report.php" class="btn btn-lg btn-secondary"><i class="fas fa-print"></i> &nbsp Print Summary Report</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 d-flex">
                      <div class="col-12">
                        <div class="card-box bg-primary p-5">
                            <div class="inner">
                                <h3 class="text-center"> PWD Masterlist (Checker)</h3>
                                
                            </div>
                            <div class="icon">
                                <i class="fa fa-folder" aria-hidden="true"></i>
                            </div>
                            <a href="masterlist.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Anibong </h3>
                                  
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder" aria-hidden="true"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Anibong" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>

                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Biñan </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder" aria-hidden="true"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Biñan" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Buboy </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder" aria-hidden="true"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Buboy" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Cabanbanan </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Cabanbanan" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Calusiche </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Calusiche" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Dingin </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Dingin" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Lambac </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Lambac" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Layugan </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Layugan" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Magdapio </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Magdapio" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Maulawin </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Maulawin" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Pinagsanjan </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Pinagsanjan" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Barangay I </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=BarangayI" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Barangay II </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=BarangayII" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Sabang </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Sabang" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> Sampaloc </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=Sampaloc" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                      <div class="col-xl-3">
                          <div class="card-box bg-info">
                              <div class="inner">
                                  <h3> San Isidro </h3>
                              </div>
                              <div class="icon">
                                  <i class="fa fa-folder"></i>
                              </div>
                              <a href="barangay-page.php?barangay=SanIsidro" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>

                  </div>
              </div>

                
              </div>
              <!-- /.card-body -->
              
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
  $(function(){
        $('#reservationdate').datetimepicker({
        format: 'L'
        });
    });
</script>


</body>
</html>
