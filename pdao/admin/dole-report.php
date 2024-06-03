<?php
  require_once "../controller.php";
  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dole Form</title>
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
			DOLE FORM
		</div>
		
	</div>
	<!-- <div class="row pb-5">
		<div class="col-12">
			Month: <u><?php //echo $month; ?></u>
			<br><br><br>
		</div>
		
		
	</div> -->



	<input type="button" onclick="tableToExcel('tblData', 'W3C Example Table')" value="Export to Excel">
	
	<br>
	<br><br>

	<div class="row">
		<div class="table">
		<table class="differentTable table" id ='tblData'>
			<tr>
				<th>No.</th>
				<th>Firstname</th>
				<th>Middle Name</th>
				<th>Lastname</th>
				<th>Suffix</th>
				<th>Birthdate &nbsp &nbsp</th>
				<th>Barangay</th>
				<th>Type of ID</th>
				<th>I.D Number</th>

				<th>Contact Number</th>
				<th>Sex</th>
				<th>Civil Status</th>
				<th>Age</th>
				<th>Occupation</th>
				<th>Monthly Salary</th>
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Last Name</th>
				<th>Relationship to Benefeciary</th>
				
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
					<td><?php echo $col['pwd_firstname'];?></td>
					<td><?php echo $col['pwd_middlename'];?></td>
					<td><?php echo $col['pwd_lastname'];?></td>
					<td><?php echo $col['pwd_suffix'];?></td>
					<td><?php echo $bday;?></td>
					<td><?php echo $col['pwd_barangay'];?></td>
					<td><?php echo 'PWD ID';?></td>
					<td><?php echo $col['pwd_number'];?></td>

					<td><?php echo $col['pwd_mobile'];?></td>
					<td><?php echo $col['pwd_sex']?></td>
					<td><?php echo $col['pwd_civil_status']?></td>
					<td><?php echo $col['pwd_age'];?></td>
					<td><?php echo $col['pwd_occupation'];?></td>
					<td><?php echo $col['pwd_income_monthly'];?></td>
					<td><?php echo $col['pwd_spouse_name'];?></td>
					<td><?php echo '';?></td>
					<td><?php echo '';?></td>
					<td><?php echo '';?></td>					
					
				
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