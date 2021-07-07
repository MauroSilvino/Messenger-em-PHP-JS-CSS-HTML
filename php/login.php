<?php 
	session_start();
	include_onde "config.php";
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);

	if(!empty($email) && !empty($senha)){

		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$senha}'");

			if(mysqli_num_rows($sql) > 0){
				$row = mysqli_fetch_assoc($sql3);
				$status = "Ativo";
				$sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");

				if($sql2){
				$_SESSION['unique_id'] = $row['unique_id'];
				echo "Sucesso";

				}

			}else{
				echo "Email ou senha incorretos";
			}
		}
	}else{
		echo "Todos os campos são obrigatórios";
	}


?>