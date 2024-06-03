<?php

  require_once "../controller.php";
  error_reporting(0);

  if (!isset($_SESSION['id_number'])) {
    header('location: ../index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PWD Recently Added</title>
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

  <!-- DataTables Css -->
  <!-- <link rel="stylesheet" type="text/css" href="../plugins/datatables/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/css/bootstrap.min.css">

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
            <a href="index.php" class="nav-link ">
              <i class="fas fa-user-plus"></i> 
              <p>
                Add PWD
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="list-pwd.php" class="nav-link active">
              <i class="fa fa-users"></i>&nbsp
              <p>
                PWD Recently Added
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
              <li class="breadcrumb-item active">PWD Recently Added</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-4 shadow-lg">
              <div class="card-header">
                <h1 class="card-title">PWD Recently Added</h1>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table class="table" id="example">
                  <thead>
                    <tr>
                      <th>PWD Number</th>
                      <th>Last Name</th>
                      <th>First Name</th>
                      <th>Middle Name</th>
                      <th>Barangay</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $user = $_SESSION['username'];
                      $result = mysqli_query($con, "SELECT * FROM pwd_table where interviewed_by='$user' order by pwd_id DESC");
                      while ($col = mysqli_fetch_array($result)) {
                        
                      
                    ?>
                    <tr>
                        <td><?php echo $col['pwd_number']; ?></td>
                        <td><?php echo $col['pwd_lastname']; ?></td>
                        <td><?php echo $col['pwd_firstname']; ?></td>
                        <td><?php echo $col['pwd_middlename']; ?></td>
                        
                        <td><?php echo $col['pwd_barangay'];?></td>
                      <td><a href="../controller.php?recently-edit-pwd=<?php echo $col['pwd_id'];?>" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                
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
    $('#example').DataTable({
      lengthMenu: [[5, 10, 20, -1], [5, 10, 20,"All"]],
      "ordering": false,
      responsive: true

    });
} );
</script>








</body>
</html>
