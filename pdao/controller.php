<?php
include "config.php";
session_start();

if (isset($_GET['approve'])) {
	$account_id = $_GET['approve'];

	$approve_query = mysqli_query($con, "UPDATE account_table SET status = 'approved' where account_id='$account_id'");
	$_SESSION['status_title'] = "Success";
    $_SESSION['status'] = "Account successfully approve.";
    $_SESSION['status_code'] = "success";
    header('location: admin/account.php');
	exit();
}
if (isset($_POST['add-account'])) {

	$id_number = $_POST['id_number'];
	$lastname = $_POST['account_lastname'];
	$firstname = $_POST['account_firstname'];
	$user_type = $_POST['user_type'];
	$password = $_POST['password'];
	$enc_password = password_hash($password, PASSWORD_BCRYPT);

	$check_id = mysqli_query($con, "SELECT * FROM account_table where id_number='$id_number'");
	if (mysqli_num_rows($check_id) > 0) {
		$_SESSION['status_title'] = "Failed";
	    $_SESSION['status'] = "Account ID Number already exist. Try with another one!";
	    $_SESSION['status_code'] = "error";
	    header('location: account.php');
		exit();
	}
	else{
		$check_name = mysqli_query($con, "SELECT * FROM account_table where lastname = '$lastname' and firstname='$firstname'");
		if (mysqli_num_rows($check_name) > 0) {
			$_SESSION['status_title'] = "Failed";
		    $_SESSION['status'] = "This user already exist.";
		    $_SESSION['status_code'] = "error";
		    
		}
		else{
			$insert_query = mysqli_query($con, "INSERT INTO account_table (lastname,firstname,id_number,user_type,password,status) VALUES ('$lastname','$firstname','$id_number','$user_type','$enc_password','approved')");

			$_SESSION['status_title'] = "Success";
		    $_SESSION['status'] = "Account successfully created.";
		    $_SESSION['status_code'] = "success";
		    
		}
	}

	
}
if (isset($_POST['edit-account'])) {
	$acc_id = $_POST['account_id'];
	$account_query = mysqli_query($con, "SELECT * FROM account_table where account_id = '$account_id'");
	$fetch = mysqli_fetch_assoc($account_query);
	$old_number = $fetch['id_number'];

}
if (isset($_GET['delete-account'])) {
	$account_id = $_GET['delete-account'];

	$delete_query = mysqli_query($con, "DELETE from account_table where account_id='$account_id'");
	$_SESSION['status_title'] = "Success";
    $_SESSION['status'] = "Account successfully delete.";
    $_SESSION['status_code'] = "success";
    header('location: admin/account.php');
	exit();
}



if (isset($_POST['add-pwd'])) {
	

	$pwd_number = "";
	$date_applied = $_POST['date_applied'];
	$pwd_lastname = $_POST['pwd_lastname'];
	$pwd_firstname = $_POST['pwd_firstname'];
	$pwd_middlename = $_POST['pwd_middlename'];
	
	if (isset($_POST['pwd_suffix'])) {
		
		$pwd_suffix = $_POST['pwd_suffix'];
	}
	
	
	if (isset($_POST['pwd_birthday'])) {
		$pwd_birthday = $_POST['pwd_birthday'];
	}
	else{
		$pwd_birthday = "";
	}
	if (isset($_POST['pwd_age'])) {
		$pwd_age = $_POST['pwd_age'];
	}
	else{
		$pwd_age = "";
	}
	
	$pwd_birthplace = $_POST['pwd_birthplace'];
	$sex = $_POST['sex'];
	$pwd_religion = $_POST['pwd_religion'];
	$pwd_ethnic = $_POST['pwd_ethnic'];
	
	if (isset($_POST['pwd_civilStatus'])) {
		$pwd_civilStatus = $_POST['pwd_civilStatus'];
	}
	else{
		$pwd_civilStatus = NULL;
	}
	if (isset($_POST['pwd_bloodType'])) {
		$pwd_bloodType = $_POST['pwd_bloodType'];
	}
	else{
		$pwd_bloodType = NULL;
	}

	
	if (isset($_POST['disability_type'])) {
		$disability_type = implode(',', $_POST['disability_type']);
	}
	if (isset($_POST['disability_cause'])) {
		$disability_cause = implode(',', $_POST['disability_cause']);
	}
	$pwd_street = $_POST['pwd_street'];
	$pwd_barangay = $_POST['pwd_barangay'];
	
	if (isset($_POST['pwd_landline'])) {
		$pwd_landline = $_POST['pwd_landline'];
	}
	
	if (isset($_POST['pwd_mobile'])) {
		$pwd_mobile = $_POST['pwd_mobile'];
	}
	if (isset($_POST['pwd_email'])) {
		$pwd_email = $_POST['pwd_email'];
	}
	
	

	if (isset($_POST['pwd_education'])) {
		$pwd_education = $_POST['pwd_education'];
	}
	else{
		$pwd_education = NULL;
	}
	if (isset($_POST['pwd_employmentStatus'])) {
		$pwd_employmentStatus = $_POST['pwd_employmentStatus'];
	}
	else{
		$pwd_employmentStatus = NULL;
	}
	
	if (isset($_POST['pwd_employmentCategory'])) {
		$pwd_employmentCategory = $_POST['pwd_employmentCategory'];
	}
	
	if (isset($_POST['pwd_employmentType'])) {
		$pwd_employmentType = $_POST['pwd_employmentType'];
	}
	
	if (isset($_POST['pwd_occupation'])) {
		$pwd_occupation = $_POST['pwd_occupation'];
		if ($pwd_occupation == "Others") {
			$pwd_occupation = $_POST['pwd_occupationOther'];
		}
		
	}
	if (isset($_POST['pwd_organization'])) {
		$pwd_organization = $_POST['pwd_organization'];
	}	
	if (isset($_POST['pwd_organizationPerson'])) {
		$pwd_organizationPerson = $_POST['pwd_organizationPerson'];
	}
	
	if (isset($_POST['pwd_organizationAddress'])) {
		$pwd_organizationAddress = $_POST['pwd_organizationAddress'];
	}
	
	if (isset($_POST['pwd_organizationTelephone'])) {
		$pwd_organizationTelephone = $_POST['pwd_organizationTelephone'];
	}
	if (isset($_POST['pwd_sss'])) {
		$pwd_sss = $_POST['pwd_sss'];
	}
	if (isset($_POST['pwd_gsis'])) {
		$pwd_gsis = $_POST['pwd_gsis'];
	}
	if (isset($_POST['pwd_pagibig'])) {
		$pwd_pagibig = $_POST['pwd_pagibig'];
	}
	if (isset($_POST['pwd_philhealth'])) {
		$pwd_philhealth = $_POST['pwd_philhealth'];
	}
	if (isset($_POST['pwd_fatherLastname'])) {
		$pwd_fatherLastname = $_POST['pwd_fatherLastname'];
	}
	if (isset($_POST['pwd_fatherFirstname'])) {
		$pwd_fatherFirstname = $_POST['pwd_fatherFirstname'];
	}
	if (isset($_POST['pwd_fatherMiddlename'])) {
		$pwd_fatherMiddlename = $_POST['pwd_fatherMiddlename'];
	}
	if (isset($_POST['pwd_motherLastname'])) {
		$pwd_motherLastname = $_POST['pwd_motherLastname'];
	}
	if (isset($_POST['pwd_motherFirstname'])) {
		$pwd_motherFirstname = $_POST['pwd_motherFirstname'];
	}
	if (isset($_POST['pwd_motherMiddlename'])) {
		$pwd_motherMiddlename = $_POST['pwd_motherMiddlename'];
	}
	if (isset($_POST['pwd_guardianLastname'])) {
		$pwd_guardianLastname = $_POST['pwd_guardianLastname'];
	}
	if (isset($_POST['pwd_guardianFirstname'])) {
		$pwd_guardianFirstname = $_POST['pwd_guardianFirstname'];
	}
	if (isset($_POST['pwd_guardianMiddlename'])) {
		$pwd_guardianMiddlename = $_POST['pwd_guardianMiddlename'];
	}
	else{
		$pwd_guardianMiddlename = $_POST['pwd_guardianMiddlename'];
	}
	$accomplish_lastname = $_POST['accomplish_lastname'];
	$accomplish_firstname = $_POST['accomplish_firstname'];
	$accomplish_middlename = $_POST['accomplish_middlename'];
	
	if (isset($_POST['reportingUnit_name'])) {
		$reportingUnit_name = $_POST['reportingUnit_name'];
	}
	if (isset($_POST['registration_number'])) {
		$registration_number = $_POST['registration_number'];
	}
	

	if (isset($_POST['living'])) {
		$living = $_POST['living'];
	}
	else{
		$living = NULL;

	}
	
	if (isset($_POST['pwd_spouseName'])) {
		$pwd_spouseName = $_POST['pwd_spouseName'];
	}
	if (isset($_POST['pwd_spouseAge'])) {
		$pwd_spouseAge = $_POST['pwd_spouseAge'];
	}
	if (isset($_POST['economic_condition'])) {
		$economic_condition = implode(',', $_POST['economic_condition']);
	}
	if (isset($_POST['pwd_pensionerType'])) {
		$pwd_pensionerType = $_POST['pwd_pensionerType'];
	}
	if (isset($_POST['pwd_pensionMonthly'])) {
		$pwd_pensionMonthly = $_POST['pwd_pensionMonthly'];
	}
	if (isset($_POST['pwd_incomeSource'])) {
		$pwd_incomeSource = $_POST['pwd_incomeSource'];
	}
	if (isset($_POST['pwd_incomeMonthly'])) {
		$pwd_incomeMonthly = $_POST['pwd_incomeMonthly'];
	}
	$pwd_interviewer = $_POST['pwd_interviewer'];
	$pwd_guardian_contact = $_POST['pwd_guardian_contact'];
	$pwd_remarks = $_POST['pwd_remarks'];

	$pwd_accessibility = $_POST['pwd_accessibility'];
	$pwd_services = $_POST['pwd_services'];	

	if(isset($_POST['pwd_disability_cause_others'])){
		$pwd_disability_cause_others = $_POST['pwd_disability_cause_others'];
	}
	else{
		$pwd_disability_cause_others = '';
	}
	
		
	

	// echo "<script>alert('$pwd_number  $pwd_firstname $pwd_lastname $pwd_middlename $disability_type $pwd_occupation $economic_condition $living')</script>";

	//INSERT TO TABLE
	
	$check_name = mysqli_query($con, "SELECT * from pwd_table where pwd_lastname='$pwd_lastname' and pwd_firstname='$pwd_firstname' and pwd_middlename='$pwd_middlename'");
	if (mysqli_num_rows($check_name) > 0) {
		$_SESSION['status_title'] = "Failed";
	    $_SESSION['status'] = "PWD Name Already Exist";
	    $_SESSION['status_code'] = "error";
	}
	else{
		//INSERTING
		mysqli_query($con, "INSERT INTO pwd_table (pwd_number,date_applied,pwd_lastname,pwd_firstname,pwd_middlename,pwd_suffix,pwd_birthday,pwd_age,pwd_birthplace,pwd_sex,pwd_religion,pwd_ethnic_group,pwd_civil_status,pwd_blood_type,pwd_disability_type,pwd_disability_cause,pwd_house_street,pwd_barangay,pwd_landline,pwd_mobile,pwd_email,pwd_education,pwd_employment_status,pwd_employment_category,pwd_employment_type,pwd_occupation,pwd_organization,pwd_organization_contact,pwd_organization_address,pwd_organization_telephone,pwd_sss,pwd_gsis,pwd_pagibig,pwd_philhealth,pwd_father_lastname,pwd_father_firstname,pwd_father_middlename,pwd_mother_lastname,pwd_mother_firstname,pwd_mother_middlename,pwd_guardian_lastname,pwd_guardian_firstname,pwd_guardian_middlename,accomplished_lastname,accomplished_firstname,accomplished_middlename,reporting_unit,registration_number,pwd_living,pwd_spouse_name,pwd_spouse_age,pwd_support,pwd_pensioner_type,pwd_pension_monthly,pwd_income_source,pwd_income_monthly,interviewed_by, pwd_guardian_contact, pwd_remarks, pwd_accessibility, pwd_services, pwd_disability_cause_others) VALUES ('$pwd_number','$date_applied','$pwd_lastname','$pwd_firstname','$pwd_middlename','$pwd_suffix','$pwd_birthday','$pwd_age','$pwd_birthplace','$sex','$pwd_religion','$pwd_ethnic','$pwd_civilStatus','$pwd_bloodType','$disability_type','$disability_cause','$pwd_street','$pwd_barangay','$pwd_landline','$pwd_mobile','$pwd_email','$pwd_education','$pwd_employmentStatus','$pwd_employmentCategory','$pwd_employmentType','$pwd_occupation','$pwd_organization','$pwd_organizationPerson','$pwd_organizationAddress','$pwd_organizationTelephone','$pwd_sss','$pwd_gsis','$pwd_pagibig','$pwd_philhealth','$pwd_fatherLastname','$pwd_fatherFirstname','$pwd_fatherMiddlename','$pwd_motherLastname','$pwd_motherFirstname','$pwd_motherMiddlename','$pwd_guardianLastname','$pwd_guardianFirstname','$pwd_guardianMiddlename','$accomplish_lastname','$accomplish_firstname','$accomplish_middlename','$reportingUnit_name','$registration_number','$living','$pwd_spouseName','$pwd_spouseAge','$economic_condition','$pwd_pensionerType','$pwd_pensionMonthly','$pwd_incomeSource','$pwd_incomeMonthly','$pwd_interviewer','$pwd_guardian_contact','$pwd_remarks','$pwd_accessibility','$pwd_services','$pwd_disability_cause_others')");
		$_SESSION['status_title'] = "Success";
	    $_SESSION['status'] = "PWD Added Successfully!";
	    $_SESSION['status_code'] = "success";
	    if ($_SESSION['user_type'] == 'admin') {
	    	header('location: add-pwd.php');
			exit();
	    }
	    elseif($_SESSION['user_type'] == 'user'){
	    	header('location: index.php');
			exit();
	    }
	    
	}
		
	
	
	
}



