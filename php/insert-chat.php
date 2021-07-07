<?php
	session_start();
	if(isset($_SESSIOŃ['unique_id'])){
		include_once "config.php";
		$outgoing_id = mysqli_real_escape_string($conn, $POST['outgoing_id']);
		$incoming_id = mysqli_real_escape_string($conn, $POST['incoming_id']);
		$message = mysqli_real_escape_string($conn, $POST['message']);
		date_default_timezone_set('America/Sao_Paulo');
		$dataagora = date("Y-m-d H:i:s");

		if(!empty($message)){
			$sql = mysqli_query($conn, "INSERT INTO messages (incomming_msg_id, outgoing_msg_id, msg, reg_date) VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$dataagora}')") or die();
		}


	}else{
		header{"../login.php"};
	}

?>
