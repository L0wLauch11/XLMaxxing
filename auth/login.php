<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
global $auth;

try {
    $auth->loginWithUsername($_POST['username'], $_POST['password'], Env::AUTH_REMEMBER_DURATION);
    header('Location: /?login_callback=success');
    exit;
} catch (\Delight\Auth\InvalidEmailException $e) {
    header('Location: /login?login_callback=invalid_email');
} catch (\Delight\Auth\InvalidPasswordException $e) {
    header('Location: /login?login_callback=invalid_password');
} catch (\Delight\Auth\EmailNotVerifiedException $e) {
    header('Location: /login?login_callback=email_not_verified');
} catch (\Delight\Auth\TooManyRequestsException $e) {
    header('Location: /login?login_callback=too_many_requests');
} catch (\Delight\Auth\UnknownUsernameException $e) {
    header('Location: /login?login_callback=invalid_username');
}
