<?php /*** Copy this file to `Env.class.php` ***/

class Env {
    const DATABASE_FILE = 'database.sqlite3';
    const DEV_ENV = true;
    const ROOT = __DIR__;
    const AUTH_REMEMBER_DURATION = 60 * 60 * 24 * 365; // a year
}