<?php
	date_default_timezone_set('Asia/Jakarta');
	session_start();

	$con = mysqli_connect('localhost', 'root','','ujk2018tahap1');
	if(mysqli_connect_errno()) {
		echo mysqli_connect_error();
	}


?>