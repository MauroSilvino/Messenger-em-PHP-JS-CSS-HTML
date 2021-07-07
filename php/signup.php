<?php 
	session_start();
	include_onde "config.php";
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$ultimo_nome = mysqli_real_escape_string($conn, $_POST['ultimo_nome']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);

	if(!empty($nome) && !empty($ultimo_nome) && !empty($email) && !empty($senha)){

		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");

			if(mysqli_num_rows($sql) > 0){
				echo "Esse email já existe";
			}else{

				if(isset($_FILES['foto'])){
					$img_name = $FILES['foto']['name'];
					$img_type = $FILES['foto']['type'];
					$tmp_name = $FILES['foto']['tmp_name'];

					$img_explode = explode('.', $img_name);
					$img_ext = end($img_explode);

					$extensions = ['png', 'jpeg', 'jpg'];

					if(in_array($img_ext, $extensions) === true){
						$time = time();
						$new_img_name = $time.$img_name;

						if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
							$status = "Ativo";
							$random_id = rand(time(), 10000000);
							$dataagora = date("Y-m-d H:i:s");

							$sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, iname, email, password, img, status, reg_time) VALUES ({$random_id}, '{$nome}', '{$ultimo_nome}', '{$email}', '{$senha}', '{$new_img_name}', '{$status}', '{$dataagora}'");

							if($sql2){
								$sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
								if(mysqli_num_rows($sql3) > 0){
									$row = mysqli_fetch_assoc($sql3);
									$_SESSION['unique_id'] = $row['unique_id'];
									echo "Sucesso";
								}
							}else{
								echo "Algo deu errado";
							}
						}

					}else{
						echo "Use uma imagem .jpeg, .jpg ou png!"
					}

				}else{
					echo "Escolha uma foto";
				}
			}
		}else{
			echo "Digite um email valido";
		}
		
	}else{
		echo "Todos os campos são obrigatórios";
	}


?>