if (isset($_POST['add-existing-pwd'])) {
	

	$pwd_number = $_POST['pwd_number'];
	$date_applied = $_POST['date_applied'];
	$pwd_lastname = $_POST['pwd_lastname'];
	$pwd_firstname = $_POST['pwd_firstname'];
	$pwd_middlename = $_POST['pwd_middlename'];
	
	if ($_POST['pwd_suffix'] == "") {
		
		$pwd_suffix = NULL;
	}
	else{
		$pwd_suffix = $_POST['pwd_suffix'];
	}
	
	$pwd_birthday = $_POST['pwd_birthday'];
	$pwd_age = $_POST['pwd_age'];
	$pwd_birthplace = $_POST['pwd_birthplace'];
	$sex = $_POST['sex'];
	$pwd_religion = $_POST['pwd_religion'];
	$pwd_ethnic = $_POST['pwd_ethnic'];

	if (isset($_POST['pwd_civilStatus'])) {
		$pwd_civilStatus = $_POST['pwd_civilStatus'];
	}
	else{
		$pwd_civilStatus = NULL;
	}
	if (isset($_POST['pwd_bloodType'])) {
		$pwd_bloodType = $_POST['pwd_bloodType'];
	}
	else{
		$pwd_bloodType = NULL;
	}
	$disability_type = implode(',', $_POST['disability_type']);
	if (isset($_POST['disability_cause'])) {
		$disability_cause = implode(',', $_POST['disability_cause']);
	}
	
	$pwd_street = $_POST['pwd_street'];
	$pwd_barangay = $_POST['pwd_barangay'];
	
	if (isset($_POST['pwd_landline'])) {
		$pwd_landline = $_POST['pwd_landline'];
	}
	
	if (isset($_POST['pwd_mobile'])) {
		$pwd_mobile = $_POST['pwd_mobile'];
	}
	if (isset($_POST['pwd_email'])) {
		$pwd_email = $_POST['pwd_email'];
	}
	if (isset($_POST['pwd_education'])) {
		$pwd_education = $_POST['pwd_education'];
	}
	else{
		$pwd_education = NULL;
	}
	if (isset($_POST['pwd_employmentStatus'])) {
		$pwd_employmentStatus = $_POST['pwd_employmentStatus'];
	}
	else{
		$pwd_employmentStatus = NULL;
	}
	
	if (isset($_POST['pwd_employmentCategory'])) {
		$pwd_employmentCategory = $_POST['pwd_employmentCategory'];
	}
	
	if (isset($_POST['pwd_employmentType'])) {
		$pwd_employmentType = $_POST['pwd_employmentType'];
	}
	
	if (isset($_POST['pwd_occupation'])) {
		$pwd_occupation = $_POST['pwd_occupation'];
		if ($pwd_occupation == "Others") {
			$pwd_occupation = $_POST['pwd_occupationOther'];
		}
		
	}
	if (isset($_POST['pwd_organization'])) {
		$pwd_organization = $_POST['pwd_organization'];
	}	
	if (isset($_POST['pwd_organizationPerson'])) {
		$pwd_organizationPerson = $_POST['pwd_organizationPerson'];
	}
	
	if (isset($_POST['pwd_organizationAddress'])) {
		$pwd_organizationAddress = $_POST['pwd_organizationAddress'];
	}
	
	if (isset($_POST['pwd_organizationTelephone'])) {
		$pwd_organizationTelephone = $_POST['pwd_organizationTelephone'];
	}
	if (isset($_POST['pwd_sss'])) {
		$pwd_sss = $_POST['pwd_sss'];
	}
	if (isset($_POST['pwd_gsis'])) {
		$pwd_gsis = $_POST['pwd_gsis'];
	}
	if (isset($_POST['pwd_pagibig'])) {
		$pwd_pagibig = $_POST['pwd_pagibig'];
	}
	if (isset($_POST['pwd_philhealth'])) {
		$pwd_philhealth = $_POST['pwd_philhealth'];
	}
	if (isset($_POST['pwd_fatherLastname'])) {
		$pwd_fatherLastname = $_POST['pwd_fatherLastname'];
	}
	if (isset($_POST['pwd_fatherFirstname'])) {
		$pwd_fatherFirstname = $_POST['pwd_fatherFirstname'];
	}
	if (isset($_POST['pwd_fatherMiddlename'])) {
		$pwd_fatherMiddlename = $_POST['pwd_fatherMiddlename'];
	}
	if (isset($_POST['pwd_motherLastname'])) {
		$pwd_motherLastname = $_POST['pwd_motherLastname'];
	}
	if (isset($_POST['pwd_motherFirstname'])) {
		$pwd_motherFirstname = $_POST['pwd_motherFirstname'];
	}
	if (isset($_POST['pwd_motherMiddlename'])) {
		$pwd_motherMiddlename = $_POST['pwd_motherMiddlename'];
	}
	if (isset($_POST['pwd_guardianLastname'])) {
		$pwd_guardianLastname = $_POST['pwd_guardianLastname'];
	}
	if (isset($_POST['pwd_guardianFirstname'])) {
		$pwd_guardianFirstname = $_POST['pwd_guardianFirstname'];
	}
	if (isset($_POST['pwd_guardianMiddlename'])) {
		$pwd_guardianMiddlename = $_POST['pwd_guardianMiddlename'];
	}
	else{
		$pwd_guardianMiddlename = $_POST['pwd_guardianMiddlename'];
	}
	$accomplish_lastname = $_POST['accomplish_lastname'];
	$accomplish_firstname = $_POST['accomplish_firstname'];
	$accomplish_middlename = $_POST['accomplish_middlename'];
	
	if (isset($_POST['reportingUnit_name'])) {
		$reportingUnit_name = $_POST['reportingUnit_name'];
	}
	if (isset($_POST['registration_number'])) {
		$registration_number = $_POST['registration_number'];
	}
	if (isset($_POST['living'])) {
		$living = $_POST['living'];
	}
	else{
		$living = NULL;

	}
	
	if (isset($_POST['pwd_spouseName'])) {
		$pwd_spouseName = $_POST['pwd_spouseName'];
	}
	if (isset($_POST['pwd_spouseAge'])) {
		$pwd_spouseAge = $_POST['pwd_spouseAge'];
	}
	if (isset($_POST['economic_condition'])) {
		$economic_condition = implode(',', $_POST['economic_condition']);
	}
	if (isset($_POST['pwd_pensionerType'])) {
		$pwd_pensionerType = $_POST['pwd_pensionerType'];
	}
	if (isset($_POST['pwd_pensionMonthly'])) {
		$pwd_pensionMonthly = $_POST['pwd_pensionMonthly'];
	}
	if (isset($_POST['pwd_incomeSource'])) {
		$pwd_incomeSource = $_POST['pwd_incomeSource'];
	}
	if (isset($_POST['pwd_incomeMonthly'])) {
		$pwd_incomeMonthly = $_POST['pwd_incomeMonthly'];
	}
	$pwd_interviewer = $_POST['pwd_interviewer'];
	$pwd_guardian_contact = $_POST['pwd_guardian_contact'];
	$pwd_remarks = $_POST['pwd_remarks'];

	$pwd_accessibility = $_POST['pwd_accessibility'];
	$pwd_services = $_POST['pwd_services'];

	if(isset($_POST['pwd_disability_cause_others'])){
		$pwd_disability_cause_others = $_POST['pwd_disability_cause_others'];
	}
	else{
		$pwd_disability_cause_others = "";
	}
	// echo "<script>alert('$pwd_number  $pwd_firstname $pwd_lastname $pwd_middlename $disability_type $pwd_occupation $economic_condition $living')</script>";

	//INSERT TO TABLE
	
	$check_pwdnumber = mysqli_query($con, "SELECT * FROM pwd_table where pwd_number='$pwd_number'");
	if (mysqli_num_rows($check_pwdnumber) > 0) {
		$_SESSION['status_title'] = "Failed";
	    $_SESSION['status'] = "PWD Number Already Exist";
	    $_SESSION['status_code'] = "error";
	}
	else{
		if ($_POST['pwd_suffix'] == "") {
			
			$check_name = mysqli_query($con, "SELECT * from pwd_table where pwd_lastname='$pwd_lastname' and pwd_firstname='$pwd_firstname' and pwd_middlename='$pwd_middlename'");
		}
		else{
			$check_name = mysqli_query($con, "SELECT * from pwd_table where pwd_lastname='$pwd_lastname' and pwd_firstname='$pwd_firstname' and pwd_middlename='$pwd_middlename' and pwd_suffix='$pwd_suffix'");
		}
		
		if (mysqli_num_rows($check_name) > 0) {
			$_SESSION['status_title'] = "Failed";
		    $_SESSION['status'] = "PWD Name Already Exist";
		    $_SESSION['status_code'] = "error";
		}
		else{
			//INSERTING
			mysqli_query($con, "INSERT INTO pwd_table (pwd_number,date_applied,pwd_lastname,pwd_firstname,pwd_middlename,pwd_suffix,pwd_birthday,pwd_age,pwd_birthplace,pwd_sex,pwd_religion,pwd_ethnic_group,pwd_civil_status,pwd_blood_type,pwd_disability_type,pwd_disability_cause,pwd_house_street,pwd_barangay,pwd_landline,pwd_mobile,pwd_email,pwd_education,pwd_employment_status,pwd_employment_category,pwd_employment_type,pwd_occupation,pwd_organization,pwd_organization_contact,pwd_organization_address,pwd_organization_telephone,pwd_sss,pwd_gsis,pwd_pagibig,pwd_philhealth,pwd_father_lastname,pwd_father_firstname,pwd_father_middlename,pwd_mother_lastname,pwd_mother_firstname,pwd_mother_middlename,pwd_guardian_lastname,pwd_guardian_firstname,pwd_guardian_middlename,accomplished_lastname,accomplished_firstname,accomplished_middlename,reporting_unit,registration_number,pwd_living,pwd_spouse_name,pwd_spouse_age,pwd_support,pwd_pensioner_type,pwd_pension_monthly,pwd_income_source,pwd_income_monthly,interviewed_by, pwd_guardian_contact, pwd_remarks, pwd_accessibility, pwd_services,pwd_disability_cause_others) VALUES ('$pwd_number','$date_applied','$pwd_lastname','$pwd_firstname','$pwd_middlename','$pwd_suffix','$pwd_birthday','$pwd_age','$pwd_birthplace','$sex','$pwd_religion','$pwd_ethnic','$pwd_civilStatus','$pwd_bloodType','$disability_type','$disability_cause','$pwd_street','$pwd_barangay','$pwd_landline','$pwd_mobile','$pwd_email','$pwd_education','$pwd_employmentStatus','$pwd_employmentCategory','$pwd_employmentType','$pwd_occupation','$pwd_organization','$pwd_organizationPerson','$pwd_organizationAddress','$pwd_organizationTelephone','$pwd_sss','$pwd_gsis','$pwd_pagibig','$pwd_philhealth','$pwd_fatherLastname','$pwd_fatherFirstname','$pwd_fatherMiddlename','$pwd_motherLastname','$pwd_motherFirstname','$pwd_motherMiddlename','$pwd_guardianLastname','$pwd_guardianFirstname','$pwd_guardianMiddlename','$accomplish_lastname','$accomplish_firstname','$accomplish_middlename','$reportingUnit_name','$registration_number','$living','$pwd_spouseName','$pwd_spouseAge','$economic_condition','$pwd_pensionerType','$pwd_pensionMonthly','$pwd_incomeSource','$pwd_incomeMonthly','$pwd_interviewer','$pwd_guardian_contact','$pwd_remarks','$pwd_accessibility','$pwd_services','$pwd_disability_cause_others')");
			$_SESSION['status_title'] = "Success";
		    $_SESSION['status'] = "PWD Added Successfully!";
		    $_SESSION['status_code'] = "success";
		    
		    if ($_SESSION['user_type'] == 'admin') {
	    	header('location: add-pwd.php');
			exit();
		    }
		    elseif($_SESSION['user_type'] == 'user'){
		    	header('location: index.php');
				exit();
		    }
			
		}
	}
		
	
	
	
}
if (isset($_POST['check-pwd-number'])) {
	//EDIT PURPOSES
	$old_pwd_number = $_SESSION['pwd_number'];
	$pwd_number = $_POST['pwdnumber'];
	$pwd_query = mysqli_query($con, "SELECT * FROM pwd_table where pwd_number!='$old_pwd_number' and pwd_number='$pwd_number'");
	if (mysqli_num_rows($pwd_query) > 0) {
		echo "PWD Number Already Exist! Try Another";
	}

}


