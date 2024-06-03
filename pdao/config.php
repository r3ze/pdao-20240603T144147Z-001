<?php 

$con = mysqli_connect('localhost', 'root', '', 'pdao_db');

if (!$con) {
	echo "<script>alert('Database connection failed!')</script>";
}


?>