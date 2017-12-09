<?php
	// If form submitted, insert values into the database.
	if (isset($_POST['username'])){
		$auth = new UserAuth();
		$auth->login($_POST);
	}else{
	?>
		<div class="form">
			<h1>Log In</h1>
			<form class="form-signin" action="" method="post" name="login">
				<input type="text" name="username" placeholder="Username" required />
				<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required />
				<input name="submit" type="submit" value="Login" />
			</form>
			<p>Not registered yet? <a href='index.php?page=registration'>Register Here</a></p>
		</div>
<?php } ?>