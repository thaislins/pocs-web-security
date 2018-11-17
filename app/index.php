<?php
require_once('includes/config.php');

$page = 'Login';
$error = '';

$username = $_GET['lg_username'];
$password = MD5($_GET['lg_password']);

if ($username and $password) {
	$error = user_login($username, $password);
	if (!$error) {
		header('Location: dashboard.php');
		exit();
	}
}

include('layout/headers.php');
?>

<div class="text-center" style="padding:50px 0">
	<div class="logo">login</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" class="text-left">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<?php if ($error): ?>
					<div class="alert alert-danger">
						<?= $error ?>
					</div>
				<?php endif; ?>
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username" value="<?= $username ?>">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>new user? <a href="signup.php">create new account</a></p>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>

<?php include('layout/footer.php') ?>
