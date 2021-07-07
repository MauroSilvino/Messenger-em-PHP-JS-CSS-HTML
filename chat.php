<?php 
	session_start();
	if(!isset($_SESSION['unique_id'])){
		header("location: login.php");
	}
?>

<?php include_once "head.php"; ?>
<body>
	<div class="wrapper">
		<section class="chat-area">
			<header>

			<?php 
				include_once "php/config.php";
				$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
				$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
				if(mysql_num_rows($sql) > 0){
					$row = mysqli_fetch_assoc($sql);
				}
			?>

				<a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
				<img src="php/images/<?php echo $row['img']; ?>" alt="">
				<div class="details">
					<span><?php echo $row['fname'] . " " . $row['iname']; ?></span>
					<p><?php echo $row['status']; ?></p>
				</div>
			</header>
			<div class="chat-box">
				<!-- Aqui entram as menssagens pelo arquivo get-chat.php e chat.js -->
			</div>
			<form action="#" class="typing-area" autocomplete="off">
				<input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
				<input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
				<input type="text" class="input-field" name="message" placeholder="Escreva sua menssagem aqui...">
				<button><i class="fab fa-telegram-plane"></i></button>
			</form>
		</section>
	</div>
	<script type="text/javascript" src="javascript/chat.js"></script>
</body>
</html>