<?php

if (PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) {
    die('CLI only');
}

$rootFolder = __DIR__.'/../..';
$databaseFolder = $rootFolder.'/database';
$migrationsFolder = $rootFolder.'/database/migrations';

require_once __DIR__.'/../../setup.php';

$database = new SQLite3("$databaseFolder/".Env::DATABASE_FILE, SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
$database->enableExceptions(true);

// Migrations are read like this: `/database/migrations/<$migrations[i]>.sql`
$migrations = [
    '2025-05-06_create_xlfiles',
    '2025-05-07_DEV_populate_xlfiles'
];

foreach ($migrations as $migration) {
    $migrationEnvMode = str_contains($migration, "DEV") ? "DEV" : "PROD";
    if ($migrationEnvMode == "DEV" && !Env::DEV_ENV) {
        continue;
    }

    $database->query(file_get_contents("$migrationsFolder/$migration.sql"));
    print("$migrationEnvMode migration `$migration.sql` executed.\n");
}

print("Migration finished!\n");