<?php
$page = 'Dashboard';
include('layout/headers.php');
?>

<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">dashboard</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="register-form" class="text-left">
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="reg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="write a comment">
					</div>
				</div>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>

<?php include('layout/footer.php') ?>
