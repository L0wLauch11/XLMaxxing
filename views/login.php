<?php function sectionTitle() { ?>
    <title>XLMaxxing &mdash; Login</title>
<?php } ?>

<?php function sectionMain() {
    $loginCallback = $_GET['login_callback'] ?? '';
    ?>
    <div class="container cotainer-auth-form">
        <h1><?= tl('Login') ?></h1>
        
        <form class="auth-form" action="/auth/login" method="post">
            <?= renderPartial('login-callback', [
                'loginCallback' => $loginCallback,
                'checkMatches' => ['invalid_username'],
            ]) ?>
            <?= renderPartial('advanced-input', [
                'name' => 'username',
                'type' => 'text',
                'placeholderText' => 'Username',
            ]) ?>

            <?= renderPartial('login-callback', [
                'loginCallback' => $loginCallback,
                'checkMatches' => ['invalid_password'],
            ]) ?>
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