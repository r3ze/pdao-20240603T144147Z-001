<?php
  include "../config.php";
  session_start();
  $column = $_SESSION['custom_column_session'];


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Custom Report</title>
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
			PWD Registry
		</div>
		
	</div>
	<div class="row pb-5">
		
		
		
	</div>
	<div class="row">
		<div class="table-responsive">
		<table class="differentTable table">
			<tr>
				<th>#</th>
				<?php 
				 foreach ($column as $new_column) {
				 ?>
				 	<th><?php echo $new_column;?></th>
				 <?php
				 }
				?>
				
			</tr>
			<tbody>
			<?php
				
				$result = mysqli_query($con, "SELECT * FROM pwd_table");
				$count = 1;
				while ($col = mysqli_fetch_assoc($result)) {
					$bday = date('m-d-Y', strtotime($col['pwd_birthday']));
				

			?>
				<tr>
					<td><?php echo $count; ?></td>
					<?php 
					 foreach ($column as $new_column2) {
					 ?>
					  <td><?php echo $col[$new_column2];?></td>

					 <?php
					 }
					?>
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