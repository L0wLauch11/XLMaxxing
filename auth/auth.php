<?php

$auth = new \Delight\Auth\Auth(DatabaseOperations::createPDOConnection(Env::DATABASE_FILE));