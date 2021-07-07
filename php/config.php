<?php
	$conn = mysqli_connect("localhost", "seuusuario", "suasenha", "seubanco");
	if(!$conn){
		echo "Erro" . mysqli_connect_error();
	}
?>