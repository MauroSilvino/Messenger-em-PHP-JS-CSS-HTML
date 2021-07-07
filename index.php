<?php 

session_start();
if(isset($_SESSION['unique_id'])){
	header("location: users.php");
}

?>

<?php include_once "head.php"; ?>
<body>
	<div class="wrapper">
		<section class="form signup">
			<header>
				Chat em tempo real
			</header>
			<form action="#" enctype="multipart/form-data">
				<div class="error-txt"></div>
				<div class="nome-details">
					<div class="field input">
						<label>Primeiro nome</label>
						<input type="text" name="nome" placeholder="Primeiro nome" required>
					</div>
					<div class="field input">
						<label>Último nome</label>
						<input type="text" name="ultimo_nome" placeholder="Último nome" required>
					</div>
					<div class="field input">
						<label>Endereço de email</label>
						<input type="text" name="email" placeholder="Endereço de email" required>
					</div>
					<div class="field input">
						<label>Senha</label>
						<input type="password" name="senha" placeholder="Nova senha" required>
						<i class="fas fa-eye"></i>
					</div>
					<div class="field imagem">
						<label>Escolha sua Imagem</label>
						<input type="file" name="foto" required>
					</div>
					<div class="field button">
						<input type="submit" value="Ir para o Chat">
					</div>
				</div>
			</form>
			<div class="link">Já é cadastrado?<a href="login.php">Faça Login.</a></div>
		</section>
	</div>
	<script type="text/javascript" src="javascript/pass-show-hide.js"></script>
	<script type="text/javascript" src="javascript/signup.js"></script>
</body>
</html>