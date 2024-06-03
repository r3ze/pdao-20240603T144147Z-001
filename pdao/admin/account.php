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
  <title>Account</title>
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
            <a href="account.php" class="nav-link active">
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
              <li class="breadcrumb-item active">Account</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mx-4 shadow-lg">
              <div class="card-header">
                <h1 class="card-title">Account</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Account</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="account.php" method="POST" id="sign_up">
                      <div class="modal-body">
                        
                          <!-- ID Number -->
                          <div class="row pb-3">
                            <div class="form-group col-12">
                              <label>ID Number</label>
                              <input type="text" class="form-control form-control-border checking-account-number" name="id_number" placeholder="ID Number" value="<?php echo $_POST['id_number'];?>" required>
                              <span class="error-message text-danger"></span>
                            </div>
                          </div>
                          

                          <div class="row pb-3">
                            <!-- TEXT -->
                            <div class="form-group col-6">
                              <label>Last Name</label>
                              <input type="text" class="form-control form-control-border" name="account_lastname" id="textbox_lastname" placeholder="Last Name" value="<?php echo $_POST['account_lastname'];?>" required>
                            </div>

                            <!-- TEXT -->
                            <div class="form-group col-6">
                              <label>First Name</label>
                              <input type="text" class="form-control form-control-border" name="account_firstname" id="textbox_firstname" placeholder="First Name" value="<?php echo $_POST['account_firstname'];?>" required>
                            </div>
                          </div>

                          <!-- SELECT -->
                          <div class="row pb-3">
                          <div class="form-group col-12">
                          
                            <label>User Type</label>
                              <select class="user form-control form-control-border" id="exampleFormControlSelect1" name="user_type" required>
                                <option value="" disabled selected>Select</option>
                                <option value="user">User</option>
                                <option value="superadmin">Superadmin</option>
                                
                              </select>
                            
                          </div>
                          </div>

                          <div class="row pb-3">
                            <!-- PASSWORD -->
                            <div class="form-group col-6">
                              <label>Password</label>
                              <div class="form-line">
                                <input type="Password" class="form-control form-control-border" name="password" id="password1" minlength="6" placeholder="Password" required>
                                <span class="error text-danger"></span>
                              </div>
                            </div>

                            <!-- PASSWORD -->
                            <div class="form-group col-6">
                              <label>Confirm Password</label>
                              <div class="form-line">
                                <input type="password" class="form-control form-control-border" name="cnpassword" id="password2" minlength="6" placeholder="Confirm Password" required>
                                <span class="error2 text-danger"></span>
                              </div>
                            </div>
                          </div>

                          
                          
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add-account">Submit</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="table-responsive">
                  <table class="table table-striped" id="example">
                          <thead>
                            <tr>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>ID Number</th>
                              <th>User Type</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $result = mysqli_query($con, "SELECT * from account_table where user_type!='admin' and status='approved'");
                              while ($col = mysqli_fetch_array($result)) {
                              
                            ?>
                            <tr>
                              <td><?php echo $col['firstname']; ?></td>
                              <td><?php echo $col['lastname']; ?></td>
                              <td><?php echo $col['id_number']; ?></td>
                              <td><?php echo $col['user_type']; ?></td>
                              <td><button class="btn btn-xs btn-primary editBtn" id="<?php echo $col['account_id']; ?>" title="Edit"><span class="fa fa-pen" ></span></button>
                                <a href="../controller.php?delete-account=<?php echo $col['account_id']?>" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to remove <?php echo $col['firstname']?> <?php echo $col['lastname']?> account?')" title="Delete"><span class="fa fa-trash" ></span></a>
                              </td> 
                            </tr>
                            <?php }?>
                          </tbody>
                        </table>
                </div>
                
              </div>
              <!-- /.card-body -->
              
            </div>

            <br>

            <div class="card mx-4 shadow-lg">
              <div class="card-header">
                <h1 class="card-title">Pending Account</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="account.php" method="POST">
                      <div class="modal-body">
                        
                          <!-- ID Number -->
                          <div class="row pb-3">
                            <div class="form-group col-12">
                              <label>ID Number</label>
                              <input type="text" class="form-control form-control-border" name="id_number" placeholder="ID Number" value="<?php echo $_POST['id_number'];?>" required>
                            </div>
                          </div>
                          

                          <div class="row pb-3">
                            <!-- TEXT -->
                            <div class="form-group col-6">
                              <label>Last Name</label>
                              <input type="text" class="form-control form-control-border" name="account_lastname" id="textbox_lastname" placeholder="Last Name" value="<?php echo $_POST['account_lastname'];?>" required>
                            </div>

                            <!-- TEXT -->
                            <div class="form-group col-6">
                              <label>First Name</label>
                              <input type="text" class="form-control form-control-border" name="account_firstname" id="textbox_firstname" placeholder="First Name" value="<?php echo $_POST['account_firstname'];?>" required>
                            </div>
                          </div>

                          <!-- SELECT -->
                          <div class="row pb-3">
                          <div class="form-group col-12">
                          
                            <label>User Type</label>
                              <select class="user form-control form-control-border" id="exampleFormControlSelect1" name="user_type" required>
                                <option value="" disabled selected>Select</option>
                                <option value="user">User</option>
                                <option value="superadmin">Superadmin</option>
                                
                              </select>
                            
                          </div>
                          </div>

                          <div class="row pb-3">
                            <!-- TEXT -->
                            <div class="form-group col-6">
                              <label>Password</label>
                              <input type="Password" class="form-control form-control-border" name="password" id="password1" placeholder="Password" required>
                            </div>

                            <!-- TEXT -->
                            <div class="form-group col-6">
                              <label>Confirm Password</label>
                              <input type="password" class="form-control form-control-border " name="cnpassword" id="password2" placeholder="Confirm Password" required>
                            </div>
                          </div>

                          
                          
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add-account" >Submit</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="account.php" method="POST">
                      <div class="modal-body">
                          <input type="hidden" id="update_id" name="account_id">
                          <!-- ID Number -->
                          <div class="row pb-3">
                            <div class="form-group col-12">
                              <label>ID Number</label>
                              <input type="text" class="form-control form-control-border checking-account-number-edit" name="id_number" id="id_id" placeholder="ID Number"  required>
                              <input type="hidden" class="form-control form-control-border checking-account-number-edit-hidden" name="id_number2" id="id_id2" placeholder="ID Number"  required>
                              <span class="error-message text-danger"></span>
                            </div>
                          </div>
                          

                          <div class="row pb-3">
                            <!-- TEXT -->
                            <div class="form-group col-6">
                              <label>Last Name</label>
                              <input type="text" class="form-control form-control-border" name="account_lastname" id="textbox_lastname2" placeholder="Last Name"  required>
                            </div>

                            <!-- TEXT -->
                            <div class="form-group col-6">
                              <label>First Name</label>
                              <input type="text" class="form-control form-control-border" name="account_firstname" id="textbox_firstname2" placeholder="First Name"  required>
                            </div>
                          </div>

                          <!-- SELECT -->
                          <div class="row pb-3">
                          <div class="form-group col-12">
                          
                            <label>User Type</label>
                              <select class="user form-control form-control-border" id="exampleFormControlSelect2" name="user_type" required>
                                <option value="" disabled selected>Select</option>
                                <option value="user">User</option>
                                <option value="superadmin">Superadmin</option>
                                
                              </select>
                            
                          </div>
                          </div>

                          
                          
                          
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit-account" >Submit</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END OF EDIT MODAL -->

                <div class="table-responsive">
                  <table class="table table-striped" id="example2">
                          <thead>
                            <tr>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>ID Number</th>
                              <th>User Type</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $result = mysqli_query($con, "SELECT * from account_table where user_type!='admin' and status='pending'");
                              while ($col = mysqli_fetch_array($result)) {
                              
                            ?>
                            <tr>
                              <td><?php echo $col['firstname']; ?></td>
                              <td><?php echo $col['lastname']; ?></td>
                              <td><?php echo $col['id_number']; ?></td>
                              <td><?php echo $col['user_type']; ?></td>
                              <td><a href="../controller.php?approve=<?php echo $col['account_id']?>" class="btn btn-xs btn-success" onclick="return confirm('Are you sure you want to approve <?php echo $col['firstname']?> <?php echo $col['lastname']?> account?')" title="Approve"><span class="fa fa-check" ></span> Approve</a>
                                
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
      lengthMenu: [[5, 10, 20, -1], [5, 10, 20,"All"]]

    });
} );
</script>
<script type="text/javascript">
    $(function () {
      
        $("#password1").keyup(function () {
            var password = $(this).val();
            var confirmPassword = $("#password2").val();
            if (password.length < 6) {
              $(".error").text("Password minimum of 6 character");
            }
            else{
               
               if (password != confirmPassword) {
                  $(".error").text("Password not match");
               }
               else{
                  $(".error").text("");
                   $(".error2").text("");
               }
            }
            
            
        });
        $("#password2").keyup(function () {
            var password2 = $(this).val();
            var confirmPassword = $("#password1").val();
            if (password2.length < 6) {
              
              $(".error2").text("Password minimum of 6 character");
            }
            else{
               if (password2 != confirmPassword) {
                  $(".error2").text("Password not match");
               }
               else{
                 $(".error").text("");
                  $(".error2").text("");
               }
            }
            
            
        });
        
    });
