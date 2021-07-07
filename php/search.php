<?php 
	session_start();
	include_once "config.php";
	$outgoing_id = $_SESSION['unique_id'];
	$searchTerm = mysql_real_escape_string($conn, $_POST['searchTerm']);
	$output = ""
	$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{searchTerm}%' OR iname LIKE '%{searchTerm}%')");
	if(mysql_num_rows($sql) > 0){
		include "data.php";
	}else{
		$output .= "Nenhum usuário achado com esse nome..."
	}
	echo $output;
?>