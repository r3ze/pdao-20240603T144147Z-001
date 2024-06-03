<?php
require_once "controller.php";
if (isset($_GET['generate'])) {
	$pwd_id = $_GET['generate'];
	$pwd_query = mysqli_query($con, "SELECT * FROM pwd_table where pwd_id='$pwd_id'");
	$fetch = mysqli_fetch_assoc($pwd_query);

	$pwd_number = $fetch['pwd_number'];
	$pwd_firstname = $fetch['pwd_firstname'];
	$pwd_middlename = $fetch['pwd_middlename'];

	if (strlen($pwd_middlename) > 2) {
		$pwd_middlename = substr($pwd_middlename, 0,1). ".";
	}

	

	$pwd_lastname = $fetch['pwd_lastname'];
	$pwd_fullname = $pwd_firstname." ".$pwd_middlename." ". $pwd_lastname;

	$pwd_disability = $fetch['pwd_disability_type'];
	$chop_disability =  explode(",",$pwd_disability);
	$formal_disability = implode(", ", $chop_disability);
	
	$pwd_st = $fetch['pwd_house_street'];
	$pwd_barangay = $fetch['pwd_barangay'];
	$pwd_address = $pwd_st." ".$pwd_barangay." pagsanjan, laguna";

	$pwd_birthday = date('F j, Y',strtotime($fetch['pwd_birthday']));

	$pwd_sex = $fetch['pwd_sex'];
	
	
	$date_issued = date('F j, Y',strtotime($fetch['date_applied']));

	

	$pwd_blood = $fetch['pwd_blood_type'];

	$pwd_father_lastname = $fetch['pwd_father_lastname'];
	$pwd_father_firstname = $fetch['pwd_father_firstname'];
	$pwd_father_middlename = $fetch['pwd_father_middlename'];
	if (strlen($pwd_father_middlename) > 2) {
		$pwd_father_middlename = substr($pwd_father_middlename, 0,1). ".";
	}
	$father_fullname = $pwd_father_firstname." ".$pwd_father_middlename." ".$pwd_father_lastname;

	$pwd_mother_lastname = $fetch['pwd_mother_lastname'];
	$pwd_mother_firstname = $fetch['pwd_mother_firstname'];
	$pwd_mother_middlename = $fetch['pwd_mother_middlename'];
	if (strlen($pwd_mother_middlename) > 2) {
		$pwd_mother_middlename = substr($pwd_mother_middlename, 0,1). ".";
	}

	$mother_fullname = $pwd_mother_firstname." ".$pwd_mother_middlename." ".$pwd_mother_lastname;

	$pwd_guardian_lastname = $fetch['pwd_guardian_lastname'];
	$pwd_guardian_firstname = $fetch['pwd_guardian_firstname'];
	$pwd_guardian_middlename = $fetch['pwd_guardian_middlename'];
	if (strlen($pwd_guardian_middlename) > 2) {
		$pwd_guardian_middlename = substr($pwd_guardian_middlename, 0,1). ".";
	}

	$guardian_fullname = $pwd_guardian_firstname." ".$pwd_guardian_middlename." ".$pwd_guardian_lastname;

	$pwd_spouse = $fetch['pwd_spouse_name'];

	if ($pwd_spouse == "") {
		if ($pwd_guardian_lastname == "") {
		if ($pwd_mother_lastname == "") {
			if ($pwd_father_lastname =="") {
				$pwd_parent = "";
			}
			else{
				$pwd_parent = $father_fullname;
			}
		}
		else{
			$pwd_parent = $mother_fullname;
		}
	}
	else{
		$pwd_parent = $guardian_fullname;
	}
	}
	else{
		$pwd_parent = $pwd_spouse;
	}

	

	$pwd_parent_contact = $fetch['pwd_guardian_contact'];
	$mayor = "Hon. Cesar V. Areza";
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- jQuery -->
	<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="js/webcamjs/webcam.min.js"></script>
	<style type="text/css">

		@media print{
			@page {size: portrait;}

			.no-print{
				display: none !important;
			}
		}
		*{
			-webkit-print-color-adjust: exact !important;   /* Chrome, Safari, Edge */
    		color-adjust: exact !important; 
    		font-family: Arial Narrow;  
    		font-weight: bold;
    		text-transform: uppercase;
    		text-align: center;
		font-size: 15px;
		outline: 2
		
		}
		.card-front, .card-back{
			border: 1px solid black;
			height: 208px;
			width: 321px;
			float: left;

			

		}
		.card-front{
			background-image: url('dist/img/front-id.png');
			background-size: cover;
			background-repeat: no-repeat;
		}
		.card-back{
			background-image: url('dist/img/back-id.png');
			background-size: cover;
			background-repeat: no-repeat;
			margin-left: 5px;
		}
		body{
			background-color: #008080;
		}
		.pwd_name{
			
			white-space: nowrap;
			position: absolute;
			width: 200px;
			margin-right: 10px;
			margin-left: 111px;
			margin-top: 91px;
			
			
			
		}
		.pwd_type{
			white-space: nowrap;
			position: absolute;
			width: 200px;
			margin-right: 10px;
			margin-left: 109px;
			margin-top: 125px;
			font-size: 13px !important;
			
			
			
		}
		.pwd_no{
			white-space: nowrap;
			position: absolute;
			width: 110px;
			margin-right: 10px;
			margin-top: 165px;
			font-size: 14px !important;
			font-family: Arial;
			-webkit-text-stroke: .3px white;
			
			
			
			
			
			

		
		}
		.pwd_address{
			white-space: nowrap;
			position: absolute;
			width: 260px;
			margin-right: 10px;
			margin-left: 53px;
			margin-top: 7px;
			font-size: 10px !important;
			
			
		}
		.pwd_birthday{
			white-space: nowrap;
			position: absolute;
			width: 115px;
			margin-right: 10px;
			margin-left: 73px;
			margin-top: 24px;
			font-size: 10px !important;
			
			
		}
		.pwd_sex{
			white-space: nowrap;
			position: absolute;
			width: 85px;
			margin-right: 10px;
			margin-left: 216px;
			margin-top: 25px;
			font-size: 10px !important;
			
			
		}
		.pwd_issued{
			white-space: nowrap;
			position: absolute;
			width: 85px;
			margin-right: 10px;
			margin-left: 68px;
			margin-top: 41px;
			font-size: 10px !important;
			
			
		}

		.pwd_blood{
			white-space: nowrap;
			position: absolute;
			width: 85px;
			margin-right: 10px;
			margin-left: 216px;
			margin-top: 41px;
			font-size: 10px !important;
			
			
		}
		.pwd_parent{
			white-space: nowrap;
			position: absolute;
			width: 175px;
			margin-right: 10px;
			margin-left: 127px;
			margin-top: 78px;
			font-size: 10px !important;
			
			
		}
		.pwd_parent_contact{
			white-space: nowrap;
			position: absolute;
			width: 232px;
			margin-right: 10px;
			margin-left: 70px;
			margin-top: 92px;
			font-size: 10px !important;
			
			
		}
		.mayor{
			white-space: nowrap;
			position: absolute;
			width: 319px;
			margin-right: 10px;
			margin-top: 176px;
			font-size: 10px !important;
			
			
		}
		.webcam_div{
			float: right;
			margin-right: 200px;

		}
		#results img{
			
			width: 74.9px;
			height: 74.9px;
			border: 1px solid black;
		}
		#results{
			margin-top: 70.5px;
			margin-left: 18.5px;
			position: absolute;
			
		}
		
	</style>
