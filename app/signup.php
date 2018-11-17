<?php
require_once('includes/config.php');

$page = 'Sign up';
$error = '';

$name = $_POST['reg_fullname'] ?? '';
$username = $_POST['reg_username'] ?? '';
$password = MD5($_POST['reg_password'] ?? '');
$conf_password = MD5($_POST['reg_password_confirm'] ?? '');

if ($name and $username and $password and $conf_password) {
	$error = register_user($name, $username, $password, $conf_password);
	if (!$error) {
		header('Location: index.php');
		exit();
	}
}

include('layout/headers.php');
?>

<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">sign up</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="register-form" class="text-left" method="POST" action="signup.php">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<?php if ($error): ?>
					<div class="alert alert-danger">
						<?= $error ?>
					</div>
				<?php endif; ?>
				<div class="login-group">
					<div class="form-group">
						<label for="reg_fullname" class="sr-only">Full Name</label>
						<input type="text" class="form-control" id="reg_fullname" name="reg_fullname" placeholder="full name" value="<?= $name ?>">
					</div>
					<div class="form-group">
						<label for="reg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="username" value="<?= $username ?>">
					</div>
					<div class="form-group">
						<label for="reg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
					</div>
					<div class="form-group">
						<label for="reg_password_confirm" class="sr-only">Password Confirm</label>
						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password">
					</div>

					<div class="form-group login-group-checkbox">
						<input type="checkbox" class="" id="reg_agree" name="reg_agree">
						<label for="reg_agree">i agree with <a href="#">terms</a></label>
					</div>
				</div>
				<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>already have an account? <a href="index.php">login here</a></p>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>

<?php include('layout/footer.php') ?>
