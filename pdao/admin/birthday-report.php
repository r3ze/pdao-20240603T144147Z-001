<?php
  require_once "../controller.php";
  $month = $_SESSION['birthmonth'];

  if ($month == "January") {
  	$start = "01";
  }
  elseif ($month == "February") {
  	$start = "02";
  }
  elseif ($month == "March") {
  	$start = "03";
  }
  elseif ($month == "April") {
  	$start = "04";
  }
  elseif ($month == "May") {
  	$start = "05";
  }
  elseif ($month == "June") {
  	$start = "06";
  }
  elseif ($month == "July") {
  	$start = "07";
  }
  elseif ($month == "August") {
  	$start = "08";
  }
  elseif ($month == "September") {
  	$start = "09";
  }
  elseif ($month == "October") {
  	$start = "10";
  }
  elseif ($month == "November") {
  	$start = "11";
  }
  elseif ($month == "December") {
  	$start = "12";
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Generate Birthday</title>
	<!-- Favicon-->
  	<link rel="icon" href="../dist/img/pdao_logo.png" type="image/ico">
  	<!-- Bootstrap -->
  	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">
  	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	

	


  	<style type="text/css">
  		.guhit{
  			border: 1px solid black;
  		}
  		@page{
  			-webkit-transform: rotate(-90deg); -moz-transform:rotate(-90deg);
			filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
  		}
		*{
			
			-webkit-print-color-adjust: exact !important;   /* Chrome, Safari, Edge */
    		color-adjust: exact !important; 
    		font-size: 10px;
		}
		.differentTable, .differentTable td, .differentTable th, .differentTable tbody{
		   border: 1px solid black !important;
		}
		td {
		   line-height: 5px !important;
		   min-height: 5px !important;
		   height: 5px !important;
		}
		
  	</style>

  	
</head>
<body>
	
<div class="container-fluid ">
	<div class="row">
		<div class="col-12 text-center">
			PDAO-PAGSANJAN<br>
			PWD Birthday
		</div>
		
	</div>
	<div class="row pb-5">
		<div class="col-12">
			Month: <u><?php echo $month; ?></u>
			<br><br><br>
		</div>
		
		
	</div>
	<div class="row">
		<div class="table-responsive">
		<table class="differentTable table">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Birthday</th>
				<th>Address</th>
				<th>Contact Number</th>
			</tr>
			<tbody>
			<?php
				
				$result = mysqli_query($con, "SELECT * FROM pwd_table where pwd_birthday LIKE '%-$start-%' ORDER BY pwd_lastname ");
				$count = 1;
				while ($col = mysqli_fetch_assoc($result)) {
					$bday = date('m-d-Y', strtotime($col['pwd_birthday']));
					$fullname = $col['pwd_lastname']." ". $col['pwd_suffix'].", ". $col['pwd_firstname']." ". $col['pwd_middlename'];
					$address = $col['pwd_house_street']." ".$col['pwd_barangay'];
					$contact = $col['pwd_mobile'];
					if ($contact == "") {
						$contact = $col['pwd_guardian_contact'];
					}
				
			?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $fullname;?></td>
					<td><?php echo $bday;?></td>
					<td><?php echo $address;?></td>
					<td><?php echo $contact;?></td>
				
				</tr>
			<?php $count++; }?>
			</tbody>
		</table>
		</div>
	</div>
</div>


<!-- Bootstrap 4 -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- Popper  -->
<script src="../plugins/popper/popper.min.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="../js/jquery-3.5.1.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        window.print();
    })
    window.onafterprint = function() {
        history.go(-1);
    };
</script>
</body>
</html>