</head>

<body>

<div class="card-front">
	<div class="pwd_name"><span id="pangalan"><?php echo $pwd_fullname;?></span></div>
	<div class="pwd_type"><?php echo $formal_disability;?></div>
	<div class="pwd_no"><?php echo $pwd_number;?></div>
	<div id="results"></div>
</div>
 
<div class="card-back">
	<div class="pwd_address"><?php echo $pwd_address;?></div>
	<div class="pwd_birthday"><?php echo $pwd_birthday;?></div>
	<div class="pwd_sex"><?php echo $pwd_sex;?></div>
	<div class="pwd_issued"><?php echo $date_issued;?></div>
	<div class="pwd_blood"><?php echo $pwd_blood;?></div>
	<div class="pwd_parent"><?php echo $pwd_parent;?></div>
	<div class="pwd_parent_contact"><?php echo $pwd_parent_contact;?></div>

	<div class="mayor"><?php echo $mayor;?></div>
</div>

<div class="webcam_div no-print">
	<div id="my_camera" alt="My Camera"></div>
	<br>
	<input type=button value="Take Snapshot" onClick="take_snapshot()">
	<input type="button" name="" value="Clear Snapshot" onclick="clear_snapshot()">
	<br><br>
	<input type="button" name="" value="Print ID" onclick="print_id()">
	<!-- <div id="results" ></div> -->

	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
	 // preload shutter audio clip
	 var shutter = new Audio();
	 shutter.autoplay = false;
	 shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';
	 

	 Webcam.set({
	     
	     width: 310,
	     height: 230,
		 crop_width: 246,
		 crop_height: 240,
	     image_format: 'jpeg',
	     jpeg_quality: 90
	 });
	 Webcam.attach( '#my_camera' );
	 
	 

	// Code to handle taking the snapshot and displaying it locally
	function take_snapshot() {
	   //Play Sound
	   shutter.play();

	   // take snapshot and get image data
	   Webcam.snap( function(data_uri) {
	       // display results in page
	       document.getElementById('results').innerHTML = 
	        '<img src="'+data_uri+'"/>';
	    } );

	}

	function clear_snapshot(){
		var myDiv = document.getElementById("results");
    	myDiv.innerHTML = "";
	}

	function print_id(){
		window.print();
		
		
	}
	
	
	</script>
</div>



<!-- <script type="text/javascript">
    $(document).ready(function(){
        window.print();
    })
    window.onafterprint = function() {
        history.go(-1);
    };
</script> -->

<script type="text/javascript">
$( document ).ready(function() {
	var texthaba = $('#pangalan').width();
    console.log(texthaba);
    if (texthaba > 200) {
    	$("#pangalan").css("fontSize", "13.5px");
    }
});
</script>
</body>

</html>