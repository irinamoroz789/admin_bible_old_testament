<?php
	$conn = new mysqli('localhost', 'root', '', 'bible_old_testament');
	$conn->query("SET NAMES 'utf8'");
	if($conn->connect_error){
		echo 'Error Number: '.$conn->connect_errno.'<br>';
		echo 'Error: '.$conn->connect_error;
	}

