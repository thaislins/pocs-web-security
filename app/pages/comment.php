<?php
require_once('../includes/config.php');

$page = 'Search User';
$error = '';
$success = '';

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
} else {
    $comment = $_POST['comment'] ?? '';
    $user_id = select_user_id($_SESSION['user']);

    if ($comment and $user_id) {
        $error = post_comment($user_id, $comment);
        if (!$error) {
            $success = 'Comment posted';
        }
    }
}

include('../layout/headers.php');
?>

<div class="text-center" style="padding:50px 0">
    <div class="logo">post comment</div>
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" class="text-left" method="POST" action="comment.php">
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
                        <label for="lg_comment" class="sr-only">comment</label>
                        <input type="text" class="form-control" id="lg_comment" name="comment" placeholder="enter a comment">
                    </div>
                </div>
                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
            </div>
        </form>
    </div>
    <!-- end:Main Form -->
</div>

<?php include('../layout/footer.php') ?>
