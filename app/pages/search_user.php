<?php
require_once('../includes/config.php');

$page = 'Search User';
$users = array();
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
} else {
    $username = $_GET['lg_username'];
    session_start();

    if ($username) {
        $users = search_user($username);
        var_dump($users);
    }
}

include('../layout/headers.php');
?>

<div class="text-center" style="padding:50px 0">
    <div class="logo">search user</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" class="text-left">
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="lg_username" class="sr-only">Username</label>
                        <input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="enter username">
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
