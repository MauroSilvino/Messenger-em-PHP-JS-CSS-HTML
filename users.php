<?php 
	session_start();
	if(!isset($_SESSION['unique_id'])){
		header("location: login.php");
	}
?>


<?php include_once "head.php"; ?>
<body>
	<div class="wrapper">
		<section class="users">
			<header>
			<?php 
				include_once "php/config.php";
				$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
				if(mysql_num_rows($sql) > 0){
					$row = mysqli_fetch_assoc($sql);
				}
			?>
				<div class="content">
					<img src="php/images/<?php echo $row['img']; ?>" alt="">
					<div class="details">
						<span><?php echo $row['fname'] . " " . $row['iname']; ?></span>
						<p><?php echo $row['status']; ?></p>
					</div>
				</div>
				<a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Sair</a>
			</header>
			<div class="search">
				<span class="text">Escolha um usuário para conversar</span>
				<input type="text" name="procura" placeholder="Digite um nome">
				<button><i class="fas fa-search"></i></button>
			</div>
			<div class="users-list">
				<a href="#">
					<div class="content">
						<img src="img.png" alt="">
						<div class="details">
							<span>Outro nome</span>
							<p>Essa é uma mensagem teste</p>
						</div>
					</div>
					<div class="status-dot"><i class="fas fa-circle"></i></div>
				</a>
			</div>
		</section>
	</div>
	<script type="text/javascript" src="javascript/users.js"></script>
</body>
</html>