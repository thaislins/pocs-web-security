<?php
$page = 'Search User';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

include('../layout/headers.php');
?>

<div class="text-center" style="padding:50px 0">
    <div class="logo">change password</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form action="dashboard.php" id="login-form" class="text-left">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="lg_username" class="sr-only">password</label>
                        <input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="enter new password">
                    </div>
                    <div class="form-group">
                        <label for="lg_password" class="sr-only">confirm-password</label>
                        <input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="confirm new password">
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>

<?php include('../layout/footer.php') ?>
