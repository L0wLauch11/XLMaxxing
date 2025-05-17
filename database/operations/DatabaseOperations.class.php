<?php
class DatabaseOperations {
    private static $databaseFolder = Env::ROOT."/database";

    public static function createDatabaseConnection(string $databaseFileName) {
        $databaseFolder = self::$databaseFolder;
        return new SQLite3("$databaseFolder/$databaseFileName", SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
    }

    public static function createPDOConnection(string $databaseFileName) {
        $databaseFolder = self::$databaseFolder;
        return new PDO("sqlite:$databaseFolder/$databaseFileName");
    }

    private static function executeOperation(string $type, string $operationName, array $stringArguments) : array {
        $databaseFolder = self::$databaseFolder;
        $database = self::createDatabaseConnection(Env::DATABASE_FILE);

        switch ($type) {
            case 'select':
                $preparedStatement = file_get_contents("$databaseFolder/operations/$type/{$type}_{$operationName}.sql");
                if (count($stringArguments) > 0) {
                    foreach ($stringArguments as $key => $value) {
                        $preparedStatement = str_replace('$'.$key, $value, $preparedStatement);
                    }
                }
                
                $result = $database->query($preparedStatement);

                $resultArray = [];
                while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                    array_push($resultArray, $row);
                }

                $database->close();
                return $resultArray;
        }

        return [];
    }

    public static function select(string $selectOperationName = 'xlfiles', array $stringArguments = []) : array {
        return self::executeOperation('select', $selectOperationName, $stringArguments);
    }
}