<?php

	try {
		$host = "localhost";
		$dbname = "cleanblog";
		$username = "root";
		$password = 123456;

		$conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}


?>