if (isset($_POST['check-new-pwd-number'])) {
	
	$pwd_number = $_POST['pwdnumber'];
	$pwd_query = mysqli_query($con, "SELECT * FROM pwd_table where pwd_number='$pwd_number'");
	if (mysqli_num_rows($pwd_query) > 0) {
		echo "PWD Number Already Exist! Try Another";
	}

}
if (isset($_POST['check-account-number'])) {
	
	$acc_number = $_POST['accnumber'];
	$acc_query = mysqli_query($con, "SELECT * FROM account_table where id_number='$acc_number'");
	if (mysqli_num_rows($acc_query) > 0) {
		echo "Account ID Number Already Exist! Try Another";

	}

}
if (isset($_POST['check-account-number-edit'])) {
	
	$acc_number = $_POST['accnumber'];
	$old_acc_number = $_POST['old_accnumber'];
	$acc_query = mysqli_query($con, "SELECT * FROM account_table where id_number='$acc_number' and id_number!='$old_acc_number'");
	if (mysqli_num_rows($acc_query) > 0) {
		echo "Account ID Number Already Exist! Try Another";

	}

}

if (isset($_GET['delete-pwd'])) {
	$barangay = $_GET['barangay'];

	$id = $_GET['delete-pwd'];
	$delete_query = mysqli_query($con, "DELETE from pwd_table where pwd_id='$id'");
	if ($delete_query) {
		$_SESSION['status_title'] = "Success";
	    $_SESSION['status'] = "PWD Record successfully delete.";
	    $_SESSION['status_code'] = "success";
	}
	else{
		$_SESSION['status_title'] = "Error!";
	    $_SESSION['status'] = "Record failed to delete!";
	    $_SESSION['status_code'] = "error";
	}
	
    header("location: admin/barangay-page.php?barangay=$barangay");
	exit();
}
if (isset($_POST['assign-number'])) {
	$barangay = $_POST['barangay'];
	$id_number = $_POST['id_number_static'];
	echo "<script>alert('$id_number')</script>";
	$check_number = mysqli_query($con, "SELECT * FROM pwd_table where pwd_number='$id_number'");
	if (mysqli_num_rows($check_number) > 0) {
		$_SESSION['status_title'] = "Invalid";
	    $_SESSION['status'] = "PWD Number Already Exist!";
	    $_SESSION['status_code'] = "error";
	    header("location: barangay.php?barangay=$barangay");
		exit();
	}
	else{
		$id = $_POST['pwd_id_post'];
		$get_pwd = mysqli_query($con, "SELECT * FROM pwd_table where pwd_id='$id'");
		$fetch = mysqli_fetch_assoc($get_pwd);
		$fname = $fetch['pwd_firstname'];
		$mname = $fetch['pwd_middlename'];
		$lname = $fetch['pwd_lastname'];
		$suffix = $fetch['pwd_suffix'];
		if ($suffix !='') {
			$fullname = $fname." " . $mname." ".$lname. " ". $suffix;
		}
		else{
			$fullname = $fname." " . $mname." ".$lname;
		}

		mysqli_query($con, "UPDATE pwd_table SET pwd_number='$id_number' where pwd_id='$id'");
		
		$_SESSION['status_title'] = "Success";
	    $_SESSION['status'] = "PWD Number for ". $fullname ." assigned successfully!";
	    $_SESSION['status_code'] = "success";
	    header("location: barangay.php?barangay=$barangay");
		exit();
	}
}
if (isset($_GET['edit-pwd'])) {
	
	$id = $_GET['edit-pwd'];
	if (isset($_GET['barangay'])) {
		$_SESSION['barangay'] = $_GET['barangay'];
	}
	
	$_SESSION['pwd_id'] = $_GET['edit-pwd'];

	$get_pwd_query = mysqli_query($con, "SELECT * FROM pwd_table where pwd_id='$id'");
	

	if (mysqli_num_rows($get_pwd_query) > 0) {
		$fetch = mysqli_fetch_assoc($get_pwd_query);
		$_SESSION['pwd_number'] = $fetch['pwd_number'];
		$_SESSION['pwd_lastname'] = $fetch['pwd_lastname'];
		$_SESSION['pwd_firstname'] = $fetch['pwd_firstname'];
		$_SESSION['pwd_middlename'] = $fetch['pwd_middlename'];
		$_SESSION['pwd_suffix'] = $fetch['pwd_suffix'];
		$_SESSION['date_applied'] = $fetch['date_applied'];
		$_SESSION['pwd_birthday'] = $fetch['pwd_birthday'];
		$_SESSION['pwd_age'] = $fetch['pwd_age'];
		$_SESSION['pwd_birthplace'] = $fetch['pwd_birthplace'];
		$_SESSION['pwd_sex'] = $fetch['pwd_sex'];
		$_SESSION['pwd_religion'] = $fetch['pwd_religion'];
		$_SESSION['pwd_ethnic_group'] = $fetch['pwd_ethnic_group'];
		$_SESSION['pwd_civil_status'] = $fetch['pwd_civil_status'];
		$_SESSION['pwd_blood_type'] = $fetch['pwd_blood_type'];
		$_SESSION['pwd_disability_type'] = $fetch['pwd_disability_type'];
		$_SESSION['pwd_disability_cause'] = $fetch['pwd_disability_cause'];
		$_SESSION['pwd_house_street'] = $fetch['pwd_house_street'];
		$_SESSION['pwd_barangay'] = $fetch['pwd_barangay'];
		$_SESSION['pwd_landline'] = $fetch['pwd_landline'];
		$_SESSION['pwd_mobile'] = $fetch['pwd_mobile'];
		$_SESSION['pwd_email'] = $fetch['pwd_email'];
		$_SESSION['pwd_education'] = $fetch['pwd_education'];
		$_SESSION['pwd_employment_status'] = $fetch['pwd_employment_status'];
		$_SESSION['pwd_occupation'] = $fetch['pwd_occupation'];
		$_SESSION['pwd_employment_category'] = $fetch['pwd_employment_category'];
		$_SESSION['pwd_employment_type'] = $fetch['pwd_employment_type'];
		$_SESSION['pwd_organization'] = $fetch['pwd_organization'];
		$_SESSION['pwd_organization_contact'] = $fetch['pwd_organization_contact'];
		$_SESSION['pwd_organization_address'] = $fetch['pwd_organization_address'];
		$_SESSION['pwd_organization_telephone'] = $fetch['pwd_organization_telephone'];
		$_SESSION['pwd_sss'] = $fetch['pwd_sss'];
		$_SESSION['pwd_gsis'] = $fetch['pwd_gsis'];
		$_SESSION['pwd_pagibig'] = $fetch['pwd_pagibig'];
		$_SESSION['pwd_philhealth'] = $fetch['pwd_philhealth'];
		
		$_SESSION['pwd_father_lastname'] = $fetch['pwd_father_lastname'];
		$_SESSION['pwd_father_firstname'] = $fetch['pwd_father_firstname'];
		$_SESSION['pwd_father_middlename'] = $fetch['pwd_father_middlename'];

		$_SESSION['pwd_mother_lastname'] = $fetch['pwd_mother_lastname'];
		$_SESSION['pwd_mother_firstname'] = $fetch['pwd_mother_firstname'];
		$_SESSION['pwd_mother_middlename'] = $fetch['pwd_mother_middlename'];

		$_SESSION['pwd_guardian_lastname'] = $fetch['pwd_guardian_lastname'];
		$_SESSION['pwd_guardian_firstname'] = $fetch['pwd_guardian_firstname'];
		$_SESSION['pwd_guardian_middlename'] = $fetch['pwd_guardian_middlename'];
		$_SESSION['pwd_guardian_contact'] = $fetch['pwd_guardian_contact'];

		$_SESSION['accomplished_lastname'] = $fetch['accomplished_lastname'];
		$_SESSION['accomplished_firstname'] = $fetch['accomplished_firstname'];
		$_SESSION['accomplished_middlename'] = $fetch['accomplished_middlename'];

		$_SESSION['reporting_unit'] = $fetch['reporting_unit'];
		$_SESSION['registration_number'] = $fetch['registration_number'];
		$_SESSION['pwd_living'] = $fetch['pwd_living'];
		$_SESSION['pwd_spouse_name'] = $fetch['pwd_spouse_name'];
		$_SESSION['pwd_spouse_age'] = $fetch['pwd_spouse_age'];
		$_SESSION['pwd_support'] = $fetch['pwd_support'];
		$_SESSION['pwd_pensioner'] = $fetch['pwd_pensioner'];
		$_SESSION['pwd_pensioner_type'] = $fetch['pwd_pensioner_type'];
		$_SESSION['pwd_pension_monthly'] = $fetch['pwd_pension_monthly'];
		$_SESSION['pwd_income_source'] = $fetch['pwd_income_source'];
		$_SESSION['pwd_income_monthly'] = $fetch['pwd_income_monthly'];
		$_SESSION['interviewed_by'] = $fetch['interviewed_by'];
		$_SESSION['pwd_remarks'] = $fetch['pwd_remarks'];

		$_SESSION['accessibility_needs'] = $fetch['pwd_accessibility'];
		$_SESSION['services_needs'] = $fetch['pwd_services'];
		$_SESSION['pwd_disability_cause_others'] = $fetch['pwd_disability_cause_others'];
	}

	else{
		echo "Query Error!";
	}
	
	
	if (isset($_GET['barangay']) OR $_SESSION['user_type'] == 'admin') {
		header("location: admin/edit-pwd.php");
		exit();
	}
	else{
		header("location: user/edit-pwd.php");
		exit();
	}

	

}


