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
  <title>Add PWD</title>
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
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="../dist/img/pdao_logo.png" alt="AdminLTELogo" height="60" width="60">
</div>
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
            <a href="index.php" class="nav-link active">
              <i class="fas fa-user-plus"></i> 
              <p>
                Add PWD
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="list-pwd.php" class="nav-link ">
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
              <li class="breadcrumb-item active">Add PWD</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-4 shadow-lg">
              <div class="card-header">
                <h1 class="card-title">Add PWD</h1>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <div class="container">
                  <div class="row">
                  <div class="col-sm-6">
                      <div class="card-box bg-primary py-5">
                          <div class="inner">
                              <h3> New PWD <br> (without PWD Number)</h3>
                              
                          </div>
                          <div class="icon">
                              <i class="fas fa-user-plus"></i>
                          </div>
                          <a href="pwd.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="card-box bg-secondary py-5">
                          <div class="inner">
                              <h3> Existing PWD <br>(with PWD Number)</h3>
                          </div>
                          <div class="icon">
                              <i class="fas fa-user-plus"></i>
                          </div>
                          <a href="old-pwd.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
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
  $(function(){
        $('#reservationdate').datetimepicker({
        format: 'L'
        });
    });
</script>
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
      if(select.val() == "Others"){     //checking if we selected the right option
          $("<input>").attr({type: "text", name: "pwd_occupationOther", class: "form-control form-control-border", id: "other_occupation_id", placeholder:"Other Occupation"}).appendTo(select.parent()).focus();   //creating new input element object, setting its value to "value4" and appending to select parent element or wherever you want it
      }
      else if(select.val() != "Others") {
        $('#other_occupation_id').remove();
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
  });
</script>
<script type = "text/javascript">
    
 
  </script>



</body>
</html>
