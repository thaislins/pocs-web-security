<?php
$page = 'Dashboard';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

include('layout/headers.php');
?>

<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">dashboard</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<div class="main-login-form">
			<div class="login-group buttons-group">
				<a href="pages/search_user.php" class="custom-button">
					<i class="fa fa-users"></i>&nbsp; <span>Search User</span>
				</a>
				<a href="pages/comment.php" class="custom-button">
					<i class="fa fa-comments"></i>&nbsp; <span>Post a Comment</span>
				</a>
				<a href="pages/change_password.php" class="custom-button">
					<i class="fa fa-lock"></i>&nbsp; <span>Change Password</span>
				</a>
				<a href="logout.php" class="custom-button">
					<i class="fa fa-sign-out"></i>&nbsp; <span>Log out</span>
				</a>
			</div>
		</div>
	</div>
	<!-- end:Main Form -->
</div>

<?php include('layout/footer.php') ?>