if (isset($_POST['submit-edit-pwd'])) {

	$barangay = $_SESSION['barangay'];


    
	
	if (isset($_POST['date_applied'])) {
		if ($_POST['date_applied'] == '') {
			$date_applied = '0000-00-00';
		}
		else{
			$date_applied =$_POST['date_applied'];
		}
	}
	
	
	$pwd_lastname = $_POST['pwd_lastname'];
	$pwd_firstname = $_POST['pwd_firstname'];
	
	if (isset($_POST['pwd_middlename'])) {
		$pwd_middlename = $_POST['pwd_middlename'];
	}
	else{
		$pwd_middlename = '';
	}
	
	if (isset($_POST['pwd_suffix'])) {
		
		$pwd_suffix = $_POST['pwd_suffix'];
	}
	else{
		$pwd_suffix = '';
	}
	
	
	if (isset($_POST['pwd_birthday'])) {
		if ($_POST['pwd_birthday'] == '') {
			$pwd_birthday = '0000-00-00';
		}
		else{

			$pwd_birthday = $_POST['pwd_birthday'];
		}
		
	}
	
	
	if (isset($_POST['pwd_age'])) {
		$pwd_age = $_POST['pwd_age'];
	}
	else{
		$pwd_age = '';
	}
	
	if (isset($_POST['pwd_birthplace'])) {
		$pwd_birthplace = $_POST['pwd_birthplace'];
	}
	else{
		$pwd_birthplace = '';
	}
	$sex = $_POST['sex'];
	
	if (isset($_POST['pwd_religion'])) {
		$pwd_religion = $_POST['pwd_religion'];
	}
	else{
		$pwd_religion = '';
	}
	
	if (isset($_POST['pwd_ethnic'])) {
		$pwd_ethnic = $_POST['pwd_ethnic'];
	}
	else{
		$pwd_ethnic = '';
	}
	
	if (isset($_POST['pwd_civilStatus'])) {
		$pwd_civilStatus = $_POST['pwd_civilStatus'];
		
	}
	else{
		$pwd_civilStatus = '';
	}
	
	if (isset($_POST['pwd_bloodType'])) {
		$pwd_bloodType = $_POST['pwd_bloodType'];
	}
	else{
		$pwd_bloodType = '';
	}

	

	if (isset($_POST['disability_type'])) {
		$disability_type = implode(',', $_POST['disability_type']);
	}
	else{
		$disability_type = '';
	}

	if (isset($_POST['disability_cause'])) {
		$disability_cause = implode(',', $_POST['disability_cause']);
	}
	else{
		$disability_cause = '';
	}
	
	
	if (isset($_POST['pwd_street'])) {
		$pwd_street = $_POST['pwd_street'];
	}
	else{
		$pwd_street = '';
	}

	
	if (isset($_POST['pwd_barangay'])) {
		$pwd_barangay = $_POST['pwd_barangay'];
	}
	else{
		$pwd_barangay = '';
	}
	
	if (isset($_POST['pwd_landline'])) {
		$pwd_landline = $_POST['pwd_landline'];
	}
	else{
		$pwd_landline = '';
	}
	
	if (isset($_POST['pwd_mobile'])) {
		$pwd_mobile = $_POST['pwd_mobile'];
	}
	else{
		$pwd_mobile = '';
	}

	if (isset($_POST['pwd_email'])) {
		$pwd_email = $_POST['pwd_email'];
	}
	else{
		$pwd_email = '';
	}
	
	

	if (isset($_POST['pwd_education'])) {
		$pwd_education = $_POST['pwd_education'];
	}
	else{
		$pwd_education = '';
	}
	if (isset($_POST['pwd_employmentStatus'])) {
		$pwd_employmentStatus = $_POST['pwd_employmentStatus'];
	}
	else{
		$pwd_employmentStatus = '';
	}
	
	if (isset($_POST['pwd_employmentCategory'])) {
		$pwd_employmentCategory = $_POST['pwd_employmentCategory'];
	}
	else{
		$pwd_employmentCategory = '';
	}
	
	if (isset($_POST['pwd_employmentType'])) {
		$pwd_employmentType = $_POST['pwd_employmentType'];
	}
	else{
		$pwd_employmentType = '';
	}
	
	if (isset($_POST['pwd_occupation'])) {
		$pwd_occupation = $_POST['pwd_occupation'];
		if ($pwd_occupation == "Others") {
			$pwd_occupation = $_POST['pwd_occupationOther'];
		}
		
	}
	else{
		$pwd_occupation = '';
	}

	if (isset($_POST['pwd_organization'])) {
		$pwd_organization = $_POST['pwd_organization'];
	}
	else{
		$pwd_organization = '';
	}

	if (isset($_POST['pwd_organizationPerson'])) {
		$pwd_organizationPerson = $_POST['pwd_organizationPerson'];
	}
	else{
		$pwd_organizationPerson = '';
	}
	
	if (isset($_POST['pwd_organizationAddress'])) {
		$pwd_organizationAddress = $_POST['pwd_organizationAddress'];
	}
	else{
		$pwd_organizationAddress = '';
	}
	
	if (isset($_POST['pwd_organizationTelephone'])) {
		$pwd_organizationTelephone = $_POST['pwd_organizationTelephone'];
	}
	else{
		$pwd_organizationTelephone = '';
	}

	if (isset($_POST['pwd_sss'])) {
		$pwd_sss = $_POST['pwd_sss'];
	}
	else{
		$pwd_sss = '';
	}

	if (isset($_POST['pwd_gsis'])) {
		$pwd_gsis = $_POST['pwd_gsis'];
	}
	else{
		$pwd_gsis = '';
	}

	if (isset($_POST['pwd_pagibig'])) {
		$pwd_pagibig = $_POST['pwd_pagibig'];
	}
	else{
		$pwd_pagibig = '';
	}

	if (isset($_POST['pwd_philhealth'])) {
		$pwd_philhealth = $_POST['pwd_philhealth'];
	}
	else{
		$pwd_philhealth = '';
	}

	if (isset($_POST['pwd_fatherLastname'])) {
		$pwd_fatherLastname = $_POST['pwd_fatherLastname'];
	}
	else{
		$pwd_fatherLastname = '';
	}
	
	if (isset($_POST['pwd_fatherFirstname'])) {
		$pwd_fatherFirstname = $_POST['pwd_fatherFirstname'];
	}
	else{
		$pwd_fatherMiddlename = '';
	}

	if (isset($_POST['pwd_fatherMiddlename'])) {
		$pwd_fatherMiddlename = $_POST['pwd_fatherMiddlename'];
	}
	else{
		$pwd_fatherMiddlename = '';
	}

	if (isset($_POST['pwd_motherLastname'])) {
		$pwd_motherLastname = $_POST['pwd_motherLastname'];
	}
	else{
		$pwd_motherLastname = '';
	}

	if (isset($_POST['pwd_motherFirstname'])) {
		$pwd_motherFirstname = $_POST['pwd_motherFirstname'];
	}
	else{
		$pwd_motherFirstname = '';
	}
	if (isset($_POST['pwd_motherMiddlename'])) {
		$pwd_motherMiddlename = $_POST['pwd_motherMiddlename'];
	}
	else{
		$pwd_motherMiddlename = '';
	}

	if (isset($_POST['pwd_guardianLastname'])) {
		$pwd_guardianLastname = $_POST['pwd_guardianLastname'];
	}
	else{
		$pwd_guardianLastname = '';
	}

	if (isset($_POST['pwd_guardianFirstname'])) {
		$pwd_guardianFirstname = $_POST['pwd_guardianFirstname'];
	}
	else{
		$pwd_guardianFirstname = '';
	}

	if (isset($_POST['pwd_guardianMiddlename'])) {
		$pwd_guardianMiddlename = $_POST['pwd_guardianMiddlename'];
	}
	else{
		$pwd_guardianMiddlename = '';
	}
	
	if (isset($_POST['accomplish_lastname'])) {
		$accomplish_lastname = $_POST['accomplish_lastname'];
	}
	else{
		$accomplish_lastname = '';
	}

	
	if (isset($_POST['accomplish_firstname'])) {
		$accomplish_firstname = $_POST['accomplish_firstname'];
	}
	else{
		$accomplish_firstname = '';
	}
	
	
	if (isset($_POST['accomplish_middlename'])) {
		$accomplish_middlename = $_POST['accomplish_middlename'];
	}
	else{
		$accomplish_middlename = '';
	}
	
	if (isset($_POST['reportingUnit_name'])) {
		$reportingUnit_name = $_POST['reportingUnit_name'];
	}
	else{
		$reportingUnit_name = '';
	}
	if (isset($_POST['registration_number'])) {
		$registration_number = $_POST['registration_number'];
	}
	else{
		$registration_number = '';
	}
	

	if (isset($_POST['living'])) {
		$living = $_POST['living'];
	}
	else{
		$living = '';

	}
	
	if (isset($_POST['pwd_spouseName'])) {
		$pwd_spouseName = $_POST['pwd_spouseName'];
	}
	else{
		$pwd_spouseName = '';
	}

	if (isset($_POST['pwd_spouseAge'])) {
		$pwd_spouseAge = $_POST['pwd_spouseAge'];
	}
	else{
		$pwd_spouseAge = '';
	}

	// if (isset($_POST['economic_condition'])) {
	// 	$economic_condition = implode(',', $_POST['economic_condition']);
	// }
	// else{
	// 	$economic_condition = '';
	// }

	if (isset($_POST['pwd_support'])) {
		$pwd_support = $_POST['pwd_support'];
	}
	else{
		$pwd_support = '';
	}
	if (isset($_POST['pwd_pensioner'])) {
		$pwd_pensioner = $_POST['pwd_pensioner'];
	}
	else{
		$pwd_pensioner = '';
	}

	if (isset($_POST['pwd_pensionerType'])) {
		$pwd_pensionerType = $_POST['pwd_pensionerType'];
	}
	else{
		$pwd_pensionerType = '';
	}

	if (isset($_POST['pwd_pensionMonthly'])) {
		$pwd_pensionMonthly = $_POST['pwd_pensionMonthly'];
	}
	else{
		$pwd_pensionMonthly = '';
	}

	if (isset($_POST['pwd_incomeSource'])) {
		$pwd_incomeSource = $_POST['pwd_incomeSource'];
	}
	else{
		$pwd_incomeSource = '';
	}

	if (isset($_POST['pwd_incomeMonthly'])) {
		$pwd_incomeMonthly = $_POST['pwd_incomeMonthly'];
	}
	else{
		$pwd_incomeMonthly = '';
	}
	$pwd_interviewer = $_POST['pwd_interviewer'];
	
	if (isset($_POST['pwd_guardian_contact'])) {
		$pwd_guardian_contact = $_POST['pwd_guardian_contact'];
	}
	else{
		$pwd_guardian_contact = '';
	}

	
	if (isset($_POST['pwd_remarks'])) {
		$pwd_remarks = $_POST['pwd_remarks'];
	}
	else{
		$pwd_remarks = '';
	}

	if (isset($_POST['pwd_accessibility'])) {
		$pwd_accessibility = $_POST['pwd_accessibility'];
	}
	else{
		$pwd_accessibility = '';
	}

	if (isset($_POST['pwd_services'])) {
		$pwd_services = $_POST['pwd_services'];
	}
	else{
		$pwd_services = '';
	}
	if(isset($_POST['pwd_disability_cause_others'])){
		$pwd_disability_cause_others = $_POST['pwd_disability_cause_others'];
	}
	else{
		$pwd_disability_cause_others = '';
	}


	$old_pwd_number = $_SESSION['pwd_number'];
	$pwd_number = $_POST['pwd_number'];
	$id = $_SESSION['pwd_id'];

	$pwd_query = mysqli_query($con, "SELECT * FROM pwd_table where pwd_number!='$old_pwd_number' and pwd_number='$pwd_number'");
	if (mysqli_num_rows($pwd_query)) {
		
		$_SESSION['status_title'] = "Error";
	    $_SESSION['status'] = "PWD Number Already Exist! Try Another";
	    $_SESSION['status_code'] = "error";
	}
	else{
		$update = mysqli_query($con, "UPDATE pwd_table set pwd_number='$pwd_number',pwd_lastname='$pwd_lastname',pwd_firstname='$pwd_firstname',pwd_middlename='$pwd_middlename', pwd_suffix='$pwd_suffix', date_applied='$date_applied', pwd_birthday='$pwd_birthday', pwd_age='$pwd_age', pwd_birthplace = '$pwd_birthplace', pwd_sex='$sex', pwd_religion='$pwd_religion', pwd_ethnic_group='$pwd_ethnic', pwd_civil_status='$pwd_civilStatus', pwd_blood_type='$pwd_bloodType', pwd_disability_type='$disability_type', pwd_disability_cause='$disability_cause', pwd_house_street='$pwd_street', pwd_barangay='$pwd_barangay', pwd_landline='$pwd_landline', pwd_mobile='$pwd_mobile',pwd_email='$pwd_email',	pwd_guardian_contact='$pwd_guardian_contact',pwd_education='$pwd_education', pwd_employment_status='$pwd_employmentStatus', pwd_occupation='$pwd_occupation', pwd_employment_category='$pwd_employmentCategory', pwd_employment_type='$pwd_employmentType', pwd_organization='$pwd_organization', pwd_organization_contact='$pwd_organizationPerson', pwd_organization_address='$pwd_organizationAddress', pwd_organization_telephone='$pwd_organizationTelephone', pwd_sss='$pwd_sss',pwd_gsis='$pwd_gsis', pwd_pagibig='$pwd_pagibig', pwd_philhealth='$pwd_philhealth', pwd_father_lastname='$pwd_fatherLastname', pwd_father_firstname='$pwd_fatherFirstname', pwd_father_middlename='$pwd_fatherMiddlename',pwd_mother_lastname='$pwd_motherLastname', pwd_mother_firstname='$pwd_motherFirstname', pwd_mother_middlename='$pwd_motherMiddlename',pwd_guardian_lastname='$pwd_guardianLastname', pwd_guardian_firstname='$pwd_guardianFirstname', pwd_guardian_middlename='$pwd_guardianMiddlename', accomplished_lastname='$accomplish_lastname', accomplished_firstname='$accomplish_firstname', accomplished_middlename='$accomplish_middlename', reporting_unit='$reportingUnit_name', registration_number='$registration_number', pwd_living='$living', pwd_spouse_name='$pwd_spouseName', pwd_spouse_age='$pwd_spouseAge', pwd_support='$pwd_support',pwd_pensioner='$pwd_pensioner',pwd_pensioner_type='$pwd_pensionerType',pwd_pension_monthly='$pwd_pensionMonthly', pwd_income_source='$pwd_incomeSource', pwd_income_monthly='$pwd_incomeMonthly', pwd_remarks='$pwd_remarks', pwd_accessibility='$pwd_accessibility', pwd_services='$pwd_services', pwd_disability_cause_others='$pwd_disability_cause_others' where pwd_id='$id'");
			if (mysqli_affected_rows($con) > 0) {
				$_SESSION['status_title'] = "Success";
			    $_SESSION['status'] = "PWD Updated Successfully";
			    $_SESSION['status_code'] = "success";
			    
			}
			else{
				$_SESSION['status_title'] = "Info";
			    $_SESSION['status'] = "No Changes Made!";
			    $_SESSION['status_code'] = "info";
			    
			}
			header("location: barangay-page.php?barangay=$barangay");
			exit();
	}
}



