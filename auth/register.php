<?php
global $auth;

try {
    $userId = $auth->registerWithUniqueUsername($_POST['email'], $_POST['password'], $_POST['username']);
    header('Location: /?login_callback=success');
    exit;
} catch (\Delight\Auth\InvalidEmailException $e) {
    header('Location: /register?login_callback=invalid_email');
} catch (\Delight\Auth\InvalidPasswordException $e) {
    header('Location: /register?login_callback=invalid_password');
} catch (\Delight\Auth\UserAlreadyExistsException $e) {
    header('Location: /register?login_callback=user_exists');
} catch (\Delight\Auth\DuplicateUsernameException $e) {
    header('Location: /register?login_callback=user_exists');
} catch (\Delight\Auth\TooManyRequestsException $e) {
    header('Location: /register?login_callback=too_many_requests');
}