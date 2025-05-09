<?php

if (PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) {
    die('CLI only');
}

$rootFolder = dirname(__FILE__, 3);
$databaseFolder = "$rootFolder/database";
$migrationsFolder = "$rootFolder/database/migrations";
$migratedLogPath = "$migrationsFolder/migrated.log";

require_once "$rootFolder/Env.class.php";

if (array_key_exists('remigrate', getopt(0, ['remigrate']))) {
    // Keep a backup just in case
    rename($migratedLogPath, "$migratedLogPath.old");
    rename("$databaseFolder/".Env::DATABASE_FILE, "$databaseFolder/".Env::DATABASE_FILE.'.old');
}

$database = new SQLite3("$databaseFolder/".Env::DATABASE_FILE, SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
$database->enableExceptions(true);

// Migrations are read like this: `/database/migrations/<$migrations[i]>.sql`
$migrations = [
    '2025-05-06_create_xlfiles',
    '2025-05-07_DEV_populate_xlfiles'
];

$migrationCount = 0;

foreach ($migrations as $migration) {
    $migrationEnvMode = str_contains($migration, "DEV") ? "DEV" : "PROD";
    if (($migrationEnvMode == "DEV" && !Env::DEV_ENV)
            || str_contains(file_get_contents($migratedLogPath), $migration)) {
        continue;
    }

    file_put_contents($migratedLogPath, "$migration,", FILE_APPEND);

    $database->query(file_get_contents("$migrationsFolder/$migration.sql"));
    print("$migrationEnvMode migration `$migration.sql` executed.\n");

    $migrationCount++;
}

print(
    ($migrationCount > 0)
        ? "Migration finished ($migrationCount)!\n" : "Nothing to migrate!"
);

$database->close();