if (isset($_GET['recently-edit-pwd'])) {
	
	$id = $_GET['recently-edit-pwd'];
	if (isset($_GET['barangay'])) {
		$_SESSION['barangay'] = $_GET['barangay'];
	}
	
	$_SESSION['pwd_id2'] = $id;

	$get_pwd_query = mysqli_query($con, "SELECT * FROM pwd_table where pwd_id='$id'");
	

	if (mysqli_num_rows($get_pwd_query) > 0) {
		$fetch = mysqli_fetch_assoc($get_pwd_query);
		$_SESSION['pwd_number2'] = $fetch['pwd_number'];
		$_SESSION['pwd_lastname2'] = $fetch['pwd_lastname'];
		$_SESSION['pwd_firstname2'] = $fetch['pwd_firstname'];
		$_SESSION['pwd_middlename2'] = $fetch['pwd_middlename'];
		$_SESSION['pwd_suffix2'] = $fetch['pwd_suffix'];
		$_SESSION['date_applied2'] = $fetch['date_applied'];
		$_SESSION['pwd_birthday2'] = $fetch['pwd_birthday'];
		$_SESSION['pwd_age2'] = $fetch['pwd_age'];
		$_SESSION['pwd_birthplace2'] = $fetch['pwd_birthplace'];
		$_SESSION['pwd_sex2'] = $fetch['pwd_sex'];
		$_SESSION['pwd_religion2'] = $fetch['pwd_religion'];
		$_SESSION['pwd_ethnic_group2'] = $fetch['pwd_ethnic_group'];
		$_SESSION['pwd_civil_status2'] = $fetch['pwd_civil_status'];
		$_SESSION['pwd_blood_type2'] = $fetch['pwd_blood_type'];
		$_SESSION['pwd_disability_type2'] = $fetch['pwd_disability_type'];
		$_SESSION['pwd_disability_cause2'] = $fetch['pwd_disability_cause'];
		$_SESSION['pwd_house_street2'] = $fetch['pwd_house_street'];
		$_SESSION['pwd_barangay2'] = $fetch['pwd_barangay'];
		$_SESSION['pwd_landline2'] = $fetch['pwd_landline'];
		$_SESSION['pwd_mobile2'] = $fetch['pwd_mobile'];
		$_SESSION['pwd_email2'] = $fetch['pwd_email'];
		$_SESSION['pwd_education2'] = $fetch['pwd_education'];
		$_SESSION['pwd_employment_status2'] = $fetch['pwd_employment_status'];
		$_SESSION['pwd_occupation2'] = $fetch['pwd_occupation'];
		$_SESSION['pwd_employment_category2'] = $fetch['pwd_employment_category'];
		$_SESSION['pwd_employment_type2'] = $fetch['pwd_employment_type'];
		$_SESSION['pwd_organization2'] = $fetch['pwd_organization'];
		$_SESSION['pwd_organization_contact2'] = $fetch['pwd_organization_contact'];
		$_SESSION['pwd_organization_address2'] = $fetch['pwd_organization_address'];
		$_SESSION['pwd_organization_telephone2'] = $fetch['pwd_organization_telephone'];
		$_SESSION['pwd_sss2'] = $fetch['pwd_sss'];
		$_SESSION['pwd_gsis2'] = $fetch['pwd_gsis'];
		$_SESSION['pwd_pagibig2'] = $fetch['pwd_pagibig'];
		$_SESSION['pwd_philhealth2'] = $fetch['pwd_philhealth'];
		
		$_SESSION['pwd_father_lastname2'] = $fetch['pwd_father_lastname'];
		$_SESSION['pwd_father_firstname2'] = $fetch['pwd_father_firstname'];
		$_SESSION['pwd_father_middlename2'] = $fetch['pwd_father_middlename'];

		$_SESSION['pwd_mother_lastname2'] = $fetch['pwd_mother_lastname'];
		$_SESSION['pwd_mother_firstname2'] = $fetch['pwd_mother_firstname'];
		$_SESSION['pwd_mother_middlename2'] = $fetch['pwd_mother_middlename'];

		$_SESSION['pwd_guardian_lastname2'] = $fetch['pwd_guardian_lastname'];
		$_SESSION['pwd_guardian_firstname2'] = $fetch['pwd_guardian_firstname'];
		$_SESSION['pwd_guardian_middlename2'] = $fetch['pwd_guardian_middlename'];
		$_SESSION['pwd_guardian_contact2'] = $fetch['pwd_guardian_contact'];

		$_SESSION['accomplished_lastname2'] = $fetch['accomplished_lastname'];
		$_SESSION['accomplished_firstname2'] = $fetch['accomplished_firstname'];
		$_SESSION['accomplished_middlename2'] = $fetch['accomplished_middlename'];

		$_SESSION['reporting_unit2'] = $fetch['reporting_unit'];
		$_SESSION['registration_number2'] = $fetch['registration_number'];
		$_SESSION['pwd_living2'] = $fetch['pwd_living'];
		$_SESSION['pwd_spouse_name2'] = $fetch['pwd_spouse_name'];
		$_SESSION['pwd_spouse_age2'] = $fetch['pwd_spouse_age'];
		$_SESSION['pwd_support2'] = $fetch['pwd_support'];
		$_SESSION['pwd_pensioner2'] = $fetch['pwd_pensioner'];
		$_SESSION['pwd_pensioner_type2'] = $fetch['pwd_pensioner_type'];
		$_SESSION['pwd_pension_monthly2'] = $fetch['pwd_pension_monthly'];
		$_SESSION['pwd_income_source2'] = $fetch['pwd_income_source'];
		$_SESSION['pwd_income_monthly2'] = $fetch['pwd_income_monthly'];
		$_SESSION['interviewed_by2'] = $fetch['interviewed_by'];
		$_SESSION['pwd_remarks2'] = $fetch['pwd_remarks'];
		$_SESSION['pwd_accessibility'] = $fetch['pwd_accessibility'];
		$_SESSION['pwd_services'] = $fetch['pwd_services'];

		$_SESSION['pwd_disability_cause_others'] = $fetch['pwd_disability_cause_others'];
	}

	else{
		echo "Query Error!";
	}
	
	header("location: admin/recently-edit-pwd.php");
	exit();
	

	

}


