<?php
require_once('../includes/globals.php');
require_once('../includes/config.php');

$page = 'Comments';
$error = '';
$success = '';

if (!isset($_COOKIE['user'])) {
    header('Location: /');
} else {
    $comment = $_POST['comment'] ?? '';
    $user_id = select_user_id($_COOKIE['user']);

    if ($comment and $user_id) {
        $error = post_comment($user_id, $comment);
        if (!$error) {
            $success = 'Comment posted';

        }
    }
}

$comments = list_comments($_COOKIE['user']);
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
                    <div style="position: relative;">
                        <div class="form-group">
                            <label for="lg_comment" class="sr-only">comment</label>
                            <input type="text" class="form-control" id="lg_comment" name="comment" placeholder="enter a comment">
                        </div>
                        <button type="submit" class="login-button" style="right: -45px"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <?php if (empty($comments)): ?>
                        <p class="text-center">No comment found.</p>
                    <?php
                    else:
                        foreach ($comments as $comm):
                    ?>
                        <hr>
                        <dl class="inline">
                            <dt>Author</dt>
                            <dd><?= $_COOKIE['user'] ?></dd>
                            <dt>Comment</dt>
                            <dd><?= $comm['comment'] ?></dd>
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
