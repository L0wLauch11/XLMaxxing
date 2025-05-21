<?php
global $auth;

$auth->logOut();

header('Location: /?login_callback=logout');