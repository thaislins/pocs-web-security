<?php
require_once('../includes/globals.php');
require_once('../includes/config.php');

$page = 'Search User';
$users = false;

if (!isset($_SESSION['user'])) {
    header('Location: /');
} else {
    $username = $_GET['lg_username'];

    if ($username) {
        $users = search_user($username);
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
                    <div style="position: relative;">
                        <div class="form-group">
                            <label for="lg_username" class="sr-only">Username</label>
                            <input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="enter username" value="<?= $username ?>">
                        </div>
                        <button type="submit" class="login-button" style="right: -45px"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <?php if ($users !== false and empty($users)): ?>
                        <p class="text-center">No user found.</p>
                    <?php
                    elseif (!empty($users)):
                        foreach ($users as $user):
                    ?>
                        <hr>
                        <dl class="inline">
                            <dt>ID</dt>
                            <dd><?= $user['id'] ?></dd>
                            <dt>Name</dt>
                            <dd><?= $user['name'] ?></dd>
                            <dt>Username</dt>
                            <dd><?= $user['username'] ?></dd>
                            <dt>Password</dt>
                            <dd><?= $user['password'] ?></dd>
                        </dl>
                        <div class="clearfix"></div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </form>
        <a href="/dashboard.php" class="custom-button pull-left">
            <i class="fa fa-chevron-left"></i>&nbsp; <span>Back to Dashboard</span>
        </a>
    </div>
    <!-- end:Main Form -->
</div>

<?php include('../layout/footer.php') ?>
