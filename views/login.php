<?php function sectionTitle() { ?>
    <title>XLMaxxing &mdash; Login</title>
<?php } ?>

<?php function sectionMain() {
    $loginCallback = $_GET['login_callback'] ?? '';
    ?>
    <div class="container cotainer-auth-form">
        <h1><?= tl('Login') ?></h1>
        
        <form class="auth-form" action="/auth/login" method="post">
            <?php if ($loginCallback == 'invalid_username'): ?>
                <p class="status-error"><?= tl('Invalid Username!') ?></p>
            <?php endif ?>
            <?= renderPartial('advanced-input', [
                'name' => 'username',
                'type' => 'text',
                'placeholderText' => 'Username',
            ]) ?>

            <?php if ($loginCallback == 'invalid_password'): ?>
                <p class="status-error"><?= tl('Invalid Password!') ?></p>
            <?php endif ?>
            <?= renderPartial('advanced-input', [
                'name' => 'password',
                'type' => 'password',
                'placeholderText' => 'Password',
            ]) ?>

            <button type="submit" class="button button-submit"><?= tl('Login') ?></button><br>
        </form>

        <span class="subtext">
            <?= tl('Don\'t have an account?') ?>
            <a href="/register"><?= tl('Register here.') ?></a>
        </span>
    </div>
<?php } ?>