<div style="width: 50%; margin: 0 auto; margin-top: 10%;">
	<form action="" method="POST" role="form">
		<legend>Login</legend>

		<div class="form-group">
			<label for="">Login</label>
			<input name="login" type="text" class="form-control" id="" placeholder="login"><br>
			<label for="">Password</label>
			<input name="password" type="password" class="form-control" id="" placeholder="password">
		</div>

		

		<button type="submit" class="btn btn-primary">Login</button>
	</form>
</div>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && isset($_POST['password'])){
		Security::login($_POST['login'], $_POST['password']);
	}
	if(isset($_SESSION['role'])){
		header('Location: index.php');
	}
?>