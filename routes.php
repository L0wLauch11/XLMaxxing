<?php
/// This file is the `entry-point`.

// Requiring these in the `routes.php` file also loads them for every other page
// which is a nice side effect, that acts like an autoload
require_once 'Router.class.php';
require_once 'setup.php';

Router::get('/', 'views/templates/page.php');
Router::get('/$pageName', 'views/templates/page.php');
Router::get('/$pageName/$id', 'views/templates/page.php');