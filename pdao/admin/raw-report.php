<?php
  require_once "../controller.php";
  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Raw Data</title>
	<!-- Favicon-->
  	<link rel="icon" href="../dist/img/pdao_logo.png" type="image/ico">
  	<!-- Bootstrap -->
  	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">
  	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<script src="../js/table2excel.js"></script>
	

	


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
			Raw Data
		</div>
		
	</div>
	<!-- <div class="row pb-5">
		<div class="col-12">
			Month: <u><?php //echo $month; ?></u>
			<br><br><br>
		</div>
		
		
	</div> -->



	<input type="button" onclick="tableToExcel('tblData', 'raw')" value="Export to Excel">
	
	<br>
	<br><br>

	<div class="row">
		<div class="table">
		<table class="differentTable table" id ='tblData'>
			<tr>
				<th>No.</th>
				<th>PWD I.D Number</th>
				<th>Firstname</th>
				<th>Middle Name</th>
				<th>Lastname</th>
				<th>Suffix</th>
				<th>Place of Birth &nbsp</th>
				<th>Birthdate &nbsp &nbsp</th>
				<th>Religion</th>
				<th>Ethnic Group</th>
				<th>Blood Type</th>
				<th>House/Street No.</th>
				<th>Type of Disability</th>
				<th>Cause of Disability</th>
				<th>Others, Specific:</th>
				<th>Barangay</th>
				

				<th>Contact Number</th>
				<th>Sex</th>
				<th>Civil Status</th>
				<th>Age</th>

				<th>Educational Attainment</th>
				<th>Status of Employment</th>
				<th>Category of Employment</th>
				<th>Types of Employment</th>
				
				<th>Occupation</th>

				<th>SSS</th>
				<th>GSIS</th>
				<th>Pag Ibig ID</th>
				<th>Phil Health</th>

				

				<th>Organization</th>
				<th>Organization Contact</th>
				<th>Organization Address</th>
				<th>Organization Telephone</th>


				<th>Father's First Name</th>
				<th>Father's Middle Name</th>
				<th>Father's Last Name</th>

				<th>Mother's First Name</th>
				<th>Mother's First Name</th>
				<th>Mother's First Name</th>

				<th>Guardian's First Name</th>
				<th>Guardian's First Name</th>
				<th>Guardian's First Name</th>

				<th>Spouse Name</th>
				<th>Spouse Age</th>
				<th>Support</th>

				<th>Pensioner</th>
				<th>Type of Pensioner</th>
				<th>Monthly Pension</th>
				<th>Source of Income</th>
				<th>Estimated Monthly Income</th>
				
				<th>Economic Condition</th>

				<th>Remarks</th>

				<th>Accessibility Needs</th>
				<th>Services Needs</th>
				
				<th>Interviewed By</th>

			</tr>
			
			<?php
				
				$result = mysqli_query($con, "SELECT * FROM pwd_table where pwd_number!='' ORDER BY pwd_number ");
				$count = 1;
				while ($col = mysqli_fetch_assoc($result)) {
					$bday = date('Y-m-d', strtotime($col['pwd_birthday']));
					$fullname = $col['pwd_lastname']." ". $col['pwd_suffix'].", ". $col['pwd_firstname']." ". $col['pwd_middlename'];
					$address = $col['pwd_house_street']." ".$col['pwd_barangay'];
					$contact = $col['pwd_mobile'];
					if ($contact == "") {
						$contact = $col['pwd_guardian_contact'];
					}


				
			?>
				<tr>
					<td><?php echo $count;?></td>
					<td><?php echo $col['pwd_number'];?></td>
					<td><?php echo $col['pwd_firstname'];?></td>
					<td><?php echo $col['pwd_middlename'];?></td>
					<td><?php echo $col['pwd_lastname'];?></td>
					<td><?php echo $col['pwd_suffix'];?></td>
					<td><?php echo $col['pwd_birthplace'];?></td>
					<td><?php echo $bday;?></td>
					<td><?php echo $col['pwd_religion'];?></td>
					<td><?php echo $col['pwd_ethnic_group'];?></td>
					<td><?php echo $col['pwd_blood_type'];?></td>
					<td><?php echo $col['pwd_house_street'];?></td>
					<td><?php echo $col['pwd_disability_type'];?></td>
					<td><?php echo $col['pwd_disability_cause'];?></td>
					<td><?php echo $col['pwd_disability_cause_others'];?></td>

					<td><?php echo $col['pwd_barangay'];?></td>
					

					<td><?php echo $col['pwd_mobile'];?></td>
					<td><?php echo $col['pwd_sex']?></td>
					<td><?php echo $col['pwd_civil_status']?></td>
					<td><?php echo $col['pwd_age'];?></td>

					<td><?php echo $col['pwd_education'];?></td>
					<td><?php echo $col['pwd_employment_status'];?></td>
					<td><?php echo $col['pwd_employment_category'];?></td>
					<td><?php echo $col['pwd_employment_type'];?></td>

					<td><?php echo $col['pwd_occupation'];?></td>

					<td><?php echo $col['pwd_sss'];?></td>
					<td><?php echo $col['pwd_gsis'];?></td>
					<td><?php echo $col['pwd_pagibig'];?></td>
					<td><?php echo $col['pwd_philhealth'];?></td>
					

					<td><?php echo $col['pwd_organization'];?></td>
					<td><?php echo $col['pwd_organization_contact'];?></td>
					<td><?php echo $col['pwd_organization_address'];?></td>
					<td><?php echo $col['pwd_organization_telephone'];?></td>

					<td><?php echo $col['pwd_father_firstname'];?></td>
					<td><?php echo $col['pwd_father_middlename'];?></td>
					<td><?php echo $col['pwd_father_lastname'];?></td>

					<td><?php echo $col['pwd_mother_firstname'];?></td>
					<td><?php echo $col['pwd_mother_middlename'];?></td>
					<td><?php echo $col['pwd_mother_lastname'];?></td>

					<td><?php echo $col['pwd_guardian_firstname'];?></td>
					<td><?php echo $col['pwd_guardian_middlename'];?></td>
					<td><?php echo $col['pwd_guardian_lastname'];?></td>

					<td><?php echo $col['pwd_spouse_name'];?></td>
					<td><?php if ($col['pwd_spouse_age']==0){ echo "";} else { echo $col['pwd_spouse_age'];}?></td>
					<td><?php echo $col['pwd_support'];?></td>
					
					<td><?php echo $col['pwd_pensioner'];?></td>
					<td><?php echo $col['pwd_pensioner_type'];?></td>
					<td><?php echo $col['pwd_pension_monthly'];?></td>
					<td><?php echo $col['pwd_income_source'];?></td>
					<td><?php echo $col['pwd_income_monthly'];?></td>

					<td><?php echo $col['pwd_living'];?></td>

					<td><?php echo $col['pwd_remarks'];?></td>

					<td><?php echo $col['pwd_accessibility'];?></td>
					<td><?php echo $col['pwd_services'];?></td>

					<td><?php echo $col['interviewed_by'];?></td>
					
				
				</tr>
			<?php $count++; }?>
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

<!-- <script type="text/javascript">
    $(document).ready(function(){
        window.print();
    })
    window.onafterprint = function() {
        history.go(-1);
    };
</script> -->
<script type="text/javascript">
	function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
	</script>
</body>

</html>