if (isset($_POST['recently-submit-edit-pwd'])) {

	$barangay = $_SESSION['pwd_barangay2'];


    
	
	if (isset($_POST['date_applied'])) {
		if ($_POST['date_applied'] == '') {
			$date_applied = '0000-00-00';
		}
		else{
			$date_applied =$_POST['date_applied'];
		}
	}
	
	
	$pwd_lastname = $_POST['pwd_lastname'];
	$pwd_firstname = $_POST['pwd_firstname'];
	
	if (isset($_POST['pwd_middlename'])) {
		$pwd_middlename = $_POST['pwd_middlename'];
	}
	else{
		$pwd_middlename = '';
	}
	
	if (isset($_POST['pwd_suffix'])) {
		
		$pwd_suffix = $_POST['pwd_suffix'];
	}
	else{
		$pwd_suffix = '';
	}
	
	
	if (isset($_POST['pwd_birthday'])) {
		if ($_POST['pwd_birthday'] == '') {
			$pwd_birthday = '0000-00-00';
		}
		else{

			$pwd_birthday = $_POST['pwd_birthday'];
		}
		
	}
	
	
	if (isset($_POST['pwd_age'])) {
		$pwd_age = $_POST['pwd_age'];
	}
	else{
		$pwd_age = '';
	}
	
	if (isset($_POST['pwd_birthplace'])) {
		$pwd_birthplace = $_POST['pwd_birthplace'];
	}
	else{
		$pwd_birthplace = '';
	}
	$sex = $_POST['sex'];
	
	if (isset($_POST['pwd_religion'])) {
		$pwd_religion = $_POST['pwd_religion'];
	}
	else{
		$pwd_religion = '';
	}
	
	if (isset($_POST['pwd_ethnic'])) {
		$pwd_ethnic = $_POST['pwd_ethnic'];
	}
	else{
		$pwd_ethnic = '';
	}
	
	if (isset($_POST['pwd_civilStatus'])) {
		$pwd_civilStatus = $_POST['pwd_civilStatus'];
		
	}
	else{
		$pwd_civilStatus = '';
	}
	
	if (isset($_POST['pwd_bloodType'])) {
		$pwd_bloodType = $_POST['pwd_bloodType'];
	}
	else{
		$pwd_bloodType = '';
	}

	

	if (isset($_POST['disability_type'])) {
		$disability_type = implode(',', $_POST['disability_type']);
	}
	else{
		$disability_type = '';
	}

	if (isset($_POST['disability_cause'])) {
		$disability_cause = implode(',', $_POST['disability_cause']);
	}
	else{
		$disability_cause = '';
	}
	
	
	if (isset($_POST['pwd_street'])) {
		$pwd_street = $_POST['pwd_street'];
	}
	else{
		$pwd_street = '';
	}

	
	if (isset($_POST['pwd_barangay'])) {
		$pwd_barangay = $_POST['pwd_barangay'];
	}
	else{
		$pwd_barangay = '';
	}
	
	if (isset($_POST['pwd_landline'])) {
		$pwd_landline = $_POST['pwd_landline'];
	}
	else{
		$pwd_landline = '';
	}
	
	if (isset($_POST['pwd_mobile'])) {
		$pwd_mobile = $_POST['pwd_mobile'];
	}
	else{
		$pwd_mobile = '';
	}

	if (isset($_POST['pwd_email'])) {
		$pwd_email = $_POST['pwd_email'];
	}
	else{
		$pwd_email = '';
	}
	
	

	if (isset($_POST['pwd_education'])) {
		$pwd_education = $_POST['pwd_education'];
	}
	else{
		$pwd_education = '';
	}
	if (isset($_POST['pwd_employmentStatus'])) {
		$pwd_employmentStatus = $_POST['pwd_employmentStatus'];
	}
	else{
		$pwd_employmentStatus = '';
	}
	
	if (isset($_POST['pwd_employmentCategory'])) {
		$pwd_employmentCategory = $_POST['pwd_employmentCategory'];
	}
	else{
		$pwd_employmentCategory = '';
	}
	
	if (isset($_POST['pwd_employmentType'])) {
		$pwd_employmentType = $_POST['pwd_employmentType'];
	}
	else{
		$pwd_employmentType = '';
	}
	
	if (isset($_POST['pwd_occupation'])) {
		$pwd_occupation = $_POST['pwd_occupation'];
		if ($pwd_occupation == "Others") {
			$pwd_occupation = $_POST['pwd_occupationOther'];
		}
		
	}
	else{
		$pwd_occupation = '';
	}

	if (isset($_POST['pwd_organization'])) {
		$pwd_organization = $_POST['pwd_organization'];
	}
	else{
		$pwd_organization = '';
	}

	if (isset($_POST['pwd_organizationPerson'])) {
		$pwd_organizationPerson = $_POST['pwd_organizationPerson'];
	}
	else{
		$pwd_organizationPerson = '';
	}
	
	if (isset($_POST['pwd_organizationAddress'])) {
		$pwd_organizationAddress = $_POST['pwd_organizationAddress'];
	}
	else{
		$pwd_organizationAddress = '';
	}
	
	if (isset($_POST['pwd_organizationTelephone'])) {
		$pwd_organizationTelephone = $_POST['pwd_organizationTelephone'];
	}
	else{
		$pwd_organizationTelephone = '';
	}

	if (isset($_POST['pwd_sss'])) {
		$pwd_sss = $_POST['pwd_sss'];
	}
	else{
		$pwd_sss = '';
	}

	if (isset($_POST['pwd_gsis'])) {
		$pwd_gsis = $_POST['pwd_gsis'];
	}
	else{
		$pwd_gsis = '';
	}

	if (isset($_POST['pwd_pagibig'])) {
		$pwd_pagibig = $_POST['pwd_pagibig'];
	}
	else{
		$pwd_pagibig = '';
	}

	if (isset($_POST['pwd_philhealth'])) {
		$pwd_philhealth = $_POST['pwd_philhealth'];
	}
	else{
		$pwd_philhealth = '';
	}

	if (isset($_POST['pwd_fatherLastname'])) {
		$pwd_fatherLastname = $_POST['pwd_fatherLastname'];
	}
	else{
		$pwd_fatherLastname = '';
	}
	
	if (isset($_POST['pwd_fatherFirstname'])) {
		$pwd_fatherFirstname = $_POST['pwd_fatherFirstname'];
	}
	else{
		$pwd_fatherMiddlename = '';
	}

	if (isset($_POST['pwd_fatherMiddlename'])) {
		$pwd_fatherMiddlename = $_POST['pwd_fatherMiddlename'];
	}
	else{
		$pwd_fatherMiddlename = '';
	}

	if (isset($_POST['pwd_motherLastname'])) {
		$pwd_motherLastname = $_POST['pwd_motherLastname'];
	}
	else{
		$pwd_motherLastname = '';
	}

	if (isset($_POST['pwd_motherFirstname'])) {
		$pwd_motherFirstname = $_POST['pwd_motherFirstname'];
	}
	else{
		$pwd_motherFirstname = '';
	}
	if (isset($_POST['pwd_motherMiddlename'])) {
		$pwd_motherMiddlename = $_POST['pwd_motherMiddlename'];
	}
	else{
		$pwd_motherMiddlename = '';
	}

	if (isset($_POST['pwd_guardianLastname'])) {
		$pwd_guardianLastname = $_POST['pwd_guardianLastname'];
	}
	else{
		$pwd_guardianLastname = '';
	}

	if (isset($_POST['pwd_guardianFirstname'])) {
		$pwd_guardianFirstname = $_POST['pwd_guardianFirstname'];
	}
	else{
		$pwd_guardianFirstname = '';
	}

	if (isset($_POST['pwd_guardianMiddlename'])) {
		$pwd_guardianMiddlename = $_POST['pwd_guardianMiddlename'];
	}
	else{
		$pwd_guardianMiddlename = '';
	}
	
	if (isset($_POST['accomplish_lastname'])) {
		$accomplish_lastname = $_POST['accomplish_lastname'];
	}
	else{
		$accomplish_lastname = '';
	}

	
	if (isset($_POST['accomplish_firstname'])) {
		$accomplish_firstname = $_POST['accomplish_firstname'];
	}
	else{
		$accomplish_firstname = '';
	}
	
	
	if (isset($_POST['accomplish_middlename'])) {
		$accomplish_middlename = $_POST['accomplish_middlename'];
	}
	else{
		$accomplish_middlename = '';
	}
	
	if (isset($_POST['reportingUnit_name'])) {
		$reportingUnit_name = $_POST['reportingUnit_name'];
	}
	else{
		$reportingUnit_name = '';
	}
	if (isset($_POST['registration_number'])) {
		$registration_number = $_POST['registration_number'];
	}
	else{
		$registration_number = '';
	}
	

	if (isset($_POST['living'])) {
		$living = $_POST['living'];
	}
	else{
		$living = '';

	}
	
	if (isset($_POST['pwd_spouseName'])) {
		$pwd_spouseName = $_POST['pwd_spouseName'];
	}
	else{
		$pwd_spouseName = '';
	}

	if (isset($_POST['pwd_spouseAge'])) {
		$pwd_spouseAge = $_POST['pwd_spouseAge'];
	}
	else{
		$pwd_spouseAge = '';
	}

	// if (isset($_POST['economic_condition'])) {
	// 	$economic_condition = implode(',', $_POST['economic_condition']);
	// }
	// else{
	// 	$economic_condition = '';
	// }

	if (isset($_POST['pwd_support'])) {
		$pwd_support = $_POST['pwd_support'];
	}
	else{
		$pwd_support = '';
	}
	if (isset($_POST['pwd_pensioner'])) {
		$pwd_pensioner = $_POST['pwd_pensioner'];
	}
	else{
		$pwd_pensioner = '';
	}

	if (isset($_POST['pwd_pensionerType'])) {
		$pwd_pensionerType = $_POST['pwd_pensionerType'];
	}
	else{
		$pwd_pensionerType = '';
	}

	if (isset($_POST['pwd_pensionMonthly'])) {
		$pwd_pensionMonthly = $_POST['pwd_pensionMonthly'];
	}
	else{
		$pwd_pensionMonthly = '';
	}

	if (isset($_POST['pwd_incomeSource'])) {
		$pwd_incomeSource = $_POST['pwd_incomeSource'];
	}
	else{
		$pwd_incomeSource = '';
	}

	if (isset($_POST['pwd_incomeMonthly'])) {
		$pwd_incomeMonthly = $_POST['pwd_incomeMonthly'];
	}
	else{
		$pwd_incomeMonthly = '';
	}
	$pwd_interviewer = $_POST['pwd_interviewer'];
	
	if (isset($_POST['pwd_guardian_contact'])) {
		$pwd_guardian_contact = $_POST['pwd_guardian_contact'];
	}
	else{
		$pwd_guardian_contact = '';
	}

	
	if (isset($_POST['pwd_remarks'])) {
		$pwd_remarks = $_POST['pwd_remarks'];
	}
	else{
		$pwd_remarks = '';
	}

	if (isset($_POST['pwd_accessibility'])) {
		$pwd_accessibility = $_POST['pwd_accessibility'];
	}
	else{
		$pwd_accessibility = '';
	}

	if (isset($_POST['pwd_services'])) {
		$pwd_services = $_POST['pwd_services'];
	}
	else{
		$pwd_services = '';
	}
	if(isset($_POST['pwd_disability_cause_others'])){
		$pwd_disability_cause_others = $_POST['pwd_disability_cause_others'];
	}
	else{
		$pwd_disability_cause_others = '';
	}

	$old_pwd_number = $_SESSION['pwd_number2'];
	$pwd_number = $_POST['pwd_number'];
	$id = $_SESSION['pwd_id2'];

	$pwd_query = mysqli_query($con, "SELECT * FROM pwd_table where pwd_number!='$old_pwd_number' and pwd_number='$pwd_number'");
	if (mysqli_num_rows($pwd_query)) {
		
		$_SESSION['status_title'] = "Error";
	    $_SESSION['status'] = "PWD Number Already Exist! Try Another";
	    $_SESSION['status_code'] = "error";
	}
	else{
		$update = mysqli_query($con, "UPDATE pwd_table set pwd_number='$pwd_number',pwd_lastname='$pwd_lastname',pwd_firstname='$pwd_firstname',pwd_middlename='$pwd_middlename', pwd_suffix='$pwd_suffix', date_applied='$date_applied', pwd_birthday='$pwd_birthday', pwd_age='$pwd_age', pwd_birthplace = '$pwd_birthplace', pwd_sex='$sex', pwd_religion='$pwd_religion', pwd_ethnic_group='$pwd_ethnic', pwd_civil_status='$pwd_civilStatus', pwd_blood_type='$pwd_bloodType', pwd_disability_type='$disability_type', pwd_disability_cause='$disability_cause', pwd_house_street='$pwd_street', pwd_barangay='$pwd_barangay', pwd_landline='$pwd_landline', pwd_mobile='$pwd_mobile',pwd_email='$pwd_email',	pwd_guardian_contact='$pwd_guardian_contact',pwd_education='$pwd_education', pwd_employment_status='$pwd_employmentStatus', pwd_occupation='$pwd_occupation', pwd_employment_category='$pwd_employmentCategory', pwd_employment_type='$pwd_employmentType', pwd_organization='$pwd_organization', pwd_organization_contact='$pwd_organizationPerson', pwd_organization_address='$pwd_organizationAddress', pwd_organization_telephone='$pwd_organizationTelephone', pwd_sss='$pwd_sss',pwd_gsis='$pwd_gsis', pwd_pagibig='$pwd_pagibig', pwd_philhealth='$pwd_philhealth', pwd_father_lastname='$pwd_fatherLastname', pwd_father_firstname='$pwd_fatherFirstname', pwd_father_middlename='$pwd_fatherMiddlename',pwd_mother_lastname='$pwd_motherLastname', pwd_mother_firstname='$pwd_motherFirstname', pwd_mother_middlename='$pwd_motherMiddlename',pwd_guardian_lastname='$pwd_guardianLastname', pwd_guardian_firstname='$pwd_guardianFirstname', pwd_guardian_middlename='$pwd_guardianMiddlename', accomplished_lastname='$accomplish_lastname', accomplished_firstname='$accomplish_firstname', accomplished_middlename='$accomplish_middlename', reporting_unit='$reportingUnit_name', registration_number='$registration_number', pwd_living='$living', pwd_spouse_name='$pwd_spouseName', pwd_spouse_age='$pwd_spouseAge', pwd_support='$pwd_support',pwd_pensioner='$pwd_pensioner',pwd_pensioner_type='$pwd_pensionerType',pwd_pension_monthly='$pwd_pensionMonthly', pwd_income_source='$pwd_incomeSource', pwd_income_monthly='$pwd_incomeMonthly', pwd_remarks='$pwd_remarks', pwd_accessibility='$pwd_accessibility', pwd_services='$pwd_services', pwd_disability_cause_others='$pwd_disability_cause_others' where pwd_id='$id'");
			if (mysqli_affected_rows($con) > 0) {
				$_SESSION['status_title'] = "Success";
			    $_SESSION['status'] = "PWD Updated Successfully";
			    $_SESSION['status_code'] = "success";
			    
			}
			else{
				$_SESSION['status_title'] = "Info";
			    $_SESSION['status'] = "No Changes Made!";
			    $_SESSION['status_code'] = "info";
			    
			}
			header("location: recently.php");
			exit();
	}
}



if (isset($_POST['generate-birthday'])) {
	$month = $_POST['month'];
	$_SESSION['birthmonth'] = $month;
	header("location: birthday-report.php");
	exit();
}

if (isset($_POST['cust-report'])) {
	$number_filter = $_POST['filter_pwd_number'];

	$_SESSION['custom_column_session'] = $_POST['custom_column'];
	

	// $_SESSION['status_title'] = "Success";
	// $_SESSION['status'] = "Generated Customize Report";
	// $_SESSION['status_code'] = "success";

	header("location: custom-report.php");
	exit();
}
if (isset($_POST['generate-doh'])) {
	header("location: report-doh.php");
	exit();
}

if (isset($_POST['generate-dole'])) {
	header("location: dole-report.php");
	exit();
}

if (isset($_POST['generate-raw'])) {
	header("location: raw-report.php");
	exit();
}


?>