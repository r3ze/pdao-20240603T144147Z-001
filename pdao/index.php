<?php
    include "config.php";

    session_start();

    if (isset($_SESSION['id_number'])) {
        $user_type = $_SESSION['user_type'];
        if ($user_type == 'user') {
            header('location: user/index.php');
        }
        elseif ($user_type == 'admin') {
            header('location: admin/index.php');
        }
        elseif ($user_type == 'superadmin') {
            header('location: superadmin/index.php');
        }
        
    }
    error_reporting(0);

    $loginerrors = array();

    if (isset($_POST['btn-login'])) {
        $id_number = $_POST['id_number'];
        $pass = $_POST['password'];

        $check_idnumber = mysqli_query($con, "SELECT * from account_table where id_number='$id_number'");
        if (mysqli_num_rows($check_idnumber) > 0) {

            $fetch = mysqli_fetch_assoc($check_idnumber);
            $fetch_accountid = $fetch['account_id'];
            $fetch_idnumber = $fetch['id_number'];
            
            $fetch_firstname = $fetch['firstname'];
            $fetch_lastname = $fetch['lastname'];
            $fullname = $fetch_firstname." ". $fetch_lastname;
            
            $fetch_pass = $fetch['password'];
            $fetch_type = $fetch['user_type'];
            $fetch_status = $fetch['status'];

            if (password_verify($pass, $fetch_pass)) {
                if ($fetch_status == 'approved') {
                    if ($fetch_type == 'admin') {
                        // echo "<script>alert('Welcome to Admin PDDA System')</script>";
                        $_SESSION['id_number'] = $fetch_idnumber;
                        $_SESSION['username'] = $fullname;
                        $_SESSION['user_type'] = $fetch_type;
                        $_SESSION['account_id'] = $fetch_accountid;
                        mysqli_query($con, "INSERT INTO history_log (account_id, activity) VALUES ('$fetch_accountid', 'Login')");
                        header('location: admin/index.php');
                        exit();
                    }
                    elseif ($fetch_type == 'user'){
                        // echo "<script>alert('Welcome to PDDA System')</script>";
                        $_SESSION['id_number'] = $fetch_idnumber;
                        $_SESSION['username'] = $fullname;
                        $_SESSION['user_type'] = $fetch_type;
                        $_SESSION['account_id'] = $fetch_accountid;
                        mysqli_query($con, "INSERT INTO history_log (account_id, activity) VALUES ('$fetch_accountid', 'Login')");
                        header('location: user/index.php');
                        exit();
                    }
                    elseif ($fetch_type == 'superadmin'){
                        // echo "<script>alert('Welcome to PDDA System')</script>";
                        $_SESSION['id_number'] = $fetch_idnumber;
                        $_SESSION['username'] = $fullname;
                        $_SESSION['user_type'] = $fetch_type;
                        $_SESSION['account_id'] = $fetch_accountid;
                        mysqli_query($con, "INSERT INTO history_log (account_id, activity) VALUES ('$fetch_accountid', 'Login')");
                        header('location: superadmin/index.php');
                        exit();
                    }
                }
                elseif($fetch_status == 'pending'){
                    $loginerrors['password'] = "Oops! Your Account is pending for admin approval.";
                }
                
                
            }
            else{
                
                $loginerrors['password'] = "Incorrect Password!";


            }
        }
        else{
            
            $loginerrors['account'] = "Account Does not Exist!";
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PDDMS</title>
    <!-- Favicon-->
    <link rel="icon" href="dist/img/pdao_logo.png" type="image/ico">

    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="css/Roboto.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        
        .login-page{
            background-image: url('dist/img/ph_pagsanjan_opacity2.png');
            background-size: auto;
            background-position:center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="login-page">
    
    <div class="login-box">
        <div class="logo">
            <a href="index.php">PDDMS</b></a>
            <small style="font-size: 15px;">Pagsanjan Disability Data Management System</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in</div>
                    <?php
                        if(count($loginerrors) > 0){
                    ?>
                          <center>
                          <span class="txt1 p-b-11">
                          <div class="alert alert-danger text-center">
                              <?php 
                                foreach($loginerrors as $error){
                                    echo $error;
                                }
                              ?>
                          </div>
                          </span>
                          </center>
                    <?php
                        }
                    ?>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-user"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="id_number" placeholder="ID Number" value="<?php echo $_POST['id_number']?>" required  autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-lock"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <!-- <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label> -->
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="btn-login">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="register.php">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>