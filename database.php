<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'Raj', 'assignment1', 'comments section');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>