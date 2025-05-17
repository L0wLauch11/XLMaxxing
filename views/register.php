<?php function sectionTitle() { ?>
    <title>XLMaxxing &mdash; Register</title>
<?php } ?>

<?php function sectionMain() { ?>
    <div class="container cotainer-auth-form">
        <h1><?= tl('Register') ?></h1>
        
        <form class="auth-form" action="/auth/register" method="post">
            <?= renderPartial('advanced-input', [
                'name' => 'email',
                'type' => 'text',
                'placeholderText' => 'E-Mail',
            ]) ?>

            <?= renderPartial('advanced-input', [
                'name' => 'username',
                'type' => 'text',
                'placeholderText' => 'Username',
            ]) ?>

            <?= renderPartial('advanced-input', [
                'name' => 'password',
                'type' => 'password',
                'placeholderText' => 'Password',
            ]) ?>

            <button type="submit" class="button button-submit"><?= tl('Register') ?></button><br>
        </form>

        <span class="subtext">
            <?= tl('Already have an account?') ?>
            <a href="/login"><?= tl('Login here.') ?></a>
        </span>
    </div>
<?php } ?>