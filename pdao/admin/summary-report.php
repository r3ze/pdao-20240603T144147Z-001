<?php
include "../config.php";
  session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Summary Report</title>
	<!-- Favicon-->
  	<link rel="icon" href="../dist/img/pdao_logo.png" type="image/ico">
  	<!-- Bootstrap -->
  	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">
  	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" type="text/css" href="../css/Source-Sans-Pro.css">
	

	


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
<?php 
	$barangay_query = mysqli_query($con, "SELECT DISTINCT(pwd_barangay) as barangay FROM pwd_table ORDER BY pwd_barangay ASC");
	while ($col = mysqli_fetch_assoc($barangay_query)) {
		$barangay = $col['barangay'];
		if ($barangay == "Anibong") {
			$code = "001";
		}
		elseif($barangay == "Biñan"){
			$code = "002";
		}
		elseif($barangay == "Buboy"){
			$code = "003";
		}
		elseif($barangay == "Cabanbanan"){
			$code = "004";
		}
		elseif($barangay == "Calusiche"){
			$code = "005";
		}
		elseif($barangay == "Dingin"){
			$code = "006";
		}
		elseif($barangay == "Lambac"){
			$code = "007";
		}
		elseif($barangay == "Layugan"){
			$code = "008";
		}
		elseif($barangay == "Magdapio"){
			$code = "009";
		}
		elseif($barangay == "Maulawin"){
			$code = "010";
		}
		elseif($barangay == "Pinagsanjan"){
			$code = "011";
		}
		elseif($barangay == "Barangay I"){
			$code = "012";
		}
		elseif($barangay == "Barangay II"){
			$code = "013";
		}
		elseif($barangay == "Sabang"){
			$code = "014";
		}
		elseif($barangay == "Sampaloc"){
			$code = "015";
		}
		elseif($barangay == "San Isidro"){
			$code = "016";
		}



		



		?>

			<div class="container-fluid ">
				<div class="row">
					<div class="col-12 text-center">
						PDAO-PAGSANJAN<br>
						PWD Registry
					</div>
					
				</div>
				<div class="row pb-5">
					<div class="col-12">
						Barangay: <u><?php echo $barangay; ?></u> &nbsp;&nbsp;&nbsp;&nbsp; Code: <u><?php echo $code;?></u>
						<br><br><br>
					</div>
					
					
				</div>
				<div class="row">
					<div class="table-responsive">
					<table class="differentTable table">
						<tr>
							<th>Date Applied</th>
							<th>Name</th>
							<th>Sex</th>
							<th>Age</th>
							<th>Birthday</th>
							<th>Disability</th>
							<th>ID Number</th>
							<th>Guardian</th>
							<th>Contact Number</th>
							<th>Entered By</th>
						</tr>
						<tbody>
						<?php
							
							$result = mysqli_query($con, "SELECT * FROM pwd_table where pwd_barangay='$barangay' and pwd_number!='' ORDER BY pwd_number");
							while ($col = mysqli_fetch_assoc($result)) {
								$bday = date('m-d-Y', strtotime($col['pwd_birthday']));
							
						?>
							<tr>
								<td><?php echo $col['date_applied'];?></td>

								<td>
									<?php 
										$suffix = $col['pwd_suffix'];
										if ($suffix != '') {
											echo $col['pwd_lastname']." ".$col['pwd_suffix'].", ". $col['pwd_firstname']. " ".$col['pwd_middlename'];
										}
										else{
											echo $col['pwd_lastname'].", ". $col['pwd_firstname']. " ".$col['pwd_middlename'];
										}
									?>
								</td>
								<td><?php echo $col['pwd_sex'];?></td>
								<td><?php echo $col['pwd_age'];?></td>
								<td><?php echo $bday;?></td>
								<?php 
									$chop_disability = explode(",",$col['pwd_disability_type']);
									$formal_disability = implode(", ",$chop_disability);
								?>
								
								<td><?php echo $formal_disability;?></td>
								<td><?php echo $col['pwd_number'];?></td>
								<?php 
								$pwd_father_lastname = $col['pwd_father_lastname'];
								$pwd_father_firstname = $col['pwd_father_firstname'];
								$pwd_father_middlename = $col['pwd_father_middlename'];
								$father_fullname = $pwd_father_firstname." ".$pwd_father_middlename." ".$pwd_father_lastname;

								$pwd_mother_lastname = $col['pwd_mother_lastname'];
								$pwd_mother_firstname = $col['pwd_mother_firstname'];
								$pwd_mother_middlename = $col['pwd_mother_middlename'];
								$mother_fullname = $pwd_mother_firstname." ".$pwd_mother_middlename." ".$pwd_mother_lastname;

								$pwd_guardian_lastname = $col['pwd_guardian_lastname'];
								$pwd_guardian_firstname = $col['pwd_guardian_firstname'];
								$pwd_guardian_middlename = $col['pwd_guardian_middlename'];
								$guardian_fullname = $pwd_guardian_firstname." ".$pwd_guardian_middlename." ".$pwd_guardian_lastname;

								

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
								?>
								<td><?php echo $pwd_parent;?></td>
								<td><?php echo $col['pwd_mobile'];?></td>
								<td><?php echo $col['interviewed_by'];?></td>
							</tr>
						<?php }?>
						</tbody>
					</table>
					</div>
				</div>
				
			</div>
		<p style="page-break-after: always;">&nbsp;</p>
		<div class="container-fluid ">
			<div class="row">
				<div class="col-12 text-center">
					PDAO-PAGSANJAN<br>
					PWD Registry
				</div>
				
			</div>
			<div class="row pb-5">
				<div class="col-12">
					Barangay: <u><?php echo $barangay; ?></u> &nbsp;&nbsp;&nbsp;&nbsp; Code: <u><?php echo $code;?></u>
					<br><br><br>
				</div>
				
				
			</div>
			<div class="row">
				<div class="table-responsive">
				<table class="differentTable table">
					<tr>
						<th>Date Applied</th>
						<th>Name</th>
						<th>Sex</th>
						<th>Age</th>
						<th>Birthday</th>
						<th>Disability</th>
						<th>ID Number</th>
						<th>Guardian</th>
						<th>Contact Number</th>
						<th>Entered By</th>
					</tr>
					<tbody>
					<?php
						
						$result2 = mysqli_query($con, "SELECT * FROM pwd_table where pwd_barangay='$barangay' and pwd_number!='' ORDER BY pwd_lastname");
						while ($col = mysqli_fetch_assoc($result2)) {
							$bday = date('m-d-Y', strtotime($col['pwd_birthday']));
						
					?>
						<tr>
							<td><?php echo $col['date_applied'];?></td>

							<td>
								<?php 
									$suffix = $col['pwd_suffix'];
									if ($suffix != '') {
										echo $col['pwd_lastname']." ".$col['pwd_suffix'].", ". $col['pwd_firstname']. " ".$col['pwd_middlename'];
									}
									else{
										echo $col['pwd_lastname'].", ". $col['pwd_firstname']. " ".$col['pwd_middlename'];
									}
								?>
							</td>
							<td><?php echo $col['pwd_sex'];?></td>
							<td><?php echo $col['pwd_age'];?></td>
							<td><?php echo $bday;?></td>
							<?php 
								$chop_disability = explode(",",$col['pwd_disability_type']);
								$formal_disability = implode(", ",$chop_disability);
							?>
							
							<td><?php echo $formal_disability;?></td>
							<td><?php echo $col['pwd_number'];?></td>
							<?php 
							$pwd_father_lastname = $col['pwd_father_lastname'];
							$pwd_father_firstname = $col['pwd_father_firstname'];
							$pwd_father_middlename = $col['pwd_father_middlename'];
							$father_fullname = $pwd_father_firstname." ".$pwd_father_middlename." ".$pwd_father_lastname;

							$pwd_mother_lastname = $col['pwd_mother_lastname'];
							$pwd_mother_firstname = $col['pwd_mother_firstname'];
							$pwd_mother_middlename = $col['pwd_mother_middlename'];
							$mother_fullname = $pwd_mother_firstname." ".$pwd_mother_middlename." ".$pwd_mother_lastname;

							$pwd_guardian_lastname = $col['pwd_guardian_lastname'];
							$pwd_guardian_firstname = $col['pwd_guardian_firstname'];
							$pwd_guardian_middlename = $col['pwd_guardian_middlename'];
							$guardian_fullname = $pwd_guardian_firstname." ".$pwd_guardian_middlename." ".$pwd_guardian_lastname;

							

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
							?>
							<td><?php echo $pwd_parent;?></td>
							<td><?php echo $col['pwd_mobile'];?></td>
							<td><?php echo $col['interviewed_by'];?></td>
						</tr>
					<?php }?>
					</tbody>
				</table>
				</div>
			</div>
			
		</div>
		<p style="page-break-after: always;">&nbsp;</p>
		<?php
	}
?>


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