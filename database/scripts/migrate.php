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
$migrations = glob("$migrationsFolder/*.{sql}", GLOB_BRACE);

if (!file_exists($migratedLogPath)) {
    touch($migratedLogPath);
}

$migrationCount = 0;
foreach ($migrations as $migration) {
    $migrationEnvMode = str_contains($migration, "DEV") ? "DEV" : "PROD";
    $migrationName = basename($migration);
    $executedMigrations = file($migratedLogPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (($migrationEnvMode == "DEV" && !Env::DEV_ENV)
            || in_array(basename($migration), $executedMigrations)) {
        continue;
    }

    try {
        $database->query(file_get_contents($migration));
        file_put_contents($migratedLogPath, "{$migrationName}\n", FILE_APPEND);
        print("$migrationEnvMode migration `$migrationName` executed.\n");
    } catch (Exception $e) {
        print("Error in `$migrationName`!: {$e->getMessage()}\n");
    }

    $migrationCount++;
}

print(
    ($migrationCount > 0)
        ? "Migration finished ($migrationCount)!\n" : "Nothing to migrate!"
);

$database->close();