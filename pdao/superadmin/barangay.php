<?php
  require_once "../controller.php";

  if (!isset($_SESSION['id_number'])) {
    header('location: ../index.php');
  }
  if (isset($_GET['barangay'])) {
    $barangay = $_GET['barangay'];
  }
  if ($barangay == "BarangayI") {
    $barangay = "Barangay I";
  }
  elseif ($barangay == "BarangayII") {
    $barangay = "Barangay II";
  }
  elseif ($barangay == "SanIsidro") {
    $barangay = "San Isidro";
  }


  if ($barangay == "Anibong") {
      $pwd_static = "04-3419-001-";
  }
  elseif($barangay == "Biñan"){
    $pwd_static = "04-3419-002-";
  }
  elseif($barangay == "Buboy"){
    $pwd_static = "04-3419-003-";
  }
  elseif($barangay == "Cabanbanan"){
    $pwd_static = "04-3419-004-";
  }
  elseif($barangay == "Calusiche"){
    $pwd_static = "04-3419-005-";
  }
  elseif($barangay == "Dingin"){
    $pwd_static = "04-3419-006-";
  }
  elseif($barangay == "Lambac"){
    $pwd_static = "04-3419-007-";
  }
  elseif($barangay == "Layugan"){
    $pwd_static = "04-3419-008-";
  }
  elseif($barangay == "Magdapio"){
    $pwd_static = "04-3419-009-";
  }
  elseif($barangay == "Maulawin"){
    $pwd_static = "04-3419-010-";
  }
  elseif($barangay == "Pinagsanjan"){
    $pwd_static = "04-3419-011-";
  }
  elseif($barangay == "Barangay I"){
    $pwd_static = "04-3419-012-";
  }
  elseif($barangay == "Barangay II"){
    $pwd_static = "04-3419-013-";
  }
  elseif($barangay == "Sabang"){
    $pwd_static = "04-3419-014-";
  }
  elseif($barangay == "Sampaloc"){
    $pwd_static = "04-3419-015-";
  }
  elseif($barangay == "San Isidro"){
    $pwd_static = "04-3419-016-";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $barangay;?></title>
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
              <i class="fas fa-tachometer-alt"></i>&nbsp
              <p>
                Dashboard
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
              <li class="breadcrumb-item active"><?php echo $barangay;?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-4 shadow-lg d-none">
              <div class="card-header">
                <h1 class="card-title">With PWD Number</h1>
                <a href="barangay-summary-report.php?barangay-summary=<?php echo $barangay;?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-print"></i> &nbspPrint</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="table-responsive">
                  <table class="table table-striped" id="example">
                    <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>PWD Number</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $result = mysqli_query($con, "SELECT * from pwd_table where pwd_barangay='$barangay' and pwd_number!=''");
                        while ($col = mysqli_fetch_array($result)) {
                        
                      ?>
                      <tr>
                        <td><?php echo $col['pwd_firstname']; ?></td>
                        <td><?php echo $col['pwd_middlename']; ?></td>
                        <td><?php echo $col['pwd_lastname']; ?></td>
                        <td><?php echo $col['pwd_number']; ?></td>
                        
                        <td>
                          <a href="../card-generator.php?generate=<?php echo $col['pwd_id']?>" class="btn btn-xs btn-success" title="Generate"><span class="fa fa-id-card" ></span> Generate ID</a>
                          <a href="#" class="btn btn-primary btn-xs" title="Edit"><span class="fa fa-pen"></span></a>
                          <a href="../controller.php?delete-pwd=<?php echo $col['pwd_id']?>" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('Are you sure you want to remove <?php echo $col['pwd_firstname']?> <?php echo $col['pwd_lastname']?> record?')"><span class="fa fa-trash"></span></a>
                        </td> 
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
                
              </div>
              <!-- /.card-body -->
              </div>
              


              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign PWD Number</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST">
                      <div class="modal-body">


                          <!-- PWD NAME -->
                          <label for="">PWD Name</label>
                          <!-- ID Number -->
                          <div class="row pb-3">
                            
                            <div class="form-group col-12">
                              
                              <input readonly type="text" class="form-control form-control-border" placeholder="ID Number" id="pwd_fullname">
                              <input type="hidden" id="pwd_id" name="pwd_id_post">
                              
                            </div>
                            
                          </div>

                          <label for="">PWD Number</label>
                          <!-- ID Number -->
                          <div class="row pb-3">
                            
                            <div class="form-group col-8">
                              
                              <input readonly type="text" class="form-control form-control-border" name="id_number_static" placeholder="ID Number" id="pwd_keyup_value" value="<?php echo $pwd_static ?>">
                              <input type="hidden" class="form-control form-control-border"  name="barangay" value="<?php echo $barangay;?>">
                              <span class="error-message text-danger"></span>
                            </div>
                            <div class="form-group col-4">
                              
                              <input type="number" class="form-control form-control-border" name="id_number" placeholder="PWD Number" id="pwd_keyup" min="1" max="9999999" required>

                            </div>
                          </div>
                          

                          

                          
                          
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="assign-number">Submit</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              <div class="card mx-4 shadow-lg">
              <div class="card-header">
                <h1 class="card-title">No PWD Number</h1>
                <a href="barangay-summary-report-no-number.php?barangay-summary=<?php echo $barangay;?>" class="btn btn-secondary btn-sm float-right"><i class="fas fa-print"></i> &nbspPrint</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="table-responsive">
                  <table class="table table-striped" id="example2">
                    <thead>
                      <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $result = mysqli_query($con, "SELECT * from pwd_table where pwd_barangay='$barangay' and pwd_number=''");
                        while ($col = mysqli_fetch_array($result)) {
                        
                      ?>
                      <tr>
                        <td><?php echo $col['pwd_firstname']; ?></td>
                        <td><?php echo $col['pwd_middlename']; ?></td>
                        <td><?php echo $col['pwd_lastname']; ?></td>
                        
                        
                        <td><a href="#" class="btn btn-xs btn-success assignBtn" id="<?php echo $col['pwd_id'];?>" title="Assign" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><span class="fa fa-keyboard" ></span>&nbsp Assign Number</a>
                          
                        </td> 
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
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



<script>
  $(function(){
        $('#reservationdate').datetimepicker({
        format: 'L'
        });
    });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example, #example2').DataTable({
      lengthMenu: [[5, 10, 20, -1], [5, 10, 20,"All"]],
      "ordering": false

    });
} );
</script>
<script type="text/javascript">
  $(function(){
    $('.assignBtn').click(function(){
      var id = $(this).attr('id');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function(){
            return $(this).text();
          }).get();
      var fullname = data[0] +" "+data[1]+" "+data[2];
      $('#pwd_fullname').val(fullname);
      $('#pwd_id').val(id);
    });
    $("#pwd_keyup").keyup(function (){

      var input = $(this).val();
      var length_input = input.toString().length;
      if (length_input == 1) {
        var zeros = "00";
      }
      else if (length_input == 2) {
        var zeros = "0";
      }
      else {
        var zeros = "";
      }
      var template = "<?php echo $pwd_static;?>";
      var final = template+zeros+input.toString();
      $('#pwd_keyup_value').val(final);
    });

    $('#pwd_keyup').keyup(function(e){
        // alert("Hellow");
        var pwd_number = $('#pwd_keyup_value').val();
        // alert(pwd_number);
        $.ajax({
          type: "POST",
          url: "../controller.php",
          data: {
                "check-new-pwd-number": 1, 
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
