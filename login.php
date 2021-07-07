<?php 

session_start();
if(isset($_SESSION['unique_id'])){
	header("location: users.php");
}

?>

<?php include_once "head.php"; ?>
<body>
	<div class="wrapper">
		<section class="form login">
			<header>
				Chat em tempo real
			</header>
			<form action="#">
				<div class="error-txt"></div>
				<div class="nome-details">
					<div class="field input">
						<label>Endereço de email</label>
						<input type="text" name="email" placeholder="Endereço de email">
					</div>
					<div class="field input">
						<label>Senha</label>
						<input type="password" name="senha" placeholder="Sua senha">
						<i class="fas fa-eye"></i>
					</div>
					<div class="field button">
						<input type="submit" value="Ir para o Chat">
					</div>
				</div>
			</form>
			<div class="link">Ainda não é cadastrado?<a href="index.php">Cadastre-se aqui.</a></div>
		</section>
	</div>
	<script type="text/javascript" src="javascript/pass-show-hide.js"></script>
	<script type="text/javascript" src="javascript/login.js">
</body>
</html>