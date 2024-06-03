<?php
    include "config.php";

   
    error_reporting(0);

    if (isset($_POST['btn-register'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $id_number = $_POST['id_number'];
        $pass = $_POST['password'];
        

        $check_idnumber = mysqli_query($con, "SELECT * from account_table where id_number='$id_number'");
        if (mysqli_num_rows($check_idnumber) > 0) {
            echo "<script>alert('ID Number already exist!')</script>";
        }
        else{
            
            $check_fullname = mysqli_query($con, "SELECT * from account_table where firstname='$firstname' and lastname='$lastname'");
            if (mysqli_num_rows($check_fullname) > 0) {
                $fullname = $firstname . " " . $lastname;
                echo "<script>alert('$fullname has an account.')</script>";
            }
            else{
                
                $encpass = password_hash($pass, PASSWORD_BCRYPT);
                $insert_account = mysqli_query($con, "INSERT INTO account_table (firstname, lastname, id_number, password, user_type, status) values('$firstname','$lastname', '$id_number','$encpass', 'user','pending')");
                if (!$insert_account) {
                    echo "<script>alert('Registration Failed!')</script>";
                }
                else{
                    echo "<script>alert('Registration Success!')</script>";
                    header('location: index.php');
                }
                
            }
            
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
        
        .signup-page{
            background-image: url('dist/img/ph_pagsanjan_opacity2.png');
            background-size: auto;
            background-position:center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="index.php">PDDMS</b></a>
            <small style="font-size: 15px;">Pagsanjan Disability Data Management System</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST">
                    <div class="msg">Register</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-user"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo $_POST['firstname']?>" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-user"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo $_POST['lastname']?>" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-user"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="id_number" placeholder="ID Number" value="<?php echo $_POST['id_number']?>" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-lock"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-lock"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="btn-register">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="index.php">You already have a membership?</a>
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
    <script src="js/pages/examples/sign-up.js"></script>
</body>

</html>