</script>
<script type="text/javascript">
  function validate_pass(){
    var password = $("#password1").val();
    var confirmPassword = $("#password2").val();
    isValid = true;
    if (password != confirmPassword) {
      isValid = false;
    }
    else{
      isValid = true;
    }
    return isValid;
  }
  $('#sign_up').submit(validate_pass);
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.checking-account-number').keyup(function(e){
        // alert("Hellow");
        var acc_number = $('.checking-account-number').val();
        // alert(pwd_number);
        $.ajax({
          type: "POST",
          url: "../controller.php",
          data: {
                "check-account-number": 1, 
                "accnumber": acc_number,
          },
          
          success: function (response){
              
              $('.error-message').text(response);
          }
        });
    });

    $('.checking-account-number-edit').keyup(function(e){
        // alert("Hellow");
        var acc_number = $('.checking-account-number-edit').val();
        var old_acc_number = $('.checking-account-number-edit-hidden').val();
        // alert(pwd_number);
        $.ajax({
          type: "POST",
          url: "../controller.php",
          data: {
                "check-account-number-edit": 1, 
                "accnumber": acc_number,
                "old_accnumber": old_acc_number,
          },
          
          success: function (response){
              
              $('.error-message').text(response);
          }
        });
    });

    var user_type = "<?php echo $_POST['user_type'];?>";
    if (user_type == "user") {
      $('select[name="user_type"]').val("user");
    }
    if (user_type == "superadmin") {
      $('select[name="user_type"]').val("superadmin");
    }
    

    $('body').on('click','.editBtn', function(){
        var id = $(this).attr('id');
        $('#editModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();


        console.log(data);
        console.log(id);
        $('#update_id').val(id);
        $('#textbox_firstname2').val(data[0]);
        $('#textbox_lastname2').val(data[1]);
        $('#id_id').val(data[2]);
        $('#id_id2').val(data[2]);
        $('#exampleFormControlSelect2').val(data[3]);


      });
    

  });
</script>

</body>
</html>
