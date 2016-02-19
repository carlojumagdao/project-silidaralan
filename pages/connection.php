<?php

require 'config.php';

try {
	$conn = new PDO('mysql:host=localhost;dbname=dbSAI',$config['DB_Username'],$config['DB_Password']);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "ERROR:". $e.getMessage();
	echo "<script>alert('connection error')</script>";
}
