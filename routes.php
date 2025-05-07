<?php

require_once 'Router.class.php';
require_once 'setup.php';

foreach ($siteRoutes as $siteRoute => $siteRouteFolder) {
    Router::get($siteRoute, function($sitePath) use ($siteRouteFolder) {
        $siteFolder = $siteRouteFolder;
        include_once 'sites/templates/site.php';
    });
}

Router::get('/', 'index.php');

