<?php
require_once('../includes/config.php');

$page = 'Search User';
$error = '';
$success = '';

$password = $_POST['password'];
$conf_password = $_POST['conf_password'];

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /');
} else if ($password and $conf_password) {
    $password = MD5($_POST['password'] ?? '');
    $conf_password = MD5($_POST['conf_password'] ?? '');

    $error = change_password($_SESSION['user'], $password, $conf_password);
    if (!$error) {
        $success = 'Password changed';
    }
}

include('../layout/headers.php');
?>

<div class="text-center" style="padding:50px 0">
    <div class="logo">change password</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" class="text-left" method="POST" action="change_password.php">
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
            <?php endif; ?>
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="lg_password" class="sr-only">password</label>
                        <input type="password" class="form-control" id="lg_password" name="password" placeholder="enter new password">
                    </div>
                    <div class="form-group">
                        <label for="lg_conf_password" class="sr-only">confirm-password</label>
                        <input type="password" class="form-control" id="lg_conf_password" name="conf_password" placeholder="confirm new password">
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
        </form>
        <a href="/dashboard.php" class="custom-button pull-left">
            <i class="fa fa-chevron-left"></i>&nbsp; <span>Back to Dashboard</span>
        </a>
    </div>
    <!-- end:Main Form -->
</div>

<?php include('../layout/footer.